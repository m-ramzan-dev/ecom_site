<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $data['categories'] = $categories;
        return view('admin.category_manage', $data);
    }
    public function add()
    {
        return view('admin.category_add');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required|unique:categories,name',
            'cat_status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/category/add');
        }
        Category::insert([
            "name" => $request->cat_name,
            "status" => $request->cat_status,
        ]);
        $request->session()->flash('message', 'Category added successfully.');
        return redirect('admin/category');
    }
    public function delete(Request $request, $id = 0)
    {
        $cat = Category::find($id);
        if ($cat) {
            $cat_name = $cat->name;
            $cat->delete();
            $request->session()->flash('message', $cat_name . ' deleted successfully.');
            return redirect('admin/category');
        } else {
            $request->session()->flash('error', 'Category not found.');
            return redirect('admin/category');
        }
    }
    public function edit(Request $request, $id = 0)
    {
        $cat = Category::find($id);
        if ($cat) {
            $data['cat'] = $cat;
            return view('admin.category_edit', $data);
        } else {
            $request->session()->flash('error', 'Category not found.');
            return redirect('admin/category');
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required',
            'cat_status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/category/edit/' . $request->id);
        }
        $cat = Category::find($request->id);
        $p_cat = Category::where('name', $request->cat_name)->first();
        if ($p_cat && $p_cat->id != $cat->id) {
            $request->session()->flash('error', 'Category with same name exits.');
            return redirect('admin/category/edit/' . $request->id);
        }
        if ($cat) {
            $cat['name'] = $request['cat_name'];
            $cat['status'] = $request['cat_status'];
            $cat->save();
            $request->session()->flash('message', $request['name'] . 'updated successfully.');
            return redirect('admin/category');
        } else {
            $request->session()->flash('error', 'Category not found.');
            return redirect('admin/category');
        }
    }
    public function status(Request $request, $id = 0, $type = '1')
    {
        $cat = Category::find($id);
        if ($cat) {
            $cat->status = $type;
            $cat->save();
            $request->session()->flash('message', 'Category status updated.');
            return redirect('admin/category');
        } else {
            $request->session()->flash('error', 'Category not found.');
            return redirect('admin/category');
        }
    }
}
