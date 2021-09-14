<?php

namespace App\Jobs;

use App\Services\FirebaseNotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $notificationId;
    protected $companyId;

    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($notificationId, $companyId)
    {
        $this->notificationId = $notificationId;
        $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FirebaseNotificationService $notificationService)
    {
        $notificationService->execute($this->notificationId, $this->companyId);
    }
}
