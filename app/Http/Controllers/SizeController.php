<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        $data['sizes'] = $sizes;
        return view('admin.size_manage', $data);
    }
    public function add()
    {
        return view('admin.size_add');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:sizes,name',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/size/add');
        }
        Size::insert([
            "name" => $request->name,
            "status" => $request->status,
        ]);
        $request->session()->flash('message', 'Size added successfully.');
        return redirect('admin/size');
    }
    public function delete(Request $request, $id = 0)
    {
        $size = Size::find($id);
        if ($size) {
            $size_name = $size->name;
            $size->delete();
            $request->session()->flash('message', $size_name . ' deleted successfully.');
            return redirect('admin/size');
        } else {
            $request->session()->flash('error', 'Size not found.');
            return redirect('admin/size');
        }
    }
    public function edit(Request $request, $id = 0)
    {
        $size = Size::find($id);
        if ($size) {
            $data['size'] = $size;
            return view('admin.size_edit', $data);
        } else {
            $request->session()->flash('error', 'Size not found.');
            return redirect('admin/size');
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/size/edit/' . $request->id);
        }
        $size = Size::find($request->id);
        $p_size = Size::where('name', $request->name)->first();
        if ($p_size && $p_size->id != $size->id) {
            $request->session()->flash('error', 'Size with same name exits.');
            return redirect('admin/size/edit/' . $request->id);
        }
        if ($size) {
            $cat['name'] = $request['name'];
            $cat['status'] = $request['status'];
            $size->save();
            $request->session()->flash('message', $request['name'] . 'updated successfully.');
            return redirect('admin/size');
        } else {
            $request->session()->flash('error', 'Size not found.');
            return redirect('admin/size');
        }
    }
    public function status(Request $request, $id = 0, $type = '1')
    {
        $size = Size::find($id);
        if ($size) {
            $size->status = $type;
            $size->save();
            $request->session()->flash('message', 'Size status updated.');
            return redirect('admin/size');
        } else {
            $request->session()->flash('error', 'Size not found.');
            return redirect('admin/size');
        }
    }
}
