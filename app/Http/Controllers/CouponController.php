<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function apply(Request $request)
    {
        $request->validate([
            'code' => 'required|exists:coupons,code',
        ]);

        $coupon = Coupon::where('code', $request->code)->first();

        return response()->json([
            'discount' => $coupon->discount,
            'is_percentage' => $coupon->is_percentage,
        ]);
    }
}