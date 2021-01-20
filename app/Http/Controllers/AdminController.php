<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Boss;
use App\Models\car;
use App\Models\carry;
use App\Models\item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(item $item)
    {
        $post = item::all();



        return view('admin.index',
            ['posts'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        item::create($request->all());

        $cars = new car();
        $cars -> goodsName = $request -> name;
        $cars -> price = $request -> price;
        $cars -> save();

        return redirect() -> route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function carry(admin $admin)
    {
        $carries = carry::orderBy('id','ASC')
        -> get();

        $carry = ['carries' => $carries];

        return view ('admin.carry.carry',
            $carry
        );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin,$id)
    {
        $post = item::find($id);

        $data = ['posts'=> $post] ;

        return view('admin.edit',
            $data
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin,$id)
    {
        $carries = carry::find($id);

        $carries -> status = '已出貨';

        $carries ->save();

        return redirect() -> route('admin.carry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin,$id)
    {
        item::destroy($id);
        car::destroy($id);


        return redirect()->route('admin.index');
    }
}
