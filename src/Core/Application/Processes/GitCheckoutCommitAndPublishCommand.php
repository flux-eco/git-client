<?php

namespace FluxEco\GitClient\Core\Application\Processes;

/**
 * Class GitCheckoutCommitAndPublishCommand
 * @author Martin Studer <martin@fluxlabs.ch>
 */
class GitCheckoutCommitAndPublishCommand
{
    private string $componentDirectoryPath;
    private string $branchName;
    private string $commitMessage;

    private function __construct(string $componentDirectoryPath, string $branchName, string $commitMessage)
    {
        $this->componentDirectoryPath = $componentDirectoryPath;
        $this->branchName = $branchName;
        $this->commitMessage = $commitMessage;
    }

    public static function new(string $componentDirectoryPath, string $branchName, string $commitMessage) : self
    {
        return new self($componentDirectoryPath, $branchName, $commitMessage);
    }

    public function getComponentDirectoryPath() : string
    {
        return $this->componentDirectoryPath;
    }

    public function getBranchName() : string
    {
        return $this->branchName;
    }

    public function getCommitMessage() : string
    {
        return $this->commitMessage;
    }
}