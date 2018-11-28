<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 06.11.2018
 * Time: 23:04
 */

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Client extends Model
{

    use Sortable;


    public $timestamps = true;


    protected $primaryKey = 'id';

    protected $fillable = ['email','name'];

    protected $dates = ['created_at','updated_at'];

    public $sortable = ['id','name', 'email', 'created_at'];




    /*
     * RELATIONSHPIS
     *
     * */


    public function clientIps()
    {
        return $this->belongsToMany('App\Models\Ip', 'client_ips','client_id','ip_id');
    }

    public function clientReviews()
    {
        return $this->belongsToMany('App\Models\Review', 'client_reviews','client_id','review_id');
    }


}