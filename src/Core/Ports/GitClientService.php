<?php

namespace FluxEco\GitClient\Core\Ports;

use FluxEco\GitClient\Core\{Application\Processes};

class GitClientService
{
    private ShellExecutor\ShellExecutorClient $shellExecutorClient;
    private CoScheduler\CoSchedulerClient $schedulerClient;

    private function __construct(
        ShellExecutor\ShellExecutorClient $shellExecutorClient,
        CoScheduler\CoSchedulerClient $schedulerClient
    ) {
        $this->shellExecutorClient = $shellExecutorClient;
        $this->schedulerClient = $schedulerClient;
    }

    final public static function new(
        Configs\Outbounds $outbounds
    ) : self {

        return new self(
            $outbounds->getShellClient(),
            $outbounds->getCoSchedulerClient(),
        );
    }

    public function gitCheckoutCommitAndPublish(
        array $componentDirectoryPaths,
        string $branchName,
        string $commitMessage
    ) : void {
        $scheduler = $this->schedulerClient->getCoScheduler();
        foreach ($componentDirectoryPaths as $directoryPath) {
            $command = Processes\GitCheckoutCommitAndPublishCommand::new($directoryPath, $branchName, $commitMessage);
            $scheduler->add(function ($command) {
                Processes\GitCheckoutCommitAndPublishProcess::new($this->shellExecutorClient)->process($command);
            }, $command);
        }
        $scheduler->start();
    }

    public function getResetHard(
        array $componentDirectoryPaths,
        string $branchName
    ) : void {
        $scheduler = $this->schedulerClient->getCoScheduler();
        foreach ($componentDirectoryPaths as $directoryPath) {
            $command = Processes\GitResetCommand::new($directoryPath, $branchName);
            $scheduler->add(function ($command) {
                Processes\GitResetProcess::new($this->shellExecutorClient)->process($command);
            }, $command);
        }
        $scheduler->start();
    }
}