<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Church;
use App\Http\Requests\churchRequest;
use Swift_TransportException;


class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $church = Church::class;
        $user=Auth::user();
        return view('churches.index', compact('user','church'));
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
        //
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
    public function edit(Church $church)
    {
        $user= Auth::user();
        return view('churches.edit', compact('church','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(churchRequest $request, Church $church)
    {
         $church->update($request->all());
         
         return redirect()->route('church.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Church $church)
    {
       try{
           $church->delete();
           flash('Uspešno ste izbrisali crkvu!!!')->success();
           
       }
       catch(\Illuminate\Database\QueryException $e){
           flash('Nemožete izbrisati vašu crkvu jer imate članove u njoj!!!(ili ste nekad imali)')->error();
           
       }  
       return redirect()->back();
    }
}
