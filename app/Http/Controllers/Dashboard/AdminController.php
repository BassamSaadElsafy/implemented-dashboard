<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\DataTables\AdminDatatable;
use Illuminate\Support\Facades\Hash;

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
            'phone'             => 'sometimes|nullable|regex:/(01)[0-9]{9}/|unique:admins',
            'email'             => 'required|email|unique:admins,email',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password'
        ]);

        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'account created successfully');
        return redirect()->route('admins.index');
    }

    public function edit(Admin $admin)
    {

        return view('dashboard.admins.edit' , ['title' => trans('dashboard.edit_record') , 'admin' => $admin]);

    }

    public function update(Request $request, Admin $admin)
    {
        $data = $this->validate(request() , [
            'name'             => 'required',
            'phone'            => 'sometimes|nullable|regex:/(01)[0-9]{9}/|unique:admins,id,'.$admin->id,
            'email'            => 'required|email|unique:admins,email,'.$admin->id,   //to ignore this id from unique
            'password'         => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6'
        ] , [] , [
            'name'             => trans('dashboard.name'),
            'phone'            => trans('dashboard.phone'),
            'email'            => trans('dashboard.email'),
            'password'         => trans('dashboard.password'),
            'confirm_password' => trans('dashboard.confirm_password'),
        ]);

        //delete index confirm password from data array
        unset($data['confirm_password']);

        $data['password'] = bcrypt(request('password'));
        
        $admin->update($data);
        session()->flash('success' , trans('dashboard.record_updated'));
        return redirect()->route('admins.index');

    }

    
    public function destroy(Admin $admin)
    {
        $admin->delete();
        session()->flash('success' , trans('dashboard.record_deleted'));
        return redirect()->route('admins.index');
    }

    
    public function multi_delete(){

        if (is_array(request('item'))) {
            Admin::destroy(request('item'));
            session()->flash('success', trans('dashboard.record_deleted'));
        }else{
            session()->flash('error', trans('dashboard.something_went_wrong'));
        }

        return back();
    }
}
