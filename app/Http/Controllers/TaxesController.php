<?php

namespace App\Http\Controllers;

use App\Models\Taxes;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;

class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $get_all_tax = Taxes::all();

        return view('frontend.taxes-setup', compact(['get_all_tax']));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([

                'tname' => ['required', 'string', 'max:255'],
                'rate' => ['required', 'integer', 'max:255'],
                'include' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],

            ]);

            $insert_data = Taxes::create([

                'tname' => $request->tname,
                'rate' => $request->rate,
                'include' => $request->include,
                'description' => $request->description,
            ]);

            event(new Registered($insert_data));

            return redirect()->route('taxes-setup')->with('toast_success', 'Tax Created Successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->with('toast_error', $e->validator->getMessageBag())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again....:'.$e);
        }
        //
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Taxes $taxes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taxes $taxes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taxes $taxes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taxes $taxes)
    {
        //
    }
}
