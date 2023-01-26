<?php

namespace App\Observers;

use App\Models\School;
use App\Services\Accounting;

class SchoolObserver
{
    /**
     * Handle the School "created" event.
     *
     * @param  \App\Models\School  $school
     * @return void
     */
    public function created(School $school)
    {
        $data = [
            'account_type' => Accounting::SCHOOL,
            'account_number' => Accounting::generateAccountNumber(),
            'balance' => 0,
            'owner_id' => $school->id,
            'account_name' => $school->name
        ];

        Accounting::createAccount($data);


    }

    /**
     * Handle the School "updated" event.
     *
     * @param  \App\Models\School  $school
     * @return void
     */
    public function updated(School $school)
    {
        //
    }

    /**
     * Handle the School "deleted" event.
     *
     * @param  \App\Models\School  $school
     * @return void
     */
    public function deleted(School $school)
    {
        //
    }

    /**
     * Handle the School "restored" event.
     *
     * @param  \App\Models\School  $school
     * @return void
     */
    public function restored(School $school)
    {
        //
    }

    /**
     * Handle the School "force deleted" event.
     *
     * @param  \App\Models\School  $school
     * @return void
     */
    public function forceDeleted(School $school)
    {
        //
    }
}
