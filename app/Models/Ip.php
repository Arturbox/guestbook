<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 06.11.2018
 * Time: 23:05
 */

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{

    public $timestamps = true;


    protected $primaryKey = 'id';

    protected $fillable = ['ip','browser'];

    protected $dates = ['created_at','updated_at'];






}