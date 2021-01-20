<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use App\Models\car;
use App\Models\item;
use App\Models\User;
use Illuminate\Http\Request;


class BossController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        //
        $p = item::orderBy('created_at', 'ASC')
            -> get();
        $item = ['item' => $p];

        return view('boss.index',$item);
    }

    public function carry(Request $request,car $car){
        $post = User::where('id',
        $request->car()-all())->get();
    }

    public function car(Request $request)
    {
        //
        $tasks = User::where('id',
            $request->user()->id)->get();
        return view('boss.car',
            ['tasks' => $tasks]);
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
    public function store(RequestAlias $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boss  $boss
     * @return \Illuminate\Http\Response
     */
    public function show(Boss $boss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boss  $boss
     * @return \Illuminate\Http\Response
     */
    public function edit(Boss $boss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boss  $boss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = car::find($id);
        $post->count = $post->count + 1;
        $post->save();
        return redirect('boss/index');

    }

    public function increse(Request $request, $id)
    {
        $post = car::find($id);
        $post->count = $post->count + 1;
        $post->save();
        return redirect('boss/index');

    }

    public function decrese(Request $request, $id)
    {
        $post = car::find($id);
        $post->count = $post->count - 1;
        $post->save();
        return redirect('boss/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boss  $boss
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boss $boss)
    {
        //
    }
}
