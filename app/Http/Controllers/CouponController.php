<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Models\CouponModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * @param CouponRequest $request
     * @return Response
     */
    public function couponCreate(CouponRequest $request){
        // validation
        $data = $request->validated();

        // insertion
        if (CouponModel::insert($data))
            return response(['msg' => 'Coupon is created successfully.'], 200);
        else
            return redirect('coupons')->with('error', 'Failed to add this coupon, try again.');

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function couponRemove(Request $request){
        $role = Auth::user()->role;
        try {
            $coupon = CouponModel::findOrFail($request->id);
            if ($coupon->delete())
                return redirect()->route($role . '-coupon')->with('success', 'Successfully removed.');
            else
                return redirect('coupons')->with('error', 'Failed to remove this coupon.');
        }catch (ModelNotFoundException $exception){
            return redirect('coupon')->with('error', 'Failed to remove this coupon.');
        }
    }

    /**
     * @param CouponRequest $request
     * @return Response
     */
    public function couponUpdate(CouponRequest $request){
        // validation
        $data = $request->validated();

        // get the current coupon ( which being updated )
        try {
            $coupon = CouponModel::findOrFail($request->get('coupon_id'));
        }catch (ModelNotFoundException $exception){
            return redirect()->route('vendor-coupon')->with('error', 'Something went wrong, try again.');
        }

        // update
        if ($coupon->update($data))
            return response(['msg' => 'Coupon is updated successfully.'], 200);
        else
            return redirect()->route('vendor-coupon')->with('error', 'Something went wrong, try again.');
    }
}
