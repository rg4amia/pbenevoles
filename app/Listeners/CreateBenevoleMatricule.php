<?php

namespace App\Listeners;

use App\Events\BenevoleSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateBenevoleMatricule
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BenevoleSaved  $event
     * @return void
     */
    public function handle(BenevoleSaved $event)
    {
        $event->benevole->matricule = str_pad($event->benevole->id, 8, '0', STR_PAD_LEFT);
        $event->benevole->save();
    }
}
