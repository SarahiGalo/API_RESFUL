<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Category::all();
        //return response()->json(['data' => $categoria,200]);
        return $this->showAll($categoria);
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
      'description' => 'required'
      ];

      //Laravel genera una excepción
      $this->validate($request, $reglas);

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
        $categoria = Category::findOrfail($id);
        //return response()->json(['usuario' => $usuario],200);
        return $this->showOne($categoria);
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
      $categoria = Category::findOrfail($id);
      $reglas = [
      'name' => 'required',
      'description' => 'required'
      ];

      $this->validate($request, $reglas);

      if($request->has('name')){
        $categoria->name = $request->name;
      }

      if($request->has('description')){
        $categoria->description = $request->description;
      }

      if(!$categoria->isDirty()){
        //return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code'=>422],422);
        return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
      }

      $categoria->save();
      //return response()->json(['data'=>$user],200);
      return $this->showOne($categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $categoria = Category::findOrfail($id);
      $categoria->delete();
      //return response()->json(['data' => $user],200);
      return $this->showOne($categoria);
    }
}
