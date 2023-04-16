<?php


namespace App\Domain\Entity;


use App\Domain\Entity\Contracts\RegionFieldsContract;
use Illuminate\Database\Eloquent\Model;

class Region extends Model implements RegionFieldsContract
{
    protected $fillable = [
        'name'
    ];

    protected $table = 'regions';
}
