<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Parcel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Actions\Parcels\PickUpOrderAction;
use App\Actions\Parcels\DropOffOrderAction;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcels =  Parcel::with('sender')->New()->paginate();

        return view('orders.index', compact('parcels'));
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrder()
    {
        $parcels =  Parcel::with('sender')->MineAsBiker()->paginate();

        return view('orders.index', compact('parcels'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pickUpParcel(Request $request,Parcel $parcel)
    {
        PickUpOrderAction::run($parcel, $request->all());
       
        Session::flash('message_biker', 'Pick Up Parcel Successfully...!'); 

        return redirect()->back();

    }  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dropOffParcel(Request $request,Parcel $parcel)
    {
        DropOffOrderAction::run($parcel, $request->all());

        Session::flash('message_biker', 'Drop off Parcel Successfully...!'); 

        return redirect()->back();

    }

}
