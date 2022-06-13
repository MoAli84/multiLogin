<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;    
 
class studentController extends Controller
{


    public function index( )
    {
    //     if (auth()->check()) { // check he login or not
    
       $data= Student::orderBy('id','desc')->get();

    //     session()->put('message','users list');
         return view('index',['data'=>$data]);
    //   }else {
    //     return redirect()->route('login');
    //   }
    }



    public function create()
    {
        return view('register');
    }


    
    public function store(Request $request){

        $info= $request->validate([
            'name'=>'required|min:2',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'linkedin'=>'required|url'
        ]);

        $info['password']= bcrypt( $info['password']);
        // dd(strlen($info['password'])); 

       $ob = Student::create($info);
     //  session()->flash('m','Mohamed Ali');

        return redirect()-> route('index')->with('success','Student data are inserted');
 


    }

    public function edit($id)
    {
       // $data =Student::where('id',$id)->first();
        $data =Student::find($id);

      //  dd( $data);

      if ($data) {
        return view('edit',['data'=>$data]);
      }
      else {
          echo 'Sorry Sir , your request is not find';
      }
        
    }

    public function update(Request $request)
    {

        $info= $request->validate([
            'name'=>'required|min:2',
            'email'=>'required|email',
            'linkedin'=>'required|url',
            'id'=>'required'
        ]);

       $ob = Student::where('id',$request->id)->update($info);

        return redirect()-> route('index')->with('success','Student data are updated');
        
    }


public function delete($id)
{
    $op=Student::where('id',$id)->delete();
    return redirect()-> route('index')->with('success','Student Removed..');
}


public function login()
{
    return view('login');
}

public function dologin(Request $request)
{
    $data = $request->validate([
        'email'=>'required|email',
        'password' =>'required|min:6'
        ]);

    //    dd(auth()->attempt($data));

        if(auth('web')->attempt($data)){// check if email and password are verified

            return redirect()->route('index');
        }
        else {
            return redirect()->route('login');
        }
}




public function logout()
{
    auth()->logout();
 
    return redirect()->route('login');
}



public function upload()
    {
       return view('upload');

    }


}
