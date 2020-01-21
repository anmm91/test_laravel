<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Actor::all();
        return view('actor.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model=Actor::all();
        return view('actor.create',compact('model'));
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

        //create
        Actor::create($request->all());

       //redirect
        return redirect()->route('actor.index')->with('success','created new record');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $model=Actor::findOrFail($id);
        return view('actor.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Actor::findOrFail($id);
        return view('actor.edit',compact('model'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //validate
        //update
        $record=Actor::findOrFail($id);
        $record->update($request->all());
        //redirct
        return redirect()->route('actor.index')->with('success','record is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
       $record= Actor::findOrFail($id);
       $record->delete();
        //redirect
        return redirect()->route('actor.index')->with('success','record is deleted');
    }
}
