<?php

namespace App\Jobs;

use App\Services\TestResult\TestResultService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestResultJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    protected $testId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId, $testId)
    {
        $this->userId = $userId;
        $this->testId = $testId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TestResultService $testResultService)
    {
        $testResultService->execute($this->userId, $this->testId);
    }
}
