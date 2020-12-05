<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $queryBuilder = Category::query();

        $params = $request->all();

        // Just categories allowed to display on the website
        $queryBuilder->where('display', 1);

        foreach ($params as $key => $value) {
            $queryBuilder->where($key, $value);
        }

        $queryBuilder->orderBy('category');
        $categories = $queryBuilder->paginate();

        return new CategoryResource($queryBuilder->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'category' => 'required|max:255'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $category = Category::create($data);

        return response([ 'category' => new CategoryResource($category), 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        return response([ 'category' => new CategoryResource($Category), 'message' => 'Ok'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        $Category->update($request->all());

        return response([ 'category' => new CategoryResource($Category), 'message' => 'Ok'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        $Category->delete();

        return response(['message' => 'Deleted']);
    }
}
