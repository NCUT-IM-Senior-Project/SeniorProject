<?php

namespace App\Http\Controllers;

use App\Models\Keynote;
use Illuminate\Http\Request;

class KeyNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyNotes = Keynote::all()->first();
        return view('keynote.index', compact('keyNotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($KeyNote)
    {
        $keyNotes = Keynote::where('id', $KeyNote)->first();

        return view('keynote.edit', compact('keyNotes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keynote $keyNote)
    {
        $keyNote->update([
            'description' => $request->input('description'),

        ]);

        return redirect(route('keynote.index'))->with([
            'success' => '注意事項 資料更新成功！',
            'type' => 'success',
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
