<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OccasionResource;
use App\Models\Occasion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class OccasionController extends Controller
{
    public function index(Request $request)
    {
        $queryBuilder = Occasion::query();

        $params = $request->all();

        // Page limit
        if (!empty($params['limit'])) {
            $limit = Arr::pull($params, 'limit');
        }

        // Sort field
        if (!empty($params['sort'])) {
            $sort = Arr::pull($params, 'sort');
        } else {
            $sort = 'occasion';
        }

        // Sort direction ASC or DESC
        if (!empty($params['direction'])) {
            $direction = Arr::pull($params, 'direction');
        }

        foreach ($params as $key => $value) {
            $queryBuilder->where($key, $value);
        }

        $queryBuilder->orderBy($sort, $direction ?? 'Asc');

        //return new OccasionResource($queryBuilder->paginate($limit ?? 100));
        return OccasionResource::collection($queryBuilder->paginate($limit ?? 100));
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
            'occasion' => 'required|max:255',
            'date' => 'required|date',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $category = Occasion::create($data);

        return response([ 'occasion' => new OccasionResource($category), 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $occasion
     * @return \Illuminate\Http\Response
     */
    public function show(Occasion $occasion)
    {
        return response([ 'occasion' => new OccasionResource($occasion), 'message' => 'Ok'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $occasion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occasion $occasion)
    {
        $occasion->update($request->all());

        return response([ 'occasion' => new OccasionResource($occasion), 'message' => 'Ok'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $occasion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occasion $occasion)
    {
        $occasion->delete();

        return response(['message' => 'Deleted']);
    }
}
