<?php

namespace App\Http\Controllers\Engine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use DB;
class RouterController extends Controller
{
    public function __construct()
    {
        $this->validator = array(
            'router_type'           => 'required',
            'router_url'            => 'required',
            'router_controller'     => 'required',
        );
    }

    public function index(){
        $router = DB::table('tb_router')->get();
        return view('backend.engine.router.index',compact('router'));
    }

    public function add()
    {
        return view('backend.engine.router.form');
    }

    public function edit(Request $request)
    {
        $id = decrypt($request->id);
        $data['id_encrypt'] = $request->id;
        $data['data'] = DB::table('tb_router')->where('router_id', $id)->first();
        
        return view('backend.engine.router.form', $data);
    }

    public function save(Request $request)
    {

        // jika id kosong maka prosesnya insert
        if($request->input('router_id') == null){
            $validator = Validator::make($request->all(), $this->validator);
            if ($validator->fails()) {
                return redirect()
                        ->route('router.add')
                        ->withErrors($validator)
                        ->withInput();
            } else {
                $router_type = $request->input('router_type');
                $router_url = $request->input('router_url');
                $router_controller = $request->input('router_controller');
                $router_name = $request->input('router_name');
                $router_middleware = $request->input('router_middleware');
                
                DB::table('tb_router')->insert([
                    'router_type' => $router_type,
                    'router_url' => $router_url,
                    'router_controller' => $router_controller,
                    'router_name' => $router_name,
                    'router_middleware' => $router_middleware,
                ]);
    
                return redirect('router')->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            $validator = Validator::make($request->all(), $this->validator);

            if ($validator->fails()) {
                return redirect('router.edit', $request->input('router_id'))
                        ->withErrors($validator)
                        ->withInput();
            } else {
                
                $id = decrypt($request->input('router_id'));
                $router_type = $request->input('router_type');
                $router_url = $request->input('router_url');
                $router_controller = $request->input('router_controller');
                $router_name = $request->input('router_name');
                $router_middleware = $request->input('router_middleware');
                
                DB::table('tb_router')
                        ->where('router_id', $id)
                        ->update([
                                    'router_type' => $router_type,
                                    'router_url' => $router_url,
                                    'router_controller' => $router_controller,
                                    'router_name' => $router_name,
                                    'router_middleware' => $router_middleware,
                                ]);
                return redirect('router')->with('message', 'Data berhasil diedit');
                
            }
        }
    }

    public function destroy(Request $request)
    {
        $id = decrypt($request->id);
        
        DB::table('tb_router')->where('router_id', $id)->delete();

        return redirect()
            ->route('router')
            ->with('message', 'Data berhasil dihapus');
    }
}
