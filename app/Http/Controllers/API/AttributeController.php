<?php
namespace App\Http\Controllers\API;

use App\Attribute;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttributeController extends Controller
{
    public function index()
    {
        abort_if(Auth::User()->role !== 4, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributes = Attribute::all();

        return response()->json($attributes);
    }

    public function store(Request $request)
    {
        abort_if(Auth::User()->role !== 4, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attribute = Attribute::create($request->all());

        return response()->json($attribute, 201);
    }

    public function show(Attribute $attribute)
    {
        abort_if(Auth::User()->role !== 4, Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttributeResource($attribute);
    }

    public function update(Request $request, Attribute $attribute)
    {
        abort_if(Auth::User()->role !== 4, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attribute->update($request->all());

        return response()->json();
    }

    public function destroy(Attribute $attribute)
    {
        abort_if(Auth::User()->role !== 4, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attribute->delete();

        return response()->json();
    }

}
