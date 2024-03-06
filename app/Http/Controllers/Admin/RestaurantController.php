<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newTypes = new Type();
        $type = $newTypes::all();
        return view('admin.restaurants.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newRestaurantData = $request->all();
        $newRestaurant = new Restaurant();
        $newRestaurant -> fill($newRestaurantData);
        $newRestaurant->save();
        return redirect()->route('admin.restaurants.show', $newRestaurant->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $newRestaurant = new Restaurant();
        // per identificare che deve andare in quell'id
        $restaurant = $newRestaurant::all()[$id -1];
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}