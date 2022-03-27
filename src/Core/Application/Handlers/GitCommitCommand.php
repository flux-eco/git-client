<?php

namespace FluxEco\GitClient\Core\Application\Handlers;

class GitCommitCommand {

    private string $componentDirectoryPath;
    private string $commitMessage;

    private function __construct(string $componentDirectoryPath, string $commitMessage)
    {
        $this->componentDirectoryPath = $componentDirectoryPath;
        $this->commitMessage = $commitMessage;
    }

    public static function new(string $componentDirectoryPath, string $commitMessage): self
    {
        return new self($componentDirectoryPath, $commitMessage);
    }

    public function getComponentDirectoryPath() : string
    {
        return $this->componentDirectoryPath;
    }

    public function getCommitMessage() : string
    {
        return $this->commitMessage;
    }
}