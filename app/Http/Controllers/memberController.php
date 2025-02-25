<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Member::orderBy('member_id', 'desc')->get();
        return view('Library.member')->with('data', $data);
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
        Session::flash('member_id', $request->member_id);
        Session::flash('member_name', $request->member_name);
        Session::flash('member_email', $request->member_email);
        $request->validate([
            'member_id' => 'numeric|required|digits:16|unique:member,member_id',
            'member_name' => 'required:member,member_name',
            'member_email' => 'required|email|unique:member,member_email',
            'member_password' => 'required|min:6'
        ]);

        $status = 1;

        $data = [
            'member_id' => $request->member_id,
            'member_name' => $request->member_name,
            'member_email' => $request->member_email,
            'member_status' => $status,
            'member_password' => Hash::make($request->member_password),
            'member_updated_at' => DB::raw('NOW()'),
            'member_created_at' => DB::raw('NOW()')
        ];
        Member::create($data);
        return redirect()->to('member')->with('success', 'Successfully added a new member named "' . $request->member_name . '"');
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
        $request->validate([
            'member_name' => 'required:member,member_name'
        ]);
        $data = [
            'member_name' => $request->member_name,
            'member_updated_at' => DB::raw('NOW()')
        ];
        Member::where('member_id', $id)->update($data);
        return redirect()->to('member')->with('success', 'Successfully update a member named "' . $request->member_name . '"');
    }

    public function updateMemberStatus(Request $request, $id)
    {
        $data = [
            'member_status' => $request->status,
            'member_updated_at' => DB::raw('NOW()')
        ];
        Member::where('member_id', $id)->update($data);
        return redirect()->to('member')->with('success', 'Successfully updated member status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Member::where('member_id', $id)->delete();
        return redirect()->to('member')->with('success', 'Successfully delete member data');
    }
}