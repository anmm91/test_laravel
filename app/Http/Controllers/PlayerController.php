<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Ticket::all();
        return view('crud.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate

        //store
        Ticket::create($request->all());
        //redirect

        return redirect('/player')->with('success','created new record');
//        return view('crud.index')->with('success', 'New  has been created! ');
//        return redirect()->route('player.index')->with('success', 'New  has been created! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model=Ticket::findOrFail($id);
        return view('crud.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Ticket::findOrFail($id);
        return view('crud.edit',compact('model'));
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
        // validate

        //update
        $record=Ticket::findOrFail($id);
        $record->update($request->all());

        //redirect
        return  redirect()->route('player.index')->with('success','the record is updated');
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
        //delete
//
        $record=Ticket::findOrFail($id);
        $record->delete();
//
//        //redirect
        return redirect()->route('player.index')->with('success','the record is deleted');
    }
}
