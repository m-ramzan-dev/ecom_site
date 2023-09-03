<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        $data['coupons'] = $coupons;
        return view('admin.coupon_manage', $data);
    }
    public function add()
    {
        return view('admin.coupon_add');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:coupons,title',
            'code' => 'required',
            'value' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/coupon/add');
        }
        Coupon::insert([
            "title" => $request->title,
            "code" => $request->code,
            "value" => $request->value
        ]);
        $request->session()->flash('message', 'Coupon added successfully.');
        return redirect('admin/coupon');
    }
    public function delete(Request $request, $id = 0)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            $coupon_name = $coupon->title;
            $coupon->delete();
            $request->session()->flash('message', $coupon_name . ' deleted successfully.');
            return redirect('admin/coupon');
        } else {
            $request->session()->flash('error', 'Category not found.');
            return redirect('admin/coupon');
        }
    }
    public function edit(Request $request, $id = 0)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            $data['coupon'] = $coupon;
            return view('admin.coupon_edit', $data);
        } else {
            $request->session()->flash('error', 'Coupon not found.');
            return redirect('admin/coupon');
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'required',
            'value' => 'required',

        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->first());
            return redirect('admin/coupon/edit/' . $request->id);
        }
        $coupon = Coupon::find($request->id);
        $p_coupon = Coupon::where('title', $request->title)->first();
        if ($p_coupon && $p_coupon->id != $coupon->id) {
            $request->session()->flash('error', 'Coupon with same name exits.');
            return redirect('admin/coupon/edit/' . $request->id);
        }
        if ($coupon) {
            $coupon['title'] = $request['title'];
            $coupon['code'] = $request['code'];
            $coupon['value'] = $request['value'];
            $coupon->save();
            $request->session()->flash('message', $request['title'] . 'updated successfully.');
            return redirect('admin/coupon');
        } else {
            $request->session()->flash('error', 'Coupon not found.');
            return redirect('admin/coupon');
        }
    }
    public function status(Request $request, $id = 0, $type = '1')
    {
        $c = Coupon::find($id);
        if ($c) {
            $c->status = $type;
            $c->save();
            $request->session()->flash('message', 'Coupon status updated.');
            return redirect('admin/coupon');
        } else {
            $request->session()->flash('error', 'Coupon not found.');
            return redirect('admin/coupon');
        }
    }
}
