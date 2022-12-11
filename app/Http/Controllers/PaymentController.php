<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Repositories\Interface\PaymentRepositoryInterface;
use Illuminate\Http\Response;

class PaymentController extends Controller
{

    public function __construct(public PaymentRepositoryInterface $payment)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->payment->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        return '';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomerRequest $request
     * @return Response
     */
    public function store(StoreCustomerRequest $request)
    {
        return $this->payment->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return $this->payment->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->payment->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param UpdateCustomerRequest $request
     * @return Response
     */
    public function update($id, UpdateCustomerRequest $request)
    {
        return $this->payment->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->payment->destroy($id);
    }
}
