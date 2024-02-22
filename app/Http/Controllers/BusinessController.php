<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Businesses\StoreBusiness;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = "Businesses List";
    
        $user = Auth::user();

        if ($user && $user->role_id === 1) { 

            $data['results'] = Business::all();

        } 
        elseif ($user) {

            $data['results'] = $user->businesses()->get();
        } 
        else {

            $data['results'] = [];
        }
    
        return view('business.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = "Businesses List";
        return view('business.save', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusiness $request)
    {
        $data = $request->validated();
        $data = Business::create($data);
        return Redirect('/businesses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {

        $data['results'] = $business;
        $data['page_title'] = "Update Business";
        return view('business.save', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBusiness $request, Business $business)
    {
           $user = Auth::user();
            if ($user && $user->role_id === 1) { 
            
            $requestData = $request->except('user_id');
            } else {
            
            $requestData = $request->all();
          }

           $business->update($requestData);

          return redirect('/businesses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        $business->delete();

        // Redirect or return a response as needed
        return redirect()->route('businesses.index')->with('success', 'Business deleted successfully.');
    }

}
