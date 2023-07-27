<?php

namespace App\Http\Controllers;

use App\Models\VideoGame;
use Illuminate\Http\Request;

class VideoGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VideoGame::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'score' => 'required',
        ]);

        $videoGame = new  VideoGame();
        $videoGame->name = $request->name;
        $videoGame->category_id = $request->category_id;
        $videoGame->score = $request->score;
        $videoGame->save();

        return $videoGame;
    }

    /**
     * Display the specified resource.
     */

    //($name)
    public function show(VideoGame $videoGame)
    {
        //$videoGame = VideoGame::find($name);
        return $videoGame;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoGame $videoGame)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'score' => 'required',
        ]);


        $videoGame->name = $request->name;
        $videoGame->category_id = $request->category_id;
        $videoGame->score = $request->score;
        $videoGame->update();

        return $videoGame;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $videoGame = VideoGame::find($id);

        if (is_null($videoGame)) {
            return response()->json('No se pudo realizar correctamente la operacion ', 404);
        }

        $videoGame->delete();

        return response()->noContent();
    }
}
