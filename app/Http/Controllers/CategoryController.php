<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')
                        ->take(10)
                        ->get();
 
        return response()->json($categories);  
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
            'name' => 'required|unique:categories|min:3|max:255'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        
        $category = new Category;
        $category->name = $request->name;
        $category->save();

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
        $category = Category::find($id);

        return response()->json($category); 
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
            'name' => 'required|min:3|max:255'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

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
        $category = Category::find($id);
        $category->delete();

        return response('Ok', 200);
    }

    /**
     * Filter the category of lots.
     *
     * @param  integer  $ids
     * @return \Illuminate\Http\Response
     */
    public function filter(int $id)
    {
        // TODO так и не понял как при помощи взаимосвязей получить сразу  по нескольким  категориям лоты. Можно было создать модель таблицы category_lot и двумя запросами при помощи whereIn получить нужные данные, но это не красиво и наверняка вы посчитает за ошибку.

        $result = Category::find($id)->lots()->orderByDesc('id')->limit(10)->get(); 

        return response()->json($result); 
    }
}
