<?php
/**
 * Quality checker
 *
 * @category Build
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

/**
 * Quality checker
 *
 * @category Build
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class QualityChecker
{
    public $excludedPatterns = [
        '/^migrations\/*/',
        '/^tests\/codeception\/*/',
        '/^models\/Base*/',
        '/^config\/i18n\.php/',
        '/^messages\/*/',
        '/^views\/*/',
    ];

    /**
     * Main function to check convention of code
     *
     * @param string $filePath File path
     *
     * @return array
     */
    public function checkConvention($filePath)
    {
        $rows = $errors = [];
        $passed = true;
        $command = './vendor/bin/phpcs ' . $filePath;
        exec($command, $rows);

        foreach ($rows as $row) {
            if (preg_match('/\d+\s*\|\s*ERROR\s*\|/', $row)) {
                $passed = false;
                $errors[] = $row;
            }
        }
        $data = [
            'success' => $passed,
            'errors' => $errors
        ];
        return $data;
    }

    /**
     * Checking code convention by getting all of staged GIT files
     *
     * @return void
     */
    public function check()
    {
        $stagedFiles = $this->getStagedFiles();
        if (count($stagedFiles)) {
            foreach ($stagedFiles as $file) {
                if (!preg_match('/\.php$/', $file)) {
                    continue;
                }
                $result = $this->checkConvention($file);
                if (!$result['success']) {
                    echo "CodeSniffer failed for file {$file}\n";
                    foreach ($result['errors'] as $error) {
                        echo "{$error} \n";
                    }
                    exit(1);
                }
            }
        } else {
            exit(0);
        }
    }

    /**
     * Get all staged files of GIT
     *
     * @return array
     */
    public function getStagedFiles()
    {
        $command = 'git diff --name-only --cached';
        $stagedFiles = [];
        exec($command, $stagedFiles);
        foreach ($stagedFiles as $key => $stagedFile) {
            foreach ($this->excludedPatterns as $excludedPattern) {
                if (preg_match($excludedPattern, $stagedFile)) {
                    unset($stagedFiles[$key]);
                    break;
                }
            }
        }
        return $stagedFiles;
    }
}

$checker = new QualityChecker();
$checker->check();
