<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Admin;
use App\Models\Admin\Register;
use Illuminate\Support\Facades\View;
use JavaScript;
//use function PHPUnit\Framework\never;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        $prp = new Register();
        $admins = $prp->getAdmins();
        return view('admin.admin', ['admins'=>$admins]);
    }
    public function getAllAdmins(){
        $prp = new Register();
       $prp->getAdmins();
    }
    public function jsGetAdmin(){
        $prp = new Register();
        JavaScript::put([
            'admins' => $prp->getAdmins()
        ]);
        return View::make('admin.register');
    }
    public function edit(Request $data){

        DB::table('admins')
            ->where('id', $data->id)
            ->update([
                'name' => $data['name'],
                'patronymic' => $data['patronymic'],
                'surname' => $data['surname'],
                'phone' => $data['phone'],
                'email' => $data['email'],
        ]);
        return redirect()->back();

    }
    public function delete(Request $data){

        DB::table('admins')->delete($data->id);
        return redirect()->back();
    }
}
