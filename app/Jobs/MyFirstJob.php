<?php

namespace App\Jobs;


use App\Jobs\Pipeline\PipelineAbstract;
use Illuminate\Foundation\Bus\DispatchesJobs;

class MyFirstJob extends Job
{
    use DispatchesJobs;

    protected $data;

    public function __construct($data, PipelineAbstract $pipeline)
    {
        $this->data = $data;
        $this->pipeline = $pipeline;
    }

    public function handle()
    {
        $this->doSomething($this->data);
        $this->next($this->data);
    }
}
