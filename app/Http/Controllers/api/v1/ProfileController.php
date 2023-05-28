<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::get();
        return response()->json(["status"=>"200","list"=>$profile]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(["test"=>"create"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input =  $request->input();
        $create = Profile::create([
            'name'=> $input['name'],
            'user_id'=> auth()->id(),
            'site_id'=> $input['site'],
            'proxy_id'=> $input['proxy'],
            'status'=> 'inactive',
        ]);
        return response()->json(["status"=>"200","create-id"=>$create]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
