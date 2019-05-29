<?php
/**
 * Build script for the project
 *
 * @category Build
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

$root = realpath(dirname(__FILE__).'/../');

require_once $root.'/vendor/autoload.php';

/**
 * Class Builder which is responsible for deployment
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class Builder
{
    private $_currentOutput = "";
    private $_steps = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * The main function for building process
     *
     * @return void
     */
    public function build()
    {
        $allPassed = true;
        $this->output("*New code committed. Integration begins*\n");
        foreach ($this->_steps as $step) {
            /* @var BuildStep $step */
            $this->output('====== --- ' . $step->getName() . ' --- ======');
            $step->run();
            if ($step->showOutput) {
                $output = $step->getOutput();
                foreach ($output as $row) {
                    if (empty($row)) {
                        $this->output($row);
                    } else {
                        $this->output('`' . $row . '`');
                    }
                }
                $this->output("\n");
            }
            $allPassed = $allPassed && $step->buildSucceed();
            if (!$allPassed) {
                break;
            }
        }

        $this->output('====== --- Reports --- ======');
        $this->output('*Unit test report:*       _output/report.html');
        $this->output('*Code coverage report:*   _output/coverage/');

        if (!$allPassed) {
            $this->output('*BUILD FAILED*');
        } else {
            $this->output('*BUILD SUCCEEDED*');
        }

        $this->_notify();
    }

    /**
     * Add a step to building process
     *
     * @param BuildStep $step Build step
     *
     * @return void
     */
    public function addStep(BuildStep $step)
    {
        $this->_steps[] = $step;
    }

    /**
     * Append a message to current output
     *
     * @param string $msg Message to be appended
     *
     * @return void
     */
    public function output($msg)
    {
        $this->_currentOutput .= $msg . "\n";
    }

    /**
     * Notify Slack about building process
     *
     * @return void
     */
    private function _notify()
    {
        $client = new GuzzleHttp\Client();
        $url = 'https://hooks.slack.com/services/xxxxxxxxxx/xxxxxxxxxx/xxxxxxxxxxxxxxxxxxxxxxxx';
        $url = null;
        if (!empty($url)) {
            $res = $client->request(
                'POST', $url, [
                    'form_params' => [
                        'payload' => json_encode(
                            ['text' => $this->_currentOutput . "\n"]
                        )
                    ]
                ]
            );
        }
    }
}

/**
 * Class BuildStep which is responsible for a step in the building process
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
abstract class BuildStep
{
    protected $name;
    protected $command;
    protected $output;
    protected $succeed = false;
    public $showOutput = true;

    /**
     * Constructor
     *
     * @param string $name    Name of the build step
     * @param string $command The command to execute the step
     */
    public function __construct($name, $command)
    {
        $this->name = $name;
        $this->command = $command;
    }

    /**
     * A function to define if build succeeds or not
     *
     * @return bool
     */
    abstract public function buildSucceed();

    /**
     * Get name of build step
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get output of build step
     *
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Run this build step
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        exec($this->command, $rows);
        $this->output = $rows;
        return $rows;
    }
}

/**
 * Class PullCodeStep which is responsible for pulling code from GIT
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class PullCodeStep extends BuildStep
{
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function buildSucceed()
    {
        $rows = $this->output;
        $resultRow = $rows[count($rows) - 1];
        if (stripos($resultRow, 'aborting') !== false) {
            return false;
        }

        return true;
    }
}

/**
 * Show git log
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class GitLogStep extends BuildStep
{
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function buildSucceed()
    {
        return true;
    }
}

/**
 * Responsible for running unit test
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class RunUnitTestStep extends BuildStep
{
    public $showOutput = false;

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function buildSucceed()
    {
        $rows = $this->output;
        $resultRow = $rows[count($rows) - 2];
        if (strtolower($resultRow) === 'failures!') {
            return false;
        }

        return true;
    }
}

/**
 * Responsible for removing asset cache
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class RemoveAssetStep extends BuildStep
{
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function buildSucceed()
    {
        return true;
    }
}

/**
 * Responsible for running database migration
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class MigrationStep extends BuildStep
{
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function buildSucceed()
    {
        $rows = $this->output;
        $resultRow = $rows[count($rows) - 1];
        return stripos($resultRow, 'Your system is up-to-date') !== false || stripos($resultRow, 'Migrated up successfully') !== false;
    }
}

/**
 * Responsible for running composer
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class ComposerStep extends BuildStep
{
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function buildSucceed()
    {
        return true;
    }
}

$dir = realpath(dirname(__FILE__).'/../');
$builder = new Builder();
$builder->addStep(new PullCodeStep('Pulling code', 'git pull'));
$builder->addStep(new GitLogStep('Commit history', 'git log -1'));
$builder->addStep(new RemoveAssetStep('Removing asset cache', "rm {$dir}/web/assets/* -rf"));
$builder->addStep(new MigrationStep('Running data migration', "php {$dir}/yii migrate --interactive=0"));
$builder->addStep(new ComposerStep('Running composer', "composer install"));
$builder->addStep(new RunUnitTestStep('Executing unit tests', "{$dir}/vendor/bin/codecept run unit --config {$dir}/tests/codeception.yml --html --coverage-html"));
$builder->build();