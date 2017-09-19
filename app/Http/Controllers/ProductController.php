<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Http\Controllers\Route as Route;
use App\Product as Product;
use App\Link as Link;
use App\User as User;

class ProductController extends Controller
{
  public function index($product = null)
  {

    if(is_null($product)) {
      $product = Product::all();
    }

    return response()->json($product);
  }

  public function store(Request $request) {
    $this->validate($request, [
        'name'        => 'required',
        'description' => 'required',
        'price'       => 'required',
        'token'       => 'required',
    ]);

    $req = collect($request->all());
    $token = $req->pluck('token');

    $user = User::where('token', $request->token)->firstOrFail();
    $product = Product::create($req->toArray());

    return response()->json($product);
  }

  public function destroy(Request $request, Product $product) {
    $this->validate($request, [
        'token' => 'required',
    ]);

    $req = collect($request->all());
    $token = $req->pluck('token');
    $id = $product->id;

    $user = User::where('token', $request->token)->firstOrFail();
    
    $product->delete();

    return response()->json([
      'id'      => $id,
      'deleted' => 'true',
    ]);
  }

  public function update(Request $request, Product $product) {
    $this->validate($request, [
        'name'        => 'required',
        'description' => 'required',
        'price'       => 'required',
        'token'       => 'required',
    ]);

    $req = collect($request);
    $token = $req->pluck('token');

    $user = User::where('token', $request->token)->firstOrFail();

    $product->fill($req->toArray());

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
      $file = $request->file('image');
      $contents = $file->openFile()->fread($file->getSize());
      $product->image = $contents;
    }

    $product->save();

    return response()->json($product);
  }

  public function image(Request $request, Product $product) {
    $this->validate($request, [
        'token' => 'required',
    ]);

    return response()->json($product);

    $req = collect($request);
    $token = $req->pluck('token');

    $user = User::where('token', $token)->firstOrFail();

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $contents = $file->openFile()->fread($file->getSize());
      $product->image = $contents;
    } else {

      return Response::json(array(
          'code'      =>  404,
          'message'   =>  'Invalid image file.',
      ), 404); 
    }

    $product->save();

    return response()->json($product);
  }

}

