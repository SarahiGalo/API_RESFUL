<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usuarios = User::all();
      //return response()->json(['data' => $usuarios,200]);
      return $this->showAll($usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Creamos reglas de validación
      $reglas = [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|confirmed'
      ];

      //Laravel genera una excepción
      $this->validate($request, $reglas);

      //Asignación masiva
      $campos = $request->all();
      $campos['password'] = bcrypt($request->password);
      $campos['verified'] = User::USUARIO_NO_VERIFICADO;
      //Verificar correo o cuenta
      $campos['verification_token'] = User::generarVerificationToken();
      $campos['admin'] = User::USUARIO_REGULAR;

      $usuario = User::create($campos);

      //return $this->showOne($usuario, 201);
      return $this->showOne($usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrfail($id);
        //return response()->json(['usuario' => $usuario],200);
        return $this->showOne($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $reglas = [
          'email' => 'email|unique:users,email,'.$user->id,
          'password' => 'min:6|confirmed',
          'admin' => 'in:'.User::USUARIO_ADMINISTRADOR.','.User::USUARIO_REGULAR,
        ];

        $this->validate($request, $reglas);

        if($request->has('name')){
          $user->name = $request->name;
        }

        if($request->has('email') && $user->email != $request->email){
          $user->verified = User::USUARIO_NO_VERIFICADO;
          $user->verification_token = User::generarVerificationToken();
          $user->email = $request->email;
        }

        if($request->has('password')){
          $user->password = bcrypt($request->password);
        }

        if($request->has('admin')){
          if (!$user->esVerificado()) {
            //return response()->json(['error'=>'Unicamente los usuarios verificados pueden cambiar su valor de administrador','code'=>409],409);
            return $this->errorResponse('Unicamente los usuarios verificados pueden cambiar los registros',409);
          }
          $user->admin = $request->admin;
        }

        if(!$user->isDirty()){

          //return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code'=>422],422);
          return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }

        $user->save();
        //return response()->json(['data'=>$user],200);
        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        //return response()->json(['data' => $user],200);
        return $this->showOne($user);
    }
}
