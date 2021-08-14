<?php

namespace App\Observers;

use App\Helpers\Helper;
use App\Models\Appointment;

class AppointmentObserver
{

    private $request;

    /**
     * @param \App\Models\Appointment $appointment
     */
    public function __construct(Appointment $appointment)
    {
        $this->request = request();
    }

    /**
     * Handle the Appointment "saving" event.
     *
     * @param \App\Models\Appointment $appointment
     * @return void
     */
    public function saving(Appointment $appointment)
    {
        $companyId = Helper::companyId();
        $appointment->userId = $this->request->userId;
        $appointment->teacherId = $this->request->teacherId;
        $appointment->carId = $this->request->carId;
        $appointment->companyId = $companyId;
        $appointment->date = $this->request->date;
        $appointment->status = $this->request->status === "on" ? 1 : 0;

    }

    /**
     * Handle the Appointment "updated" event.
     *
     * @param \App\Models\Appointment $appointment
     * @return void
     */
    public function updated(Appointment $appointment)
    {
        //
    }

    /**
     * Handle the Appointment "deleted" event.
     *
     * @param \App\Models\Appointment $appointment
     * @return void
     */
    public function deleted(Appointment $appointment)
    {
        //
    }

    /**
     * Handle the Appointment "restored" event.
     *
     * @param \App\Models\Appointment $appointment
     * @return void
     */
    public function restored(Appointment $appointment)
    {
        //
    }

    /**
     * Handle the Appointment "force deleted" event.
     *
     * @param \App\Models\Appointment $appointment
     * @return void
     */
    public function forceDeleted(Appointment $appointment)
    {
        //
    }
}
