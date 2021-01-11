<?php

namespace App\Http\Controllers\Engine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AksesController extends Controller
{

    public function index()
    {
        $data['user'] = DB::table('tb_admin')->get();
        $data['menu1'] = DB::table('tb_menu')->where('menu_level','1')->get();
        return view('backend.engine.akses.index',$data);
    }

    public function saveInsert(Request $request)
    {
        $menu_id = $request->menu_id;
        $admin_id = $request->admin_id;
        DB::table('tb_akses')->insert([
                        'admin_id' => $admin_id,
                        'menu_id' => $menu_id,
                    ]);
        echo json_encode([
            'pesan' => 'Sukses.. Hak Akses Aktif'
        ]);
    }

    public function saveDelete(Request $request)
    {
        $menu_id = $request->menu_id;
        $admin_id = $request->admin_id;

        DB::table('tb_akses')->where(['menu_id' => $menu_id, 'admin_id' => $admin_id])->delete();
        
        echo json_encode([
            'pesan' => 'Sukses.. Hak Akses Non Aktif'
        ]);
    }

    public function create(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        // 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
