<?php

namespace App\Models;

use App\Events\BenevoleSaved;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benevole extends Model
{
    use HasFactory,HasUuids;



    protected $dispatchesEvents = [
        'saved' => BenevoleSaved::class,
    ];
}
