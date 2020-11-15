<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use App\Http\Requests\UserRequest;



class RegisterController extends Controller
{
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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROFILE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    protected function validator(array $data)
    {
        return Validator::make($data, $this->rules(), $this->messages());
    }
    public function rules()
    {
        return [
            'name'       => 'required|string|min:2|max:20',
            'patronymic' => 'required|string|min:2|max:20',
            'surname'    => 'required|string|min:2|max:20',
            'phone'      => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12|max:19',
            'city'       => 'required|string|min:2|max:20',
            'street'     => 'required|string|min:2|max:20',
            'building'   => 'required|numeric',
            'apartment'  => 'required|numeric',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ];
    }
    public function messages(){
        return [
            'name.required'       => 'Имя является обязательным для заполнения',
            'patronymic.required' => 'Очество является обязательным для заполнения',
            'surname.required'    => 'Фамилия является обязательным для заполнения',

            'phone.required'      => 'Телефон является обязательным для заполнения',
            'phone.regex'         => 'Номер телефона введен не правильно',
            'phone.min'           => 'Номер телефона должен быть не менее 12 символов',
            'phone.max'           => 'Номер телефона должен быть не более 14 символов',

            'city.required'       => 'Город является обязательным для заполнения',
            'street.required'     => 'Улица является обязательным для заполнения',

            'building.required'   => 'Номер дома является обязательным для заполнения',
            'building.numeric'    => 'Номер дома - должны быть только цифры',

            'apartment.required'  => 'Номер квартиры является обязательным для заполнения',
            'apartment.numeric'   => 'Номер квартиры - должны быть только цифры',

            'email.required'      => 'Email является обязательным для заполнения',
            'email.email'         => 'Email введен не правильно',
            'email.unique'        => 'Email уже используют, выберите другой!',

            'password.required'   => 'Пароль является обязательным для заполнения',
            'password.confirmed'  => 'Пароли не совпадают'
        ];
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'patronymic' => $data['patronymic'],
            'surname' => $data['surname'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'street' => $data['street'],
            'building' => $data['building'],
            'apartment' => $data['apartment'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
