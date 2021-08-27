<?php

namespace App\Jobs;

use App\Services\ImageConvertService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImageConvertJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $model;
    protected $path;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $model, $path)
    {
        $this->id = $id;
        $this->model = $model;
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ImageConvertService $convertService)
    {
        $convertService->execute($this->id, $this->model, $this->path);
    }
}
