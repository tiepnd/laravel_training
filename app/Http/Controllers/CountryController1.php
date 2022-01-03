<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController1 extends Controller
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
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['result' => false, 'status_code' => 404, 'message' => 'not found'], 404);
        }
        return response()->json(Country::find($id), 200);
    }

    public function create(Request $request)
    {
        $rule = [
            'name' => 'required|min:3',
            'iso' => 'required|min:2|max:2'
        ];
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        return response()->json(Country::create($request->all()), 201);
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['result' => false, 'status_code' => 404, 'message' => 'not found'], 404);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function delete($id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['result' => false, 'status_code' => 404, 'message' => 'not found'], 404);
        }
        $country->delete();
        return response()->json(200);
    }
}
