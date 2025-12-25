<?php

namespace App\Http\Controllers;

use App\Jobs\BulkMailSend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::latest('id')
                 ->select('id', 'name', 'email')
                 ->take(5)
                 ->get();
        BulkMailSend::dispatch($users);
        $channel = "mail_channel";
        $message = "Welcome emails have been sent to the latest 5 users.";
        Redis::publish($channel, $message);
        $channel2 = "mail_channel2";
        $message2 = "Welcome emails have been sent to the latest 5 users.";
        Redis::publish($channel2, $message2);
        $startTime = microtime(true);
        $users = json_decode(Redis::get('users'));
        if (!$users) {
            $users = User::latest('id')
                     ->select('id', 'name', 'email', 'created_at')
                     ->get();
            Redis::set('users', json_encode($users));
        }
        $users = collect($users);
        $random = rand(1000, 9999);
        $lastID = count($users) + 1;
        $users->unshift([
            'id' => $lastID,
            'name' => 'New User '.$random,
            'email' => "test$random@gmail.com",
            'created_at' => now()->toDateTimeString(),
        ]);
        Redis::set('users', json_encode($users));
        $users = json_decode($users);
        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;
        return view('home', compact('users', 'executionTime'));
    }
}
