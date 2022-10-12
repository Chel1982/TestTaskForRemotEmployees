<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot;
use Illuminate\Support\Facades\Validator;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::orderByDesc('id')
                        ->take(10)
                        ->get();
 
        return response()->json($lots);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:1000'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        
        $lot = new Lot;
        $lot->name = $request->name;
        $lot->description = $request->description;
        $lot->save();

        return response('Ok', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lot = Lot::find($id);

        return response()->json($lot);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required_without:description|min:3|max:255',
            'description' => 'required_without:name|min:3|max:1000'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $lot = Lot::find($id);

        if ($request->name) {
            $lot->name = $request->name; 
        }

        if ($request->description) {
            $lot->description = $request->description;
        }

        $lot->save();

        return response('Ok', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lot = Lot::find($id);
        $lot->delete();

        return response('Ok', 200);
    }
}
