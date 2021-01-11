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
            'menu_nama'     => 'required',
            'menu_router'   => 'required',
            'menu_icon'     => 'required',
            'menu_level'     => 'required',
        );
    }

    public function index(){
        $menu = DB::table('tb_menu')->where('menu_level','1')->get();
        return view('backend.engine.index',compact('menu'));
    }

    public function add()
    {
        $data['menu1'] = DB::table('tb_menu')->where('menu_level', '1')->get();
        $data['menu2'] = DB::table('tb_menu')->where('menu_level', '2')->get();
        return view('backend.engine.form',$data);
    }

    public function edit(Request $request)
    {
        $id = decrypt($request->id);
        $data['id_encrypt'] = $request->id;
        $data['menu1'] = DB::table('tb_menu')->where('menu_level', '1')->get();
        $data['menu2'] = DB::table('tb_menu')->where('menu_level', '2')->get();
        $data['data'] = DB::table('tb_menu')->where('menu_id', $id)->first();
        
        return view('backend.engine.form', $data);
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), $this->validator);

        // jika id kosong maka prosesnya insert
        if($request->input('menu_id') == null){
            if ($validator->fails()) {
                return redirect()
                        ->route('menu-engine.add')
                        ->withErrors($validator)
                        ->withInput();
            } else {
                $menu_nama = $request->input('menu_nama');
                $menu_router = $request->input('menu_router');
                $menu_level = $request->input('menu_level');
                if($menu_level == 1)
                {
                    DB::table('tb_menu')->insert([
                        'menu_nama' => $menu_nama,
                        'menu_router' => $menu_router,
                        'menu_icon' => $request->input('menu_icon'),
                        'menu_level' => $menu_level
                    ]);
    
                    return redirect('menu-engine')->with('message', 'Data berhasil ditambahkan');
                }elseif($menu_level == 2){
                    DB::table('tb_menu')->insert([
                        'menu_nama' => $menu_nama,
                        'menu_router' => $menu_router,
                        'menu_icon' => 'far fa-circle',
                        'menu_drop_id' => $request->input('menu_level1'),
                        'menu_level' => $menu_level,
                    ]);

                    DB::table('tb_menu')->where('menu_id', $request->input('menu_level1'))->update([
                        'menu_status' => 1
                    ]);
    
                    return redirect('menu-engine')->with('message', 'Data berhasil ditambahkan');
                }elseif($menu_level == 3){
                    DB::table('tb_menu')->insert([
                        'menu_nama' => $menu_nama,
                        'menu_router' => $menu_router,
                        'menu_icon' => 'far fa-circle',
                        'menu_drop_id' => $request->input('menu_level2'),
                        'menu_level' => $menu_level,
                    ]);

                    DB::table('tb_menu')->where('menu_id', $request->input('menu_level2'))->update([
                        'menu_status' => 1
                    ]);
    
                    return redirect('menu-engine')->with('message', 'Data berhasil ditambahkan');
                }
                
            }
        }else{
            if ($validator->fails()) {
                return redirect('menu-engine.edit', $request->input('menu_id'))
                        ->withErrors($validator)
                        ->withInput();
            } else {
                
                $id = decrypt($request->input('menu_id'));
                $menu_nama = $request->input('menu_nama');
                $menu_router = $request->input('menu_router');
                $menu_icon = $request->input('menu_icon');
                $menu_level = $request->input('menu_level');
                if($request->menu_level == 1){
                    DB::table('tb_menu')
                    ->where('menu_id', $id)
                    ->update([
                                'menu_nama' => $menu_nama,
                                'menu_router' => $menu_router,
                                'menu_icon' => $menu_icon,
                                'menu_level' => $menu_level
                            ]);
                    return redirect('menu-engine')->with('message', 'Data berhasil diedit');
                }elseif($request->menu_level == 2){
                    DB::table('tb_menu')
                    ->where('menu_id', $id)
                    ->update([
                                'menu_nama' => $menu_nama,
                                'menu_router' => $menu_router,
                                'menu_drop_id' => $request->input('menu_level1'),
                                'menu_level' => $menu_level
                            ]);
                    return redirect('menu-engine')->with('message', 'Data berhasil diedit');
                }elseif($request->menu_level == 3){
                    DB::table('tb_menu')
                    ->where('menu_id', $id)
                    ->update([
                                'menu_nama' => $menu_nama,
                                'menu_router' => $menu_router,
                                'menu_drop_id' => $request->input('menu_level2'),
                                'menu_level' => $menu_level
                            ]);
                    return redirect('menu-engine')->with('message', 'Data berhasil diedit');
                }
            }
        }
    }

    public function destroy(Request $request)
    {
        $id = decrypt($request->id);
        $ceklevel = DB::table('tb_menu')->select(DB::raw('COUNT(menu_drop_id) as menu_drop'))->where('menu_drop_id',$id)->first();
        if($ceklevel->menu_drop == ''){
            DB::table('tb_menu')->where('menu_id',$id)->update(['menu_status' => '']);
        }
        DB::table('tb_menu')->where('menu_id', $id)->delete();

        return redirect()
            ->route('menu-engine')
            ->with('message', 'Data berhasil dihapus');
    }
}
