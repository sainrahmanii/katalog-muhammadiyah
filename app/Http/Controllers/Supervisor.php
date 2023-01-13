<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Supervisor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supervisor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view('supervisor.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama_toko'        => 'required|unique:shops,nama_toko,except,id|max:255',
            'user_id'          => 'required|unique:shops,user_id,except,id|max:255'
        ]);

        $shop = $request->all();
        $data = $request->role;
        $no_whatsapp = $request->no_whatsapp;
        $user_id = $request->user_id;

        $user = User::find($user_id);
        $user->role = $data;
        $user->no_whatsapp = $no_whatsapp;
        $user->save();

        $shoop = Shop::create($shop);

        return redirect()->route('katalog.index');
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
        $seller = Shop::find($id);
        return view('supervisor.edit', compact('seller'));
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
        $seller = Shop::find($id);

        $validated = $request->validate([
            'nama_toko'        => 'required|unique:shops,nama_toko,except,id|max:255',
        ]);

        $seller->update([
            'nama_toko'          => $request->nama_toko
        ]);

        return redirect()->route('katalog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = Shop::find($id);
        $seller->delete();

        return redirect()->route('katalog.index');
    }

    public function all()
    {
        $sellers = Shop::all();
        return view('supervisor.shop', compact('sellers'));
    }

    public function editAll()
    {
        $edit = Shop::all();
        return view('supervisor.edit_shop', compact('edit'));
    }

    public function deleteAll()
    {
        $delete = Shop::all();
        return view('supervisor.delete_shop', compact('delete'));
    }

    public function homepage()
    {
        if (Auth::user()->role === 'SUPERVISOR') {
            return redirect()->route('katalog.index');
        }elseif (Auth::user()->role === 'SELLER') {
            return redirect('/profile');
        }else{
            return redirect('/');
        }
    }
}
