<?php

namespace App\Jobs\Pipeline;

use App\Jobs\Job;
use App\Jobs\MyFirstJob;
use App\Jobs\MySecondJob;
use App\Jobs\MyThirdJob;

class ProcessDataPipeline extends PipelineAbstract
{

    /**
     * @inheritdoc
     */
    public function next(Job $currentJob = null, array $params)
    {
        // Start first job
        if ($currentJob === null)
        {
            $this->startJob(new MyFirstJob($params, $this));
        }

        if ($currentJob instanceof MyFirstJob)
        {
            $this->startJob(new MySecondJob($params, $this));
        }

        if ($currentJob instanceof MySecondJob)
        {
            if ($this->someCondition($params))
            {
                $this->startJob(new MyThirdJob($params, $this));
            }
        }
    }

    private function someCondition($data)
    {
        return true;
    }
}
