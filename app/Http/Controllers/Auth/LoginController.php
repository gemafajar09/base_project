<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'username' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'password' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
        );
    }

    public function index()
    {
        return view('backend.auth.login');
    }

    public function login(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);
        if($validator->fails()){
            return back()->with('error','Silahkan Login Kembali');
        }else{
            $username = $r->username;
            $password = hash("sha512", md5($r->password));
    
            $cekDataLogin = DB::table('tb_admin')->where('username',$username)->where('password',$password)->first();
            if($cekDataLogin == TRUE)
            {
                // cek akses user
                $hakAkses = DB::table('tb_akses')->leftjoin('tb_menu','tb_akses.menu_id','tb_menu.menu_id')->where('tb_akses.admin_id',$cekDataLogin->admin_id)->where('tb_menu.menu_level','1')->get();

                $router = DB::table('tb_router')->get();
                // ==============
                $r->session()->put("admin_id", $cekDataLogin->admin_id);
                $r->session()->put("admin_nama", $cekDataLogin->admin_nama);
                $r->session()->put("hak_akses", $hakAkses);
                
                //session router
                $r->session()->put("router", $router);

                return redirect('dashboard')->with('pesan','Selamat Datang');
            }else{
                return back()->with('error','Silahkan Login Kembali');
            }
        }
    }

    public function register(Request $r)
    {
        $admin_nama = $r->admin_nama;
        $username = $r->username;
        $password = $r->password;
        $repeat_password = $r->repeat_password;
        if($password == $repeat_password)
        {
            $pass = hash("sha512", md5($r->password));
            DB::table('tb_admin')->insert([
                'admin_nama' => $admin_nama,
                'username' => $username,
                'password' => $pass,
                'repeat_password' => $repeat_password
            ]);

            return back()->with('pesan','Data Berhasil Di Inputkan.');
        }else{
            return back()->with('pesan','Data Gagal Di Inputkan.');
        }
    }

    public function logout(Request $r)
    {
    	$r->session()->forget('admin_id');
        $r->session()->forget('admin_nama');
        $r->session()->forget('hak_akses');
        $r->session()->flush();
    	return redirect('admin')->with('pesan', 'Success Logout.');
    }
}
