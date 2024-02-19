<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $request->validate([

            'category_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],

        ]);

        $insert_data = Category::create([

            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        event(new Registered($insert_data));

        //
        return redirect()->route('travel-agency');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
