<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    public function getProducts(){
        $pds=Product::OrderBy('id', 'desc')->with('user')->get();
        return response()->json ($pds);
    }
    public function postNewProduct(Request $request){
        $this->validate ($request,[
           'title'=>'required',
           'body'=>'required'
        ]);
        $user=User::where('id', 1)->first();
        $pd=new Product();
        $pd->title=$request['title'];
        $pd->body=$request['body'];
        $user->product()->save($pd);

        return response ()->json(['msg'=>'The product have been created.']);

    }
}
