<?php

namespace App\Http\Controllers;

use App\Models\Reclamo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReclamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $reclamo = Reclamo::create([
                'fecha' => Carbon::now(),
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'user_id' => $request->user_id,
            ]);
            return response()->json([
                'reclamo_id' =>$reclamo->id,
                'message' => 'Register successfully',
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'reclamo_id' => -1,
                'message' => $th->getMessage(),
                'status' => false
            ], 500);
        }
    }
    public function ejemplo()
    {
        return response()->json([
            'msg' => 'Api Rest Laravel',
            "method" => 'GET'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
