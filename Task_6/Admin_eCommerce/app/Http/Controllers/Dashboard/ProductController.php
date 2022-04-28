<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public const statues = ['Not Active','Active'];
    public function index(){
        $products = DB::table('products')->get();
        return view('Products.index',compact('products'));
    }

    public function create(){
        $brands = DB::table('brands')->select('id','name_en','name_ar')->get();
        $subcategories = DB::table('sub_category')->select('id','name_en','name_ar')->get();
      return view('Products.Create',compact('brands','subcategories'))->with('statues',self::statues);
    }

    public function store(){
        return view('');
      }
}
