<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'addres',
        'nomor_tlp',
        'ttl',
        'foto',
    ];
}
