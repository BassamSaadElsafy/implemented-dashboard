<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;

use App\DataTables\AdminDatatable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $admin)
    {
        return $admin->render('dashboard.admins.index', ['title'=> trans('dashboard.admin_control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admins.create', ['title' => trans('dashboard.create_user')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name'              => 'required',
            'phone'             => 'required|numeric|regex:/(01)[0-9]{9}/|unique:admins',
            'level'             => 'required|in:manager,receptionist,client',
            'email'             => 'required|email|unique:admins,email',
            'password'          => 'required|min:8',
            'confirm_password'  => 'required|same:password'
        ]);

        // $admin = Admin::create([
        //     'name'     => trim($request->input('name')),
        //     'name'     => trim($request->input('phone')),
        //     'email'    => strtolower($request->input('email')),
        //     'password' => Hash::make($request->input('password')),
        // ]);

        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => $request->password,
        ]);

        session()->flash('success', 'account created successfully');

        // return redirect()->route('login');
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        dd('welcome to edit admin information');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
