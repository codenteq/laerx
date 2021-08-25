<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Question;
use App\Models\User;
use App\Observers\AppointmentObserver;
use App\Observers\NotificationObserver;
use App\Observers\QuestionObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //User::observe(UserObserver::class);
        Question::observe(QuestionObserver::class);
        Notification::observe(NotificationObserver::class);
    }
}
