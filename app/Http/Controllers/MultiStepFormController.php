<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiStepFormController extends Controller
{
    public function create()
    {
        return view ('multi_step_form');
    }

    public function stepOne(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string'],
        ]);

        $inputs = collect(session()->get('inputs'));
        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;

        session()->put('inputs', $inputs);

        return response([
            'success' => true,
            'message' => 'Step 1 successfully completed.'
        ]);
    }

    public function stepTwo(Request $request)
    {
        $request->validate([
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
        ]);

        $inputs = collect(session()->get('inputs'));
        $inputs['address'] = $request->address;
        $inputs['city'] = $request->city;
        session()->put('inputs', $inputs);

        return response([
            'success' => true,
            'message' => 'Step 2 successfully completed.'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required', 'min:4'],
        ]);

        $inputs = collect(session()->get('inputs'));
        $inputs['username'] = $request->username;
        $inputs['password'] = $request->password;

        session()->put('inputs', []);

        return response([
            'success' => true,
            'message' => 'Form submitted successfully.',
            'data'    => $inputs,
        ]);
    }
}
