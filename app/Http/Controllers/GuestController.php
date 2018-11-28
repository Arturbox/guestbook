<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 06.11.2018
 * Time: 23:00
 */

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Ip;
use App\Models\Review;

use Illuminate\Http\Request;




class GuestController
{
    public function index(Request $request)
    {

        $clients = Client::query()
            ->leftJoin('reviews', 'reviews.client_id', '=', 'clients.id')
            ->select('reviews.id','reviews.text',
                'reviews.created_at','clients.name',
                'clients.email'
            )->sortable()->paginate(25);


        return view('welcome',compact('clients'));
    }

    public function sendReview(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:191|regex:/^[a-zA-Z0-9]/',
            'email' => 'required|email',
            'text' => 'required',
        ]);

        $browser_info = $request->server('HTTP_USER_AGENT');
        $ip_info = $request->ip();

        $client = Client::where('email', '=', array_intersect_key($validatedData,
            array_flip(['email'])) )->first();
        //if not exists client
        if (!$client) {
            $client = new Client(array_intersect_key($validatedData,array_flip(['name','email','homepage'])));
            $client->save();
        }
        //save ip and browser in relationship table ip
        $ip = new Ip(['ip'=>$ip_info,'browser' => $browser_info]);
        Client::find($client->id)->clientIps()->save($ip);

        //save review
        $review = new Review();
        $review->text =  strip_tags($validatedData['text']);
        $review->client_id = $client->id;
        $review->save();





        return redirect()->to(url()->previous())->with('thank','Save' );
    }
}



