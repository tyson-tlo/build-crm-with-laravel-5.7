<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Prospect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospects = Prospect::paginate(10);
        $users = User::all();

        return view('admin.prospects', ['prospects' => $prospects, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|unique:prospects',
            'note' => 'required|min:20',
        ]);      
        $prospect = new Prospect;

        $prospect->created_by = Auth::id();
        $prospect->name = $request->name;
        $prospect->email = $request->email;
        $prospect->phone = $request->phone;
        $prospect->phone_2 = $request->phone_2;
        $prospect->address = $request->address;
        $prospect->city = $request->city;
        $prospect->province_state = $request->province_state;
        $prospect->country = $request->country;
        $prospect->note = $request->note;
        if($request->assigned != 0){
            $prospect->assigned = $request->assigned;
            $prospect->date_assigned = now();
            $prospect->isClaimable = 0;
        }

        $prospect->save();

        return route('admin.prospects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prospect = Prospect::findOrFail($id);
        $assigned_to = User::findOrFail($prospect->assigned);

        return view('admin.prospect', ['prospect' => $prospect, 'assigned_to' => $assigned_to->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
