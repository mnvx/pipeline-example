<?php

namespace App\Jobs;

use App\Jobs\Pipeline\PipelineAbstract;
use Illuminate\Bus\Queueable;

abstract class Job
{
    /*
    |--------------------------------------------------------------------------
    | Queueable Jobs
    |--------------------------------------------------------------------------
    |
    | This job base class provides a central location to place any logic that
    | is shared across all of your jobs. The trait included with the class
    | provides access to the "onQueue" and "delay" queue helper methods.
    |
    */

    use Queueable;

    /**
     * @var PipelineAbstract|null Pipeline class name
     */
    protected $pipeline = null;

    /**
     * Some fake method
     * @param mixed $data
     */
    protected function doSomething($data)
    {
        var_dump([
            'method' => static::class . '::' . __FUNCTION__ . '()',
            'data' => $data,
        ]);
    }

    /**
     * @param array $params
     */
    public function next(array $params)
    {
        if ($this->pipeline)
        {
            $this->pipeline->next($this, $params);
        }
    }
}
