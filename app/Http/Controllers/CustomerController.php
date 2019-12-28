<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::where(
            'active',
            $request->query('active', 1)
        )->get();

        return view('customer.index', compact(['customers']));
    }

    public function create()
    {
        $customer = new Customer();

        return view('customer.create', compact(['customer']));
    }

    public function store()
    {
        $customer = Customer::create($this->validateData());

        return redirect('/customers/' . $customer->id);
    }

    public function show(Customer $customer)
    {
        // $customer = \App\Customer::findOrFail($customerId);

        return view('customer.show', compact(['customer']));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact(['customer']));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateData());

        return redirect('/customers');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('/customers');
    }

    protected function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
    }
}
