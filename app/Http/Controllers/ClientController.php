<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller {
    
    private function getRandomExpert() {
        $randomExpert = \DB::table('experts')->inRandomOrder()->pluck('id')->first();
        return $randomExpert;
    }

    public function store() {
        $fields = request()->validate([
          'first_name'        => 'required',
          'last_name'         => 'required',
          'email'             => 'required|email',
          'phone'             => [
            'required',
            'regex:/^(\+34|0034|34)?[\s|\-|\.]?[6-9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/'
          ],
          'net_income'        => 'required|numeric',
          'requested_amount'  => 'required|numeric',
          'time_slot'         => 'required|numeric',
        ]);

        Client::create([
          'first_name'        => request('first_name'),
          'last_name'         => request('last_name'),
          'email'             => request('email'),
          'phone'             => request('phone'),
          'net_income'        => request('net_income'),
          'requested_amount'  => request('requested_amount'),
          'time_slot'         => request('time_slot'),
          'expert'            => $this->getRandomExpert(),
        ]);

        return redirect()->route('home', ['status' => 1]);
    }

}
