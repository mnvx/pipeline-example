<?php

namespace App\Jobs\Pipeline;

use App\Jobs\Job;
use Illuminate\Foundation\Bus\DispatchesJobs;

abstract class PipelineAbstract
{
    use DispatchesJobs;

    /**
     * @param array $params
     * @return PipelineAbstract
     */
    public function start(array $params)
    {
        $this->next(null, $params);
        return $this;
    }

    /**
     * @param Job $currentJob
     * @param array $params Set of parameters for starting new jobs
     */
    abstract public function next(Job $currentJob = null, array $params);

    /**
     * @param Job $job
     */
    protected function startJob(Job $job)
    {
        $this->dispatch($job);
    }

}
