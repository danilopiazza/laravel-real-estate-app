<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    public function index() : JsonResponse
    {
        return response()->json([
            'data' => Property::all()
        ]);
    }

    public function store(PropertyRequest $request) : JsonResponse
    {
        return response()->json([
            'data' => Property::create($request->all())
        ], 201);
    }

    public function update(PropertyRequest $request, Property $property) : JsonResponse
    {
        return response()->json([
            'data' => tap($property)->update($request->all())
        ]);
    }

    public function destroy(Property $property) : Response
    {
        $property->delete();

        return response([], 204);
    }
}
