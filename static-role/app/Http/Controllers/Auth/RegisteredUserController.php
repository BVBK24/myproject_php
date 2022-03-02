<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' =>['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role'=>$request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        return redirect('dashboard');
    }
    public function read()
    {
        //dd('here12');
        $user=User::all();
        // var_dump($user);
        // exit;
        return view('dashboard',compact('user'));
    }
    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $input = $request->all();
        $up=$user->update($input);
        if($up)
        {
            return redirect()->route('dashboard');
        }
    }
    public function edit($id)
    {
        $user=User::find($id);
        if($user)
        {
        return view('edit',compact('user'));
        }
        else
        {
            //
        }
    }
    public function delete($id)
    {
        $del=User::destroy($id);
        if($del){
            return back()->with('success','Record deleted successfully');}
        else{
            return back()->with('fail','something went wrong');}
    }
}
