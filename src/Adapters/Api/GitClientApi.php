<?php

namespace FluxEco\GitClient\Adapters\Api;

use FluxEco\GitClient\{Adapters\Configs, Core\Ports};

class GitClientApi
{

    private Ports\GitClientService $service;

    private function __construct(
        Ports\GitClientService $service
    ) {
        $this->service = $service;
    }

    public static function new() : self
    {
        $service = Ports\GitClientService::new(Configs\Outbounds::new());
        return new self($service);
    }

    final public function gitCheckoutCommitAndPublish(
        array $componentDirectoryPaths,
        string $branchName,
        string $commitMessage
    ) : void {
        $this->service->gitCheckoutCommitAndPublish($componentDirectoryPaths, $branchName, $commitMessage);
    }

    final public function gitResetHard(
        array $componentDirectoryPaths,
        string $branchName
    ) : void {
        $this->service->getResetHard($componentDirectoryPaths, $branchName);
    }

}