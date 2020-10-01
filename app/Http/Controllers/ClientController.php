<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function getRandomExpert() {
        $randomExpert = \DB::table('experts')->inRandomOrder()->pluck('expert_id')->first();
        return $randomExpert;
    }

    public function store()
    {
        echo $this->getRandomExpert();die;
        $fields = request()->validate([
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email',
          'phone' => [
            'required',
            'regex:/^(\+34|0034|34)?[\s|\-|\.]?[6-9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/'
          ],
          'net_income' => 'required',
          'requested_amount' => 'required',
          'time_slot' => 'required',
          'expert' => 'required',
        ]);

        Client::create([
          'first_name' => request('first_name'),
          'email' => request('email'),
          'phone' => request('phone'),
          'net_income' => request('net_income'),
          'requested_amount' => request('requested_amount'),
          'time_slot' => request('time_slot'),
          'expert' => $this->getRandomExpert(),
        ]);

        return redirect()->route('landing_form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
