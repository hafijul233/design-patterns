<?php

namespace App\Repositories\Interface;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Customer;
use Illuminate\Http\Response;

interface PaymentRepositoryInterface
{
    /**
     * Display a listing of the customer.
     *
     * @return Response
     */
    public function index();

    /**
     * Store a newly created customer in storage.
     *
     * @param array $inputs
     * @return Response
     */
    public function store(array $inputs);

    /**
     * Display the specified customer.
     *
     * @param $id
     * @return Response
     */
    public function show($id);

    /**
     * Update the specified customer in storage.
     *
     * @param $id
     * @param array $inputs
     * @return Response
     */
    public function update($id, array $inputs);

    /**
     * Remove the specified customer from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id);
}
