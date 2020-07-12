<?php

namespace App\Listeners;

use App\Models\UserLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class LogSuccessfullLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if(!session()->has('loginas')){
            $lastLogin  = new UserLogin();
            $lastLogin->user_id = optional($event->user)->id;
            $lastLogin->login_at =  Carbon::now();
            $lastLogin->login_ip = $this->request->ip();
            $lastLogin->save();
            session()->forget('loginas');
        }
    }
}
