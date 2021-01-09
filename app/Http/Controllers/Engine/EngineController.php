<?php

namespace App\Http\Controllers\Engine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\MenuLevel1Model;

class EngineController extends Controller
{
    public function __construct()
    {
        $this->validator = array(
            'menu_level_1_nama'     => 'required',
            'menu_level_1_router'   => 'required',
            'menu_level_1_icon'     => 'required'
        );
    }

    public function index(){
        $menu_level_1 = DB::table('tb_menu_level_1')->get();
        return view('backend.engine.index',compact('menu_level_1'));
    }

    public function add()
    {
        return view('backend.engine.form');
    }

    public function edit(Request $request)
    {
        $data['id_encrypt'] = $request->id;
        $id = decrypt($request->id);

        $data['data'] = DB::table('tb_menu_level_1')->where('menu_level_1_id', $id)->first();
        
        return view('backend.engine.form', $data);
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), $this->validator);

        // jika id kosong maka prosesnya insert
        if($request->input('menu_level_1_id') == null){
            if ($validator->fails()) {
                return redirect()
                        ->route('menu-engine.add')
                        ->withErrors($validator)
                        ->withInput();
            } else {
                $menu_level_1_nama = $request->input('menu_level_1_nama');
                $menu_level_1_router = $request->input('menu_level_1_router');
                $menu_level_1_icon = $request->input('menu_level_1_icon');
                
                DB::table('tb_menu_level_1')->insert([
                    'menu_level_1_nama' => $menu_level_1_nama,
                    'menu_level_1_router' => $menu_level_1_router,
                    'menu_level_1_icon' => $menu_level_1_icon
                ]);

                return redirect('menu-engine')
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            if ($validator->fails()) {
                return redirect('menu-engine.edit', $request->input('menu_level_1_id'))
                        ->withErrors($validator)
                        ->withInput();
            } else {

                $id = decrypt($request->input('menu_level_1_id'));

                $menu_level_1_nama = $request->input('menu_level_1_nama');
                $menu_level_1_router = $request->input('menu_level_1_router');
                $menu_level_1_icon = $request->input('menu_level_1_icon');
                
                DB::table('tb_menu_level_1')->where('menu_level_1_id', $id)
                                            ->update([
                                                'menu_level_1_nama' => $menu_level_1_nama,
                                                'menu_level_1_router' => $menu_level_1_router,
                                                'menu_level_1_icon' => $menu_level_1_icon
                                            ]);
                return redirect('menu-engine')
                    ->with('message', 'Data berhasil diedit');
            }
        }
    }

    public function destroy(Request $request)
    {
        $id_encrypt = $request->id;
        $id = decrypt($request->id);

        DB::table('tb_menu_level_1')->where('menu_level_1_id', $id)->delete();

        return redirect()
            ->route('menu-engine')
            ->with('message', 'Data berhasil dihapus');
    }
}
