<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $search = "";
        $queryBuilder = Product::query()
        ->with('images')
        ->with('categories')
        ->with('subcategories')
        ->with('colors')
        ->with('occasions');

        $params = $request->all();

        // Page limit
        if (!empty($params['limit'])) {
            $limit = Arr::pull($params, 'limit');
        }

        // Sort field
        if (!empty($params['sort'])) {
            $sort = Arr::pull($params, 'sort');
        } else {
            $sort = 'product_code';
        }

        // Sort direction ASC or DESC
        if (!empty($params['direction'])) {
            $direction = Arr::pull($params, 'direction');
        }

        foreach ($params as $key => $value) {

            if ($key == "slug") {

                $queryBuilder->where($key, $value);

            } elseif ($key == "category_slug") {

                $queryBuilder->whereHas('categories', function($q) use ($value)
                {
                    $q->where('slug', '=', $value);
                });

            } elseif ($key == "search") {

                $search = $value;

            } elseif ($key == "sale") {

                $queryBuilder->where($key, $value);

            } elseif ($key == "release") {

                $queryBuilder->where($key, $value);

            } else {
                // Search over relationships
                if ($key == "category" || $key == "subcategory" || $key == "color" || $key == "occasion") {
                    $queryBuilder->whereHas(Str::plural($key), function($q) use ($key, $value)
                    {
                        $q->where($key, 'like', '%'. $value . '%');
                    });
                }
            }
        }

        if ($search != "") {
            $queryBuilder->where(function($query) use ($search) {
                $query
                    ->where('base_code', 'like', '%' . $search . '%')
                    ->orWhere('product_code', 'like', '%' . $search . '%')
                    ->orWhere('product_title', 'like', '%' . $search . '%')
                    ->orWhere('product_description', 'like', '%' . $search . '%');
            });
        }

        //$queryBuilder->dd();
        if ($sort === 'rand') {
            $queryBuilder->inRandomOrder();
        } else {
            $queryBuilder->orderBy($sort, $direction ?? 'Asc');
        }

        return ProductResource::collection($queryBuilder->paginate($limit ?? 100));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'product_title' => 'required|max:255'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $product = Product::create($data);

        if($request->hasfile('filename')) {
            // Upload images
            $images = $this->uploadImage($request);

            foreach ($images as $key => $value) {
                $prod_image = new ProductImage;
                $prod_image->product_id = $product->id;
                $prod_image->image_name = $value;
                //$prod_image->image_url = $value;
                $prod_image->save();
            }
        }
        return response([ 'category' => new ProductResource($product), 'message' => 'Created successfully'], 200);

    }

    private function uploadImage($request)
    {
        $this->validate($request, [
            'filename.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        foreach($request->file('filename') as $file)
        {
            $name = time().'.'.$file->extension();
            $file->move(public_path().'/img/products/' . $request->base_code, $name);
            $data[] = $name;
        }

        return $data;
    }

    public function show(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }

    public function generateImages(Request $request)
    {
        if ($request->input('key') === 'generate-images') {

            $products = DB::table('products')
                ->select('base_code', 'old_code', 'product_code', 'id')
                ->get();

            DB::table('product_images')->truncate();

            $real_path = realpath('');

            foreach ($products as $product) {

                if (!is_dir("{$real_path}/img/products/{$product->base_code}")) {
                    mkdir("{$real_path}/img/products/{$product->base_code}", 0777, true);
                }

                $product_image = glob("{$real_path}/img/products/{$product->product_code}.jpg");

                if (count($product_image) > 0) {

                    copy($product_image[0],
                        "{$real_path}/img/products/{$product->base_code}/{$product->product_code}.jpg");

                    DB::table('product_images')
                        ->insert([
                            'product_id' => $product->id,
                            'image_name' => $product->product_code . '.jpg',
                            'image_url' => "https://api.marcalaser.com/img/products/{$product->base_code}/{$product->product_code}.jpg",
                            'is_default' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);
                }
            }

            return response()->json('Imagens geradas com sucesso!');
        } else {
            die('Acesso negado!');
        }
    }

    public function generateSlugs(Request  $request)
    {
        if ($request->input('key') === 'generate-slugs') {
            function str_slug($value, $table): string
            {
                $slug = Str::slug($value);

                $items = DB::table($table)
                    ->select('slug')
                    ->get();

                $t = 0;
                foreach ($items as $item) {
                    if (Str::slug($item->slug) === $slug) {
                        $t++;
                    }
                }

                if ($t > 0) {
                    $slug = "{$slug}-{$t}";
                }

                return $slug;
            }

            $products = Product::all();

            foreach ($products as $product) {
                $product->slug = str_slug($product->slug, 'products');
                $product->save();
            }

            $categories = Category::all();

            foreach ($categories as $category) {
                $category->slug = str_slug($category->slug, 'categories');
                $category->save();
            }

            $subcategories = SubCategory::all();

            foreach ($subcategories as $subcategory) {
                $subcategory->slug = str_slug($subcategory->slug, 'subcategories');
                $subcategory->save();
            }

        } else {
            die('Acesso negado!');
        }

    }
}
