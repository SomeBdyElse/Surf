<?php
namespace TYPO3\Surf\Tests\Unit\Task\Composer;

/*                                                                        *
 * This script belongs to the TYPO3 project "TYPO3 Surf".                 *
 *                                                                        *
 *                                                                        */

use TYPO3\Surf\Tests\Unit\Task\BaseTaskTest;

/**
 * Unit test for the TagTask
 */
class InstallTaskTest extends BaseTaskTest
{
    /**
     * Set up test dependencies
     */
    protected function setUp()
    {
        parent::setUp();

        $this->application->setDeploymentPath('/home/jdoe/app');
    }

    /**
     * @test
     */
    public function executeUserConfiguredComposerCommand()
    {
        $options = array(
            'composerCommandPath' => '/my/path/to/composer.phar',
        );

        $this->task->execute($this->node, $this->application, $this->deployment, $options);
        $this->assertCommandExecuted('/^\/my\/path\/to\/composer.phar install --no-ansi --no-interaction --no-dev --no-progress --classmap-authoritative 2>&1$/');
    }

    /**
     * @return \TYPO3\Surf\Domain\Model\Task
     */
    protected function createTask()
    {
        return new \TYPO3\Surf\Task\Composer\InstallTask();
    }
}
