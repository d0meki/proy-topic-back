<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;

class FotoController extends Controller
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
        // dd($request->all());

        try {
            $fotos = new Collection();

            if ($request->has('image')) {
                $image = $request->image;
                foreach ($image as $key => $value) {
                    $name = time() . $key . '.' . $value->getClientOriginalExtension();
                    $path = public_path('upload');
                    $objet = [
                        "name" => $name,
                        "path" => $path
                    ];
                    $value->move($path, $name);
                    $fotos->push($objet);
                }
            }
            return response()->json([
                'reclamo_id' => $request->reclamo_id,
                'fotos' => $fotos,
                'message' => 'Image upload successfully',
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Image upload cancel',
                'status' => false
            ], 500);
        }
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
