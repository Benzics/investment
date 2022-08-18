<?php
/**
 * 
 * payment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PaymentController extends Controller
{

    public $service;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = $title = 'Payment Settings';
        $payments = $this->service->get_payments();

        return view('admin.payments', compact('page_title', 'title', 'payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = $title = 'Payment Settings';

        return view('admin.payments-create', compact('page_title', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image' => ['required', File::image()],
            'status' => 'required',
        ]);

        $image = $request->file('image')->store('uploads', 'public');

        $data = [
            'name' => $validate['name'],
            'address' => $validate['address'],
            'image' => "storage/$image",
            'status' => $validate['status'],
        ];

        $this->service->add_payment($data);

        return redirect('/admin/payment-settings')->with('success', 'Payment method successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = $title = 'Payment Settings';
        $payment = $this->service->get_payment($id);

        if(!$payment)
        {
            return back()->with('error', 'Invalid payment method ID.');
        }

        return view('admin.payments-view', compact('page_title', 'title', 'payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = $title = 'Payment Settings';
        $payment = $this->service->get_payment($id);

        if(!$payment)
        {
            return back()->with('error', 'Invalid payment method ID.');
        }

        return view('admin.payments-edit', compact('page_title', 'title', 'payment', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = $this->service->get_payment($id);

        if(!$payment)
        {
            return back()->with('error', 'Invalid payment method ID.');
        }

        $validate = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image' => ['nullable', File::image()],
            'status' => 'required',
        ]);

        if($request->filled('image'))
        {
            $image = $request->file('image')->store('uploads', 'public');
        }
        

        $data = [
            'name' => $validate['name'],
            'address' => $validate['address'],
            'image' => isset($image) ? "storage/$image" : $payment->image,
            'status' => $validate['status'],
        ];

        $this->service->edit_payment($data, $id);

        return redirect("/admin/payment-settings/$id")->with('success', 'Payment method successfully modified.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = $this->service->get_payment($id);

        if(!$payment)
        {
            return back()->with('error', 'Invalid payment method ID.');
        }

        $this->service->delete_payment($id);

        return redirect('/admin/payment-settings')->with('success', 'Payment method deleted successfully');
    }
}
