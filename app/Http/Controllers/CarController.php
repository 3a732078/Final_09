<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\carry;
use App\Models\item;
use Illuminate\Http\Request;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = item::orderBy('id', 'ASC')
            -> get();
        $item = ['items' => $items];



        $karries = carry::orderBy('id','ASC')
            ->get();

        $cars = car::all() ;


        return view('boss.car.car',
            $item,['cars' => $cars,'karries' => $karries]);

    }

    public function increse(Request $request, $id)
    {
        $post = car::find($id);
        $post->count = $post->count + 1;
        $post->save();
        return redirect() -> route('boss.car');

    }

    public function decrese(Request $request, $id)
    {
        $post = car::find($id);
        $post->count = $post->count - 1;
        $post->save();
        return redirect() -> route('boss.car');

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = item::find($id);
        $post->count = $post->count +1 ;
        $post-save();
        return redirect()
            ->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(car $car)
    {
        //
    }
}
