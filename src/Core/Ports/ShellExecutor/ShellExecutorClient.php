<?php

namespace FluxEco\GitClient\Core\Ports\ShellExecutor;

interface ShellExecutorClient {
    public function execute(array $commandQueue): void;
}
