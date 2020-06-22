<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Model\Reservation;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $request->status = false;
        Reservation::create($request->all());
        Toastr::success('Reservation request sent successfully, we will confirm to you shortly',
         'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
