<?php

namespace FluxEco\GitClient\Core\Application\Handlers;

class GitFetchCommand {

    private string $componentDirectoryPath;

    private function __construct(string $componentDirectoryPath)
    {
        $this->componentDirectoryPath = $componentDirectoryPath;
    }

    public static function new(string $componentDirectoryPath): self
    {
        return new self($componentDirectoryPath);
    }

    public function getComponentDirectoryPath() : string
    {
        return $this->componentDirectoryPath;
    }
}