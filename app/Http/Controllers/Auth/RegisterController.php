<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Role;
use App\Company;
use App\KpiType;


class RegisterController extends Controller{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct(){
        $this->middleware('auth');
    }

    public function register(Request $request){
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'designation' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'role_id' => ['required'],
            'company_id' => ['required'],
            'kpi_type_id' => ['required'],
            'mobile' => ['required'],
        ]);
    }

    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'designation' => $data['designation'],
            'role_id' => $data['role_id'],
            'company_id' => $data['company_id'],
            'kpi_type_id' => $data['kpi_type_id'],
            'is_ssr' => $data['is_ssr'],
            'Depot' => $data['Depot'],
            'password' => Hash::make($data['password']),
        ]);
    }
}