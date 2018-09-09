<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Church;
use Auth;
use App\Http\Requests\MembersRequest;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Input;

class MemberController extends Controller
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
    public function edit(Member $member)
    {
        $churches=Church::all();
        $user=Auth::user();
        return view('members.edit', compact('member','user','churches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MembersRequest $request, Member $member)
    {
        $params = $request->all();
        if(!is_null($params['baptized_water'])){
        $params['baptized_water'] = Carbon::parse($params['baptized_water']);
        }
      
    
       if($image = $this->uploadImageAndReturnName() ) {
        $params['image'] = $image;
        }
         
        $params['active'] = Input::has('active') ? true : false;
       
        
       $member->update($params);
        
        
        //$member['church_id']= $request->only('church_id');               
       flash('Uspešno ste uredili člana!!')->success();
       // $church_id = $member->church()->id; 
       $church_id = $member->church->id;
       return redirect()->route('show_members', $church_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {  
        $member->delete();
        flash('Uspešno ste izbrisali člana!!')->success();
        return redirect()->back();
    }
    public function uploadImageAndReturnName() {
        
        if( !request()->hasFile('image') ) return null;
        
        $image = request()->file('image'); 
        
       $image_name = time().'.'.$image->getClientOriginalExtension();
       
       $path = 'img/'.$image_name;
        
        Image::make( $image->getRealPath() )->fit(400,500)->save($path);
        
        //request()->file('image')->move('img/', $image_name);
        
        return $image_name;
       
    }
}
