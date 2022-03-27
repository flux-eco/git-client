<?php

namespace FluxEco\GitClient\Adapters\CoScheduler;

use FluxEco\GitClient\Core\{Ports};
use Swoole\Coroutine;

class CoScheduler implements Ports\CoScheduler\CoScheduler
{
    private array $schedules;

    //private Coroutine\Scheduler $scheduler;

    private function __construct()
    {
        //as soon as we run on docker - parallel runs:
        //$this->scheduler = new Coroutine\Scheduler();
        $this->schedules = [];
    }

    public static function new()
    {
        return new self();
    }

    public function add(callable $callable, ...$params) : void
    {
        //$this->scheduler->add($callable, $params);
        $this->schedules[] = [
          'callable' =>  $callable,
          'params' =>  $params,
        ];
    }

    public function start() : void
    {
        //$this->scheduler->start();
        foreach($this->schedules as $schedule) {
            call_user_func_array($schedule['callable'], $schedule['params']);
        }
    }
}