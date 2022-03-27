<?php

namespace FluxEco\GitClient\Core\Application\Handlers;

class GitCheckoutCommand {

    private string $componentDirectoryPath;
    private string $branchName;

    private function __construct(string $componentDirectoryPath, string $branchName)
    {
        $this->componentDirectoryPath = $componentDirectoryPath;
        $this->branchName = $branchName;
    }

    public static function new(string $componentDirectoryPath, string $branchName): self
    {
        return new self($componentDirectoryPath, $branchName);
    }

    public function getComponentDirectoryPath() : string
    {
        return $this->componentDirectoryPath;
    }

    public function getBranchName() : string
    {
        return $this->branchName;
    }
}