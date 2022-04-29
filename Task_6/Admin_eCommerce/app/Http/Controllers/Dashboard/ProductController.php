<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public const statues = ['Not Active', 'Active'];
    public const max_upload_size = 1024;
    public const available_extension = ['png', 'jpg', 'jpeg'];
    public function index()
    {
        $products = DB::table('products')->get();
        return view('Products.index', compact('products'));
    }

    public function create()
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->get();
        $subcategories = DB::table('sub_category')->select('id', 'name_en', 'name_ar')->get();
        return view('Products.Create', compact('brands', 'subcategories'))->with('statues', self::statues);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'price'   => 'required|numeric|between:1,99999.99',
            'quantity' => 'nullable|integer|between:1,99',
            'code'    => 'required|max:11|unique:products',
            'statues' => 'nullable|in' . implode(',', array_keys(self::statues)),
            'brand_id' => 'nullable|integer|exists:brands,id',
            'subcategory_id' => 'nullable|integer|exists:sub_category,id',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'image'   => 'required|max:' . self::max_upload_size . ''

        ]);
        $data = $request->only('name_en', 'name_ar', 'price', 'quantity', 'desc_en', 'image', 'desc_ar', 'code', 'status', 'brand_id', 'subcategory_id');
        // dd($data);die;

        $picName = $request->file('image')->hashName();
        $data['image'] = $picName;
        $request->file('image')->move(public_path('assets/images/products'), $picName);
        DB::table('products')->insert($data);
        if ($request->has('redirect') && $request->redirect == 'index') {
            return redirect()->route('dashboard.products.index');
        }
        return redirect()->back();

        // return view('');

    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
    }
}
