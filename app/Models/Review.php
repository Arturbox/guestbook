<?php

/**
 * Created by PhpStorm.
 * User: artur
 * Date: 06.11.2018
 * Time: 23:02
 */
namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = true;


    protected $primaryKey = 'id';

    protected $fillable = ['text','client_id'];

    protected $dates = ['created_at','updated_at'];





    public function client()
    {
        return $this->hasOne('App\Models\Client','user_id','id');
    }


}