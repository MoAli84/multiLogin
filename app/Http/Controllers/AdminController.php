<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class AdminController extends Controller
{

    public function __construct(){

        $this->middleware('AdminCheck',['except'=>[
          'login',
          'dologin',
          'create',
          'store'
         
        ]]);

    }

    public function index()
    {
        $data = Admin::join('departs','admins.dep_id','=','departs.id')->select('admins.*','departs.title')->orderBy('id', 'desc')->get();
        return view('Admin.index', ['data' => $data]);
    }

  
    public function create()
    {
        $data=Department::get();
        return view('Admin.register',['data'=>$data]);
    }

   
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => "required",
            'dep_id' =>'required|numeric'
        ]);

        $data['password'] = bcrypt($data['password']);

        $ob = Admin::create($data);

        if ($data) {
            $message = 'row inserted';
        } else {
            $message = 'Error';
        }
        session()->flash('message', $message);

        return redirect(url('/admins'));
    }


    public function show($id)
    {
        //

    }


    public function edit($id)
    {
    
        $data = Admin::find($id);
        $dep_data=Department::get();
        return view('Admin.edit', [ 'data' => $data,'dep_data'=>$dep_data
    ]);
    }

   
    public function update(Request $request, $id)
    {

        $info = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'dep_id' =>'required|numeric'

        ]);

        $ob = Admin::where('id', $id)->update($info);

        return redirect(url('admins'));
    }

    public function destroy($id)
    {
        $op = Admin::where('id', $id)->delete();
        return redirect(url('/admins'));
    }




    public function login()
    {
        return view('Admin.login');
    }

    public function dologin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

       //  dd(auth()->guard('admin')->attempt($data)); // *****************IMPORTANT POIIIIInt*********************************
           // === dd(auth('web)->attempt($data));

         


        if (auth()->guard('admin')->attempt($data)) { // check if email and password are verified

            return redirect(url('/admins'));
        } else {
            return redirect(url('/adminlogin'));
        }
    }




    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect(url('/adminlogin'));
      //return view('Admin.login');
    }
}
