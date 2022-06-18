<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.index', [
            'inventorys' => Inventory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create', [
            'inventorys' => Inventory::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'harga' => 'required|max:255',
            'stock' => 'required|max:255',
            'created_by' => 'required', 'in:admin,user',
            'updated_by' => 'required', 'in:admin,user',
        ]);
        Inventory::create($validatedData);
        return redirect('/inventory')->with('succes', 'Inventory has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', [
            'inventory' => $inventory,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $rules = [
            'nama_barang' => 'required|max:255',
            'harga' => 'required|max:255',
            'stock' => 'required|max:255',
            'created_by' => 'required', 'in:admin,user',
            'updated_by' => 'required', 'in:admin,user',
        ];
        $validatedData = $request->validate($rules);
        Inventory::where('id', $inventory->id)->update($validatedData);
        return redirect('/inventory')->with('success', 'Inventory has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        Inventory::destroy($inventory->id);
        return redirect('/inventory')->with('success', 'Article has been deleted!');
    }
}
