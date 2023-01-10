<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('supervisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|unique:sellers,name,except,id|max:255',
            'password'    => 'required',
            'no_whatsapp' => 'required|unique:sellers,no_whatsapp,except,id',
        ]);

        Seller::create([
            'name'          => $request->name,
            'password'      => Hash::make($request->password),
            'no_whatsapp'   => $request->no_whatsapp
        ]);

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
        $seller = Seller::find($id);
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
        $seller = Seller::find($id);

        $validated = $request->validate([
            'name'        => 'required|unique:sellers,name,except,id|max:255',
            'password'    => 'required',
            'no_whatsapp' => 'required|unique:sellers,no_whatsapp,except,id',
        ]);

        $seller->update([
            'name'          => $request->name,
            'password'      => Hash::make($request->password),
            'no_whatsapp'   => $request->no_whatsapp
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
        $seller = Seller::find($id);
        $seller->delete();

        return redirect()->route('katalog.index');
    }

    public function all()
    {
        $sellers = Seller::latest()->paginate(5);
        return view('supervisor.shop', compact('sellers'));
    }

    public function editAll()
    {
        $edit = Seller::latest()->paginate(5);
        return view('supervisor.edit_shop', compact('edit'));
    }

    public function deleteAll()
    {
        $delete = Seller::latest()->paginate(5);
        return view('supervisor.delete_shop', compact('delete'));
    }
}
