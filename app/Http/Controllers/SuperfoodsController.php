<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superfoods;

class SuperfoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Superfoods::all();
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
        
        return Superfoods::create($request->all()); /* Lägger till*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $superfood = Superfoods::find($id);

        /* Kontrollerar om värdet finns */
        if ($superfood != null ) {
         return $superfood;
        } else {
         //Felmeddelande och errorkod
         return response()->json([
             'Superfood not found'
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
        $superfood = Superfoods::find($id);

        if($superfood != null) {
            $superfood->update($request->all());
            return $superfood;
        }else {
            return response()->json([
                'Superfood not found'
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
        $superfood = Superfoods::find($id);

        if($superfood != null) {
            $superfood->delete();
            return response()->json([
                'Superfood deleted'
            ]);
        }else {
            return response()->json([
                'Superfood not found'
            ], 404);
        }
    }
}
