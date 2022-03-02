<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Exception;


class RegisterController extends Controller
{


    public function userRegisterView()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $attributes['name'] = $request->input('name');
            $attributes['email'] = $request->input('email');
            $attributes['password']         = Hash::make($attributes['password']);
            $attributes['account_status']   = 'active';
            $user = User::create($attributes);
            $user->assignRole('user');
            Session::flash('message', 'User Account Create success');
            Session::flash('class', 'success');
            return redirect()->route('admin.user.listView');
        } catch (Exception $e) {
            Session::flash('message', 'Please Try again.Something went wrong!');
            Session::flash('class', 'danger');
            return $this->respondWithError('Something wrong.', $e->getMessage(), 500);
        }
    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
