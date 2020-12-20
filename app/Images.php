<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
  	protected $table='images';
    protected $fillable=[
        'zadacha_id',
        'path'
    ];

    public function zadacha()
    {
        return $this->belongsTo('App\Zadacha','zadacha_id');
    }
}
