<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Tutorial::paginate(20);
        return view('tutorial-program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutorial-program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card_title = $request->card_title;
        $card_body = $request->card_body_details;
        $tutorial_card = Tutorial::create([
            'subject_type' => $request->subject,
            'link' => $request->link,
            'title' => $card_title,
            'body_details' => strip_tags($card_body)
        ]);
        return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tutorial_id)
    {
        $tutorial = Tutorial::find($tutorial_id);
        $tutorial->update(['is_active' => !$tutorial->is_active]);
        return redirect()->route('program.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update_data = Tutorial::where('id', $id)
            ->first();
        return view('tutorial-program.update_data', compact('update_data'));
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
        $card_title = $request->card_title;
        $card_body = $request->card_body_details;
        $tutorial = [
            'subject_type' => $request->subject,
            'link' => $request->link,
            'title' => $card_title,
            'body_details' => strip_tags($card_body)
        ];
        $tutorial_details_update = Tutorial::find($id)
            ->update($tutorial);
        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tutorial::where('id', $id)
            ->delete();
        return redirect()->route('program.index');
    }
}
