<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zadacha extends Model
{
  	public $timestamps=false;
  	protected $table='modx_site_content';
    protected $fillable=[
        'pagetitle',
        'longtitle',
        'description',
        'alias',
        'published',
        'parent',
        'introtext',
        'content',
        'menuindex'
    ];
}
