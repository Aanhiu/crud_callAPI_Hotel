<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class apiHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = hotel::all();
        return response()->json([
            'success' => true,
            'data' => $model ?? [],
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
        // 
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

        return response()->json([
            'success' => true,
            'message' => $hotel,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show theo id
        $hotelid = hotel::find($id);
        if (empty($hotelid)) {
            return response()->json([
                'success' => false,
                'data' => $hotelid,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $hotelid,
        ]);

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

        $hotel = hotel::find($id); 
        //
        //
    
        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found',
            ], 404);
        }

        

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

        return response()->json([
            'success' => true,
            'message'=> 'Chinh sua thanh cong',
            'data' => $hotel,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotel $hotel, $id)
    {
        // 
        $hotel = hotel::find($id);
        $hotel->delete();
        return response()->json([
            'success' => true,
            'message' => 'Xoa mem thanh cong',
        ]);

    }
}
