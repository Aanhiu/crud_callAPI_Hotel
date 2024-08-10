<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $getlisthotel = hotel::all();
        //dd($getlisthotel);
        return view('hotels.list', compact('getlisthotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('hotels.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(hotel $hotel, Request $request)
    {
        //
        $request->validate([
            // <h1> id     name     image    location    rating    description </h1>
            'name' => 'required',
            'image' => 'required',
            'location' => 'required',
            'rating' => 'required',
            'description' => 'required',
        ]);

        $hotel = new hotel;
        $hotel->name = $request->name;

        $filename = $request->file('image');
        $pathname = rand(100000, 999999) . '_' . $filename->getClientOriginalName();
        $filename->storeAs('/public/images/', $pathname);

        $hotel->image = $pathname;
        // $hotel->image = $request->image;
        $hotel->location = $request->location;
        $hotel->rating = $request->rating;
        $hotel->description = $request->description;

        $hotel->save();

        return redirect()->route('list');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(hotel $hotel)
    {
        //
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hotel $hotel)
    {
        //
        //
        $request->validate([
            // <h1> id     name     image    location    rating    description </h1>
            'name' => 'required',
            //'image'=> 'required',
            'location' => 'required',
            'rating' => 'required',
            'description' => 'required',
        ]);

        //$hotel = new hotel;
        $hotel->name = $request->name;


        $filename = $request->file('image');
        if ($filename) {
            Storage::delete('/public/images/' . $hotel->image);
            $pathname = rand(100000, 999999) . '_' . $filename->getClientOriginalName();
            $filename->storeAs('/public/images/', $pathname);

            $hotel->image = $pathname;
        }

        $hotel->location = $request->location;
        $hotel->rating = $request->rating;
        $hotel->description = $request->description;

        $hotel->save();

        return redirect()->route('list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function delete(hotel $hotel)
    {
        //
        $hotel->delete();
        return redirect()->route('list');
    }
}
