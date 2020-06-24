<?php


namespace App\Http\Controllers\Admin;
use App\Notifications\ReservationConfirm;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Model\Reservation;

class ReservationController extends Controller
{
    public function index(Reservation $reservation)
    {
        $reservations = Reservation::all();
        return view('admin.reservation.reservation', compact('reservations'));
    }

    public function status(Reservation $reservation, $id){

        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Notification::route('mail', $reservation->email)
        ->route('slack', 'https://hooks.slack.com/services/...')
        ->notify(new ReservationConfirm());


        Toastr::success('Reservation status change will be successfully',
         'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function destroy($id){
      Reservation::find($id)->delete();
      Toastr::success('Reservation delete successfully',
         'Success', ["positionClass" => "toast-top-right"]);
    
         return redirect()->back();
    }
}
