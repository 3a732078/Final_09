<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\carry;
use App\Models\item;
use Illuminate\Http\Request;

class CarryController extends Controller
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
    public function store(Request $request)
    {
        $cars = car::all();


        $carry = new carry;
        foreach ($cars as $car) {

            $carry->count = $car -> count;
            $carry->price = $car -> price;
            $carry->save() ;
            car::destroy($car -> id);
        }
        return redirect(route('boss.car'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carry  $carry
     * @return \Illuminate\Http\Response
     */
    public function show(carry $carry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carry  $carry
     * @return \Illuminate\Http\Response
     */
    public function edit(carry $carry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carry  $carry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carry $carry,$id)
    {
        $carries = $carry->find($id) ;
        $carries -> status = '運送中';

        $items = item::find($id);
        $items-> Sell = $items -> Sell + $carries -> count;

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carry  $carry
     * @return \Illuminate\Http\Response
     */
    public function destroy(carry $carry)
    {
        //
    }
}
