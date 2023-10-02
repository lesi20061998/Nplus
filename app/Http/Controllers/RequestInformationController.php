<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\RequestInformation;
use Illuminate\Support\Facades\Auth;

class RequestInformationController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user' => function ($query) {
            $query->where('name', 'Admin');
        }, 'requestInformation'])->get();
        return view('admin.request_informations.index', compact('requestInformations'));
    }
    public function show(RequestInformation $requestInformation)
    {
        return view('admin.request_informations.show', compact('requestInformation'));
    }

    public function edit(RequestInformation $requestInformation)
    {
        return view('admin.request_informations.edit', compact('requestInformation'));
    }

    public function update(Request $request, RequestInformation $requestInformation)
    {
        $validatedData = $request->validate([
            'organization_or_individual_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_address_street' => 'required|string|max:255',
            'contact_address_ward' => 'required|string|max:255',
            'contact_address_district' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:request_informations,email,' . $requestInformation->id,
            'address' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'sheet_number' => 'required|string|max:255',
            'plot_number' => 'required|string|max:255',
            'boundary_scope' => 'required|string|max:255',
            'area_size' => 'required|numeric|min:0',
            'coordinate_x' => 'required|numeric',
            'coordinate_y' => 'required|numeric',
        ]);

        $requestInformation->update($validatedData);

        return redirect()->route('admin.request_informations.index')->with('success', 'Request Information updated successfully.');
    }

    public function destroy(RequestInformation $requestInformation)
    {
        $requestInformation->delete();

        return redirect()->route('admin.request_informations.index')->with('success', 'Request Information deleted successfully.');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'organization_or_individual_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_address_street' => 'required|string|max:255',
            'contact_address_ward' => 'required|string|max:255',
            'contact_address_district' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:request_informations',
            'address' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'sheet_number' => 'required|string|max:255',
            'plot_number' => 'required|string|max:255',
            'boundary_scope' => 'required|string|max:255',
            'area_size' => 'required|numeric|min:0',
            'coordinate_x' => 'required|numeric',
            'coordinate_y' => 'required|numeric',
        ]);

        $requestInformation = new RequestInformation($validatedData);
        $requestInformation->save();

        $payment = new Payment([
            'access_code' => 'Nplus_' . str_pad($requestInformation->id, 4, '0', STR_PAD_LEFT),
            'order_status' => 'pending',
            'payment_method' => 'credit_card',
            'user_id' => auth()->user()->id,
        ]);
        $requestInformation->payment()->save($payment);

        return redirect()->route('admin.request_informations.index')->with('success', 'Request Information created successfully.');
    }
}