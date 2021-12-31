<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function find(Request $request)
    {
        if ($request->all()) {
            return response()->json(Country::where($request->all())->first(), 200);
        } else {
            return response()->json(Country::get(), 200);
        }
    }

    public function findById($id)
    {
        return response()->json(Country::find($id), 200);
    }

    public function create(Request $request)
    {
        return response()->json(Country::create($request->all()), 201);
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function delete($id)
    {
        Country::destroy($id);
        return response()->json(200);
    }
}
