<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsersFormRequest;
use DB;

class UsersController extends Controller
{
  public function index(Request $request){
  if($request){
    $query=trim($request->get('searchText'));
    $usuarios=DB::table('users as us')
    ->select('us.id','us.name','us.email','us.rol')->where('name','LIKE','%'.$query.'%')->orderBy('id','asc')->paginate(7);
    return view('users.index', ["usuarios"=>$usuarios,"searchText"=>$query]);
  }
}

public function create(){
  return view("users.create");
}

public function store(UsuariosFormRequest $request){
  $usuario = new User;
  $usuario->name=$request->get('name');
  $usuario->email=$request->get('email');
  $usuario->rol=$request->get('rol');
  $usuario->password=bcrypt($request->get('password'));
  $usuario->save();
  return Redirect::to('users');
}

public function edit($id){
  return view("users.edit",["usuario"=>User::findOrFail($id)]);
}

public function update(UsuariosFormRequest $request, $id){
  $usuario=User::findOrFail($id);
  $usuario->name=$request->get('name');
  $usuario->email=$request->get('email');
  $usuario->rol=$request->get('rol');
  $usuario->password=bcrypt($request->get('password'));
  $usuario->update();
  return Redirect::to('usuarios');
}

public function show($id)
{
  return view("users.show",["usuario"=>User::findOrFail($id)]);

}

public function destroy($id){
  $usuario = DB::table('users')->where('id', '=',$id)->delete();
  return Redirect::to('users');
}
}
