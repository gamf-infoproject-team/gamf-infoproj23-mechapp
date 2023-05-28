<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        /*if ( Auth::id() != 2 && Auth::user()->role != 3 && && Auth::user()->role != 4) {
            return abort(403);
        }*/
        if (Customer::where('id', $request->customerId)->exists()) 
        {
            if (Vehicle::where('id', $request->vehicleId)->exists()) 
            {
                // validate form data
                $formFields = $request->validate([
                    'vehicleId' => ['required'],
                    'customerId' => ['required'],
                    'jobList' => ['nullable'],
                    'partList' => ['nullable'],
                    'description' => ['nullable', 'max:255'],
                    'finalizeDate' => ['nullable']
                ]);
        
                Quotation::create($formFields);
        
                return response()->json("Succesfully created");
            }
            else 
            {
                return response()->json("Customer with given ID not exist!");
            }
        }
        else 
        {
            return response()->json("Customer with given ID not exist!");
        }


        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        /*if ( Auth::id() != 2 && Auth::user()->role != 3) {
            return abort(403);
        }*/
        
        if (Customer::where('id', $request->customerId)->exists())
        {
            if (Vehicle::where('id', $request->vehicleId)->exists())
            {
                // validate form data
                $formFields = $request->validate([
                    'vehicleId' => ['required'],
                    'customerId' => ['required'],
                    'jobList' => ['nullable'],
                    'partList' => ['nullable'],
                    'description' => ['nullable', 'max:255'],
                    'finalizeDate' => ['nullable']
                ]);
        
                $quotation->update($formFields);

                return response()->json('Successfully updated');
            }
            else 
            {
                return response()->json("Customer with given ID not exist!");
            }
        }
        else 
        {
            return response()->json("Customer with given ID not exist!");
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $quotation = Quotation::findOrFail($id);
        /*if ( Auth::id() != 2 && Auth::user()->role != 3) {
            return abort(403);
        }*/
        $quotation->delete();

        return response()->json('Successfully deleted');
    }

    public function get(Quotation $quotation)
    {
        /*if ( Auth::id() != 2 && Auth::user()->role != 3 && && Auth::user()->role != 4) {
            return abort(403);
        }*/
        return response()->json($quotation);
    }

    public function getAll()
    {
        /*if ( Auth::id() != 2 && Auth::user()->role != 3 && && Auth::user()->role != 4) {
            return abort(403);
        }*/
        return response()->json(Quotation::get());
    }
}