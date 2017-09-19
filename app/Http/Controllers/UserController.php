<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\Product as Product;
use App\Link as Link;

class UserController extends Controller
{
  public function index($user = null)
  {
    if(is_null($user)) {
      $user = User::all();
    }

    return response()->json($user);
  }

  public function own(Request $request, User $user, Product $product)
  {
    $this->validate($request, [
        'token' => 'required',
    ]);

    $auth = User::where('token', $request->token)->firstOrFail();

    $user->products()->save($product);

    return response()->json($user->products());
  }

  public function disown(Request $request, User $user, Product $product)
  {
    $this->validate($request, [
        'token' => 'required',
    ]);

    $auth = User::where('token', $request->token)->firstOrFail();

    $q = Link::query();
    $q->ofUser($user->id);
    $q->ofProduct($product->id);
    $link = $q->firstOrFail();

    $id = $link->id;
    $user->products()->detach($id);

    return response()->json([
      'id'      => $id,
      'deleted' => 'true',
    ]);
  }

  public function transfer(Request $request, User $oldUser, Product $product, $newUserID = null)
  {
    $this->validate($request, [
        'token' => 'required',
    ]);

    $auth = User::where('token', $request->token)->firstOrFail();
    $newUser = User::where('id', $newUserID)->firstOrFail();

    $q = Link::query();
    $q->ofUser($oldUser->id);
    $q->ofProduct($product->id);
    $link = $q->firstOrFail();

    $id = $link->id;
    $oldUser->products()->detach($id);
    $newUser->products()->save($product);

    return response()->json([
      'id'      => $id,
      'transfered' => 'true',
    ]);
  }

}
