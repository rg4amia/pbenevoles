<?php

namespace App\Listeners;

use App\Events\AssociationBenevoleSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateAssociationBenevoleMatricule
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
     * @param  \App\Events\AssociationBenevoleSaved  $event
     * @return void
     */
    public function handle(AssociationBenevoleSaved $event)
    {
        $event->associationbenevole->matricule = str_pad($event->associationbenevole->id, 8, '0', STR_PAD_LEFT);
        $event->associationbenevole->save();
    }
}
