<?php
namespace Jeff\initialize;

/**
* Initialize Installer
*/
class Installer
{
    public static function postInstall()
    {
        $projectsPath = dirname(dirname(dirname(__DIR__)));
        $projectEnvironmentsPath    = $projectsPath . DIRECTORY_SEPARATOR . "environments";
        $initializeEnvironmentsPath = __DIR__ . DIRECTORY_SEPARATOR . "environments";

        self::removeDirectory($projectEnvironmentsPath);
        self::copyDirectory($initializeEnvironmentsPath, $projectEnvironmentsPath);

        $projects = [
            "backend",
            "common",
            "console",
            "frontend",
        ];
        self::updateConfigFile($projectsPath, $projects);
    }

    /**
     * Create the .gitignore file to ignore environments
     */
    public static function updateConfigFile($projectsPath, $projects)
    {
        $gitignoreContent = <<<EOF
/dev
/test
/prod

EOF;
        foreach ($projects as $val) {
            $configPath    = $projectsPath . DIRECTORY_SEPARATOR . $val . DIRECTORY_SEPARATOR . "config";

            $gitignoreFile = $configPath . DIRECTORY_SEPARATOR . ".gitignore";
            if (is_file($gitignoreFile)) {
                file_put_contents($gitignoreFile, $gitignoreContent);
            }

            $configMainFile = $configPath . DIRECTORY_SEPARATOR . "main.php";
            if (is_file($configMainFile)) {
                $content = preg_replace('/params-local/', "'.YII_ENV.'/params", file_get_contents($configMainFile));
                file_put_contents($configMainFile, $content);
            }
        }
    }

