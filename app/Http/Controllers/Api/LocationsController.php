<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\APITokens;
use App\Models\Cities;
use App\Models\Towns;
use App\Models\Neighborhoods;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function cities(Request $request)
    {
        $cities = Cities::all();
        return response()->json([
            'result' => 'success',
            'message' => 'Cities',
            'data' => $cities
        ], 200);
    }
    public function city($id)
    {
        $city = Cities::where('id', $id)->with('getTowns')->get();
        return response()->json([
            'result' => 'success',
            'message' => 'Cities',
            'data' => $city
        ], 200);
    }
    public function cityArray($id)
    {
        $id = explode(",", $id);
        $cities = Cities::whereIn('id', $id)->with('getTowns')->get();
        $data = [];
        foreach ($cities as $city) {
            array_push($data, $city);
        }
        return response()->json([
            'result' => 'success',
            'message' => 'Cities',
            'data' => $data
        ], 200);
    }
    public function town($id)
    {
        $town = Towns::where('id', $id)->with('getNeighborhoods')->get();
        foreach ($town as $to) {
            foreach ($to->getNeighborhoods as $neighborhood) {
                if ($neighborhood->latitude == NULL or $neighborhood->latitude == "") {
                    $neighborhood->latitude = $to->latitude;
                }
                if ($neighborhood->longitude == NULL or $neighborhood->longitude == "") {
                    $neighborhood->longitude = $to->longitude;
                }
            }
        }
        return response()->json([
            'result' => 'success',
            'message' => 'Towns',
            'data' => $town
        ], 200);
    }
    public function townArray($id)
    {
        $id = explode(",", $id);
        $towns = Towns::whereIn('id', $id)->with('getNeighborhoods')->get();
        $data = [];
        foreach ($towns as $town) {
            array_push($data, $town);
        }
        return response()->json([
            'result' => 'success',
            'message' => 'Towns',
            'data' => $data
        ], 200);
    }
}
