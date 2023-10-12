<?php

namespace App\Models;

use App\Events\AssociationBenevoleSaved;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationBenevole extends Model
{
    use HasFactory,HasUuids;


    protected $dispatchesEvents = [
        'saved' => AssociationBenevoleSaved::class,
    ];
}