    /**
     * Copies a whole directory as another one.
     * The files and sub-directories will also be copied over.
     * @param string $src the source directory
     * @param string $dst the destination directory
     * @param array $options options for directory copy. Valid options are:
     *
     * - dirMode: integer, the permission to be set for newly copied directories. Defaults to 0775.
     * - fileMode:  integer, the permission to be set for newly copied files. Defaults to the current environment setting.
     * - filter: callback, a PHP callback that is called for each directory or file.
     *   The signature of the callback should be: `function ($path)`, where `$path` refers the full path to be filtered.
     *   The callback can return one of the following values:
     *
     *   * true: the directory or file will be copied (the "only" and "except" options will be ignored)
     *   * false: the directory or file will NOT be copied (the "only" and "except" options will be ignored)
     *   * null: the "only" and "except" options will determine whether the directory or file should be copied
     *
     * - only: array, list of patterns that the file paths should match if they want to be copied.
     *   A path matches a pattern if it contains the pattern string at its end.
     *   For example, '.php' matches all file paths ending with '.php'.
     *   Note, the '/' characters in a pattern matches both '/' and '\' in the paths.
     *   If a file path matches a pattern in both "only" and "except", it will NOT be copied.
     * - except: array, list of patterns that the files or directories should match if they want to be excluded from being copied.
     *   A path matches a pattern if it contains the pattern string at its end.
     *   Patterns ending with '/' apply to directory paths only, and patterns not ending with '/'
     *   apply to file paths only. For example, '/a/b' matches all file paths ending with '/a/b';
     *   and '.svn/' matches directory paths ending with '.svn'. Note, the '/' characters in a pattern matches
     *   both '/' and '\' in the paths.
     * - caseSensitive: boolean, whether patterns specified at "only" or "except" should be case sensitive. Defaults to true.
     * - recursive: boolean, whether the files under the subdirectories should also be copied. Defaults to true.
     * - beforeCopy: callback, a PHP callback that is called before copying each sub-directory or file.
     *   If the callback returns false, the copy operation for the sub-directory or file will be cancelled.
     *   The signature of the callback should be: `function ($from, $to)`, where `$from` is the sub-directory or
     *   file to be copied from, while `$to` is the copy target.
     * - afterCopy: callback, a PHP callback that is called after each sub-directory or file is successfully copied.
     *   The signature of the callback should be: `function ($from, $to)`, where `$from` is the sub-directory or
     *   file copied from, while `$to` is the copy target.
     * @throws \yii\base\InvalidParamException if unable to open directory
     */
    public static function copyDirectory($src, $dst, $options = [])
    {
        if (!is_dir($dst)) {
            static::createDirectory($dst, isset($options['dirMode']) ? $options['dirMode'] : 0775, true);
        }

        $handle = opendir($src);
        if ($handle === false) {
            throw new InvalidParamException("Unable to open directory: $src");
        }
        if (!isset($options['basePath'])) {
            // this should be done only once
            $options['basePath'] = realpath($src);
            $options = self::normalizeOptions($options);
        }
        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $from = $src . DIRECTORY_SEPARATOR . $file;
            $to = $dst . DIRECTORY_SEPARATOR . $file;
            if (static::filterPath($from, $options)) {
                if (isset($options['beforeCopy']) && !call_user_func($options['beforeCopy'], $from, $to)) {
                    continue;
                }
                if (is_file($from)) {
                    copy($from, $to);
                    if (isset($options['fileMode'])) {
                        @chmod($to, $options['fileMode']);
                    }
                } else {
                    static::copyDirectory($from, $to, $options);
                }
                if (isset($options['afterCopy'])) {
                    call_user_func($options['afterCopy'], $from, $to);
                }
            }
        }
        closedir($handle);
    }

    /**
     * Removes a directory (and all its content) recursively.
     * @param string $dir the directory to be deleted recursively.
     * @param array $options options for directory remove. Valid options are:
     *
     * - traverseSymlinks: boolean, whether symlinks to the directories should be traversed too.
     *   Defaults to `false`, meaning the content of the symlinked directory would not be deleted.
     *   Only symlink would be removed in that default case.
     */
    public static function removeDirectory($dir, $options = [])
    {
        if (!is_dir($dir)) {
            return;
        }
        if (isset($options['traverseSymlinks']) && $options['traverseSymlinks'] || !is_link($dir)) {
            if (!($handle = opendir($dir))) {
                return;
            }
            while (($file = readdir($handle)) !== false) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                $path = $dir . DIRECTORY_SEPARATOR . $file;
                if (is_dir($path)) {
                    static::removeDirectory($path, $options);
                } else {
                    unlink($path);
                }
            }
            closedir($handle);
        }
        if (is_link($dir)) {
            unlink($dir);
        } else {
            rmdir($dir);
        }
    }

    /**
     * Checks if the given file path satisfies the filtering options.
     * @param string $path the path of the file or directory to be checked
     * @param array $options the filtering options. See [[findFiles()]] for explanations of
     * the supported options.
     * @return boolean whether the file or directory satisfies the filtering options.
     */
    public static function filterPath($path, $options)
    {
        if (isset($options['filter'])) {
            $result = call_user_func($options['filter'], $path);
            if (is_bool($result)) {
                return $result;
            }
        }

        if (empty($options['except']) && empty($options['only'])) {
            return true;
        }

        $path = str_replace('\\', '/', $path);

        if (!empty($options['except'])) {
            if (($except = self::lastExcludeMatchingFromList($options['basePath'], $path, $options['except'])) !== null) {
                return $except['flags'] & self::PATTERN_NEGATIVE;
            }
        }

        if (!empty($options['only']) && !is_dir($path)) {
            if (($except = self::lastExcludeMatchingFromList($options['basePath'], $path, $options['only'])) !== null) {
                // don't check PATTERN_NEGATIVE since those entries are not prefixed with !
                return true;
            }

            return false;
        }

        return true;
    }

    /**
     * Creates a new directory.
     *
     * This method is similar to the PHP `mkdir()` function except that
     * it uses `chmod()` to set the permission of the created directory
     * in order to avoid the impact of the `umask` setting.
     *
     * @param string $path path of the directory to be created.
     * @param integer $mode the permission to be set for the created directory.
     * @param boolean $recursive whether to create parent directories if they do not exist.
     * @return boolean whether the directory is created successfully
     * @throws \yii\base\Exception if the directory could not be created.
     */
    public static function createDirectory($path, $mode = 0775, $recursive = true)
    {
        if (is_dir($path)) {
            return true;
        }
        $parentDir = dirname($path);
        if ($recursive && !is_dir($parentDir)) {
            static::createDirectory($parentDir, $mode, true);
        }
        try {
            $result = mkdir($path, $mode);
            chmod($path, $mode);
        } catch (\Exception $e) {
            throw new \yii\base\Exception("Failed to create directory '$path': " . $e->getMessage(), $e->getCode(), $e);
        }

        return $result;
    }

    /**
     * @param array $options raw options
     * @return array normalized options
     */
    private static function normalizeOptions(array $options)
    {
        if (!array_key_exists('caseSensitive', $options)) {
            $options['caseSensitive'] = true;
        }
        if (isset($options['except'])) {
            foreach ($options['except'] as $key => $value) {
                if (is_string($value)) {
                    $options['except'][$key] = self::parseExcludePattern($value, $options['caseSensitive']);
                }
            }
        }
        if (isset($options['only'])) {
            foreach ($options['only'] as $key => $value) {
                if (is_string($value)) {
                    $options['only'][$key] = self::parseExcludePattern($value, $options['caseSensitive']);
                }
            }
        }
        return $options;
    }
}
