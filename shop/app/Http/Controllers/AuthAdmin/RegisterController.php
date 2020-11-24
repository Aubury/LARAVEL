<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admin\Admin;
use App\Models\Admin\Register;
use http\Env\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JavaScript;





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
      protected $redirectTo = RouteServiceProvider::REG_ADMIN;
//      protected $guard = 'admin';

    public function __construct()
    {
        $this->middleware('admin');
//        $this->middleware('guest');
    }
    public function show(){
        $prp = new Register();
        $admins = $prp->getAdmins();
        return view('admin.register', ['admins'=>$admins]);

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
     * Create a new admin instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\Admin\Admin
     */
    protected function create(array $data)
    {
//        $admin = DB::table('admins')->where('id',$data->id);
//        if($admin){
//            $newData = new Register();
//            $newData->updateDataAdmin($data);
//        }else{
            return Admin::create([
                'name' => $data['name'],
                'patronymic' => $data['patronymic'],
                'surname' => $data['surname'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
//        }

    }
}
