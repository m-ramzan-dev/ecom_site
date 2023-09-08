<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $data['products'] = $products;
        return view('admin.product_manage', $data);
    }
    public function add()
    {
        $categories = Category::where(['status' => 1])->get();
        $sizes = Size::all();
        $colors = Color::all();
        $data['sizes'] = $sizes;
        $data['colors'] = $colors;
        $data['categories'] = $categories;
        return view('admin.product_add', $data);
    }
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name',
            'category_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'technical_specification' => 'required',
            'keywords' => 'required',
            'uses' => 'required',
            'status' => 'required',
            'warranty' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/product/add');
        }
        $image_name = "";
        if ($request->hasFile('image')) {
            // $image = $request->file('image');
            // $ext = $image->extension();
            // $image_name = time() . '.' . $ext;
            // $image->move(public_path('images/'), $image_name);
        }
        $pid = Product::insertGetId([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "brand" => $request->brand,
            "image" => $image_name,
            "model" => $request->model,
            "technical_specification" => $request->technical_specification,
            "keywords" => $request->keywords,
            "uses" => $request->uses,
            "status" => $request->status,
            "warranty" => $request->warranty,
            "description" => $request->description,
        ]);
        foreach ($request['sku'] as $key => $value) {
            $attribute_image = "";
            if (isset($request["attribute_image"][$key])) {
                // $image = $request->file($request["attribute_image"][$key]);
                // $ext = $image->extension();
                // $attribute_image = time() . '.' . $ext;
                // $image->move(public_path('images/'), $attribute_image);
            }
            ProductAttribute::insert([
                "product_id" => $pid,
                "sku" => $request['sku'][$key],
                "mrp" => $request['mrp'][$key],
                "price" => $request['price'][$key],
                "qty" => $request['qty'][$key],
                "image" => $attribute_image,
                "size_id" => $request['size_id'][$key],
                "color_id" => $request['color_id'][$key],
            ]);
        }
        $request->session()->flash('message', 'Prodcut added successfully.');
        return redirect('admin/product');
    }
    public function delete(Request $request, $id = 0)
    {
        $product = Product::find($id);
        if ($product) {
            $product_name = $product->name;
            $product->delete();
            $request->session()->flash('message', $product_name . ' deleted successfully.');
            return redirect('admin/product');
        } else {
            $request->session()->flash('error', 'Product not found.');
            return redirect('admin/product');
        }
    }
    public function edit(Request $request, $id = 0)
    {
        $product = Product::find($id);
        if ($product) {
            $data['product'] = $product;
            $categories = Category::where(['status' => 1])->get();
            $data['categories'] = $categories;
            return view('admin.product_edit', $data);
        } else {
            $request->session()->flash('error', 'Product not found.');
            return redirect('admin/product');
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

            'category_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'technical_specification' => 'required',
            'keywords' => 'required',
            'uses' => 'required',
            'status' => 'required',
            'warranty' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/product/edit/' . $request->id);
        }
        $product = Product::find($request->id);
        $p_product = Product::where('name', $request->name)->first();
        if ($p_product && $p_product->id != $product->id) {
            $request->session()->flash('error', 'Product with same name exits.');
            return redirect('admin/product/edit/' . $request->id);
        }
        $image_name = "";
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->move(public_path('images/'), $image_name);
        }

        if ($product) {
            $product['name'] = $request['name'];
            $product['category_id'] = $request['category_id'];
            $product['brand'] = $request['brand'];
            $product['model'] = $request['model'];
            $product['technical_specification'] = $request['technical_specification'];
            $product['keywords'] = $request['keywords'];
            $product['uses'] = $request['uses'];
            $product['status'] = $request['status'];
            $product['warranty'] = $request['warranty'];
            $product['description'] = $request['description'];
            $product['image'] = $image_name;

            $product->save();
            $request->session()->flash('message', $request['name'] . 'updated successfully.');
            return redirect('admin/product');
        } else {
            $request->session()->flash('error', 'Product not found.');
            return redirect('admin/product');
        }
    }
    public function status(Request $request, $id = 0, $type = '1')
    {
        $product = Product::find($id);
        if ($product) {
            $product->status = $type;
            $product->save();
            $request->session()->flash('message', 'Product status updated.');
            return redirect('admin/product');
        } else {
            $request->session()->flash('error', 'Product not found.');
            return redirect('admin/product');
        }
    }
}
