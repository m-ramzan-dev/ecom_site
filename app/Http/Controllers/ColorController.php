<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::all();
        $data['colors'] = $color;
        return view('admin.color_manage', $data);
    }
    public function add()
    {
        return view('admin.color_add');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:colors,name',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/color/add');
        }
        Color::insert([
            "name" => $request->name,
            "status" => $request->status,
        ]);
        $request->session()->flash('message', 'Color added successfully.');
        return redirect('admin/color');
    }
    public function delete(Request $request, $id = 0)
    {
        $color = Color::find($id);
        if ($color) {
            $color_name = $color->name;
            $color->delete();
            $request->session()->flash('message', $color_name . ' deleted successfully.');
            return redirect('admin/color');
        } else {
            $request->session()->flash('error', 'Color not found.');
            return redirect('admin/color');
        }
    }
    public function edit(Request $request, $id = 0)
    {
        $color = Color::find($id);
        if ($color) {
            $data['color'] = $color;
            return view('admin.color_edit', $data);
        } else {
            $request->session()->flash('error', 'Color not found.');
            return redirect('admin/color');
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
            return redirect('admin/color/edit/' . $request->id);
        }
        $color = Color::find($request->id);
        $p_color = Color::where('name', $request->name)->first();
        if ($p_color && $p_color->id != $color->id) {
            $request->session()->flash('error', 'Color with same name exits.');
            return redirect('admin/color/edit/' . $request->id);
        }
        if ($color) {
            $color['name'] = $request['name'];
            $color['status'] = $request['status'];
            $color->save();
            $request->session()->flash('message', $request['name'] . 'updated successfully.');
            return redirect('admin/color');
        } else {
            $request->session()->flash('error', 'Color not found.');
            return redirect('admin/color');
        }
    }
    public function status(Request $request, $id = 0, $type = '1')
    {
        $color = Color::find($id);
        if ($color) {
            $color->status = $type;
            $color->save();
            $request->session()->flash('message', 'Color status updated.');
            return redirect('admin/color');
        } else {
            $request->session()->flash('error', 'Color not found.');
            return redirect('admin/color');
        }
    }
}
