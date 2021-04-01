<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Formulario de usuarios
    public function userForm(){
        return view('usuarios.userform');
    }

    //Guardar usuarios
    public function save(Request $request){
        // Almacenar todos los datos recibidos por el request
        //$userdata = request()->all();

        // Validar los datos del formulario
        $validator = $this->validate($request,[
            'nombre'=> 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:usuarios'
        ]);

        //Guardar todo menos el campo token
        $userdata = request()->except('_token');
        Usuario::insert($userdata);

        // ver los datos recibidos
        //return response()->json($userdata);

        //return 'Usuario guardado';

        return back()->with('usuarioGuardado','Usuario guardado');

    }

    // Listado usuarios
    public function list(){
        $data['users'] = Usuario::paginate(3);
        return view('usuarios.list', $data);
    }

    //Eliminar usuario
    public function delete($id){
        Usuario::destroy($id);
        return back()->with('usuarioEliminado','Usuario eliminado');
    }

    public function editform($id){
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.editform', compact('usuario'));
    }

    public function edit(Request $request, $id){
        $datoUsuario = request()->except((['_token', '_method']));
        Usuario::where('id', '=', $id)->update($datoUsuario);

        return back()->with('usuarioModificado','Usuario modificado');
    }
}
