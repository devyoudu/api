<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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

        // Page limit
        if (!empty($params['limit'])) {
            $limit = Arr::pull($params, 'limit');
        }

        // Sort field
        if (!empty($params['sort'])) {
            $sort = Arr::pull($params, 'sort');
        } else {
            $sort = 'category';
        }

        // Sort direction ASC or DESC
        if (!empty($params['direction'])) {
            $direction = Arr::pull($params, 'direction');
        }

        // Just categories allowed to display on the website
        $queryBuilder->where('display', 1);

        foreach ($params as $key => $value) {
            $queryBuilder->where($key, $value);
        }

        $queryBuilder->orderBy($sort, $direction ?? 'Asc');
        return new CategoryResource($queryBuilder->paginate($limit ?? 100));
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

        $product = Product::create($data);

        if ($product) {
            // Upload images
            $images = $this->uploadImage($request);
            $images["product_id"] = $product->id;
            foreach ($images as $key => $value) {

            }
        }

        return response([ 'product' => new ProductResource($product), 'message' => 'Created successfully'], 200);
    }

    private function uploadImage($request)
    {

        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);


        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/img/products/' . $request->base_code, $name);
                $data[] = $name;
            }
        }

        return $data;
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
