<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\Payment\PaymentAddRequest as PayAddReq;
use App\Http\Requests\Payment\PaymentEditRequest as PayEditReq;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::paginate();
        return view('admin.payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PayAddReq $request, Payment $payment)
    {
        $model = $payment->add();
        
        if($model){
            return redirect()->route('payment.index')->with('success','Add New Payment Method Successful');
        }else{
            return redirect()->back()->with('error','Add New Payment Method Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $model = $payment;
        return view('admin.payment.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        if ($payment->update_record()) {
            return redirect()->route('payment.index')->with('success','Update Payment Method Successful');
         }else{
            return redirect()->back()->with('error','Update Payment Method Failed');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        if($payment && $payment->orderdetails->count() == 0){
            $payment->delete();
            return redirect()->route('payment.index')->with('success ',' Successfully Deleted Payment Method');
        }else{
            return redirect()->route('payment.index')->with('error','Delete Payment Method Failed');
        }
    }
}
