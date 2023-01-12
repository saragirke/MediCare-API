<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vitamins;

class VitaminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vitamins::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ /* Metod validate för att validera inmatad information */
            'name' => 'required',
            'productno' => 'required',
            'category' => 'required',
            'amount' => 'required',
            'price' => 'required',
        ]);

        return Vitamins::create($request->all()); /* Lägger till*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vitamin = Vitamins::find($id);

       /* Kontrollerar om värdet finns */
       if ($vitamin != null ) {
        return $vitamin;
       } else {
        //Felmeddelande och errorkod
        return response()->json([
            'Vitamin not found'
        ], 404);
       }
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
        $vitamin = Vitamins::find($id);

        if($vitamin != null) {
            $vitamin->update($request->all());
            return $vitamin;
        }else {
            return response()->json([
                'Book not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vitamin = Vitamins::find($id);

        if($vitamin != null) {
            $vitamin->delete();
            return response()->json([
                'Vitamin deleted'
            ]);
        }else {
            return response()->json([
                'Vitamin not found'
            ], 404);
        }
    }
}
