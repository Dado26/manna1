<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Church;
use App\Member;
use App\Http\Requests\churchRequest;
use App\Http\Requests\MembersRequest;
use Image;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $church;
    
    public function index(){
        $user=Auth::user();
        
        return view('homepage', compact('user'));
    }
    
     public function about(){
         $user=Auth::user();
         return view('about', compact('user'));
     }
    
    public function show_church(Church $church){
        $user=Auth::user();
        return view('churches.index', compact('church','user'));
    }
    
    public function create(){
        
        $user= Auth::user();
        return view('churches.create', compact('user'));
    }
    
     public function store(churchRequest $request)
    {
       
        $params=$request->all();
    
        auth()->user()->churches()->create($params);

    
        return redirect()->route('home');
    }
    
    public function show_members(Church $church, $secondParam = null){         
        $user= Auth::user();
        
        $this->church = $church;
        
        /*check second parameter-order by:first name, last name, baptized water, active 
         * filter by first name and last name
         */
        if($secondParam == null){                  
        $members= $this->filterByNameLastname()->orderBy('first_name')->paginate(15);
        }   
        elseif($secondParam == 1){
         $members = $this->filterByNameLastName()->orderBy('last_name')->paginate(15);
        }      
        elseif($secondParam == 2){
        $members= $this->filterByNameLastname()->orderBy('baptized_water', 'DESC')->paginate(15);;        
        }
        elseif($secondParam == 3){
        $members= $this->filterByNameLastname()->orderBy('active', 'DESC')->paginate(15);           
        }
           
        
        return view('members.index', compact('members', 'user', 'church'));
    }
    
     public function show_members_by_create(Church $church){         
        $user= Auth::user();
        $this->church = $church;
        
        $members = $this->filterByNameLastName()->latest()->paginate(15);
        
        return view('members.index', compact('members', 'user', 'church'));
    }
    
    public function show_active_members(Church $church){         
     $user= Auth::user();
     $this->church = $church;


     $query= $church->members()->where('active','1')->orderBy('first_name');

     $count = (clone $query)->count();

     $members = $query->paginate(15);

     if( request()->has('first_name') or request()->has('last_name')){
         $members= $church->members()->where('active','1');
       if( request()->has('first_name') ){
            $first_name = request()->get('first_name');
            $members->where('first_name', 'LIKE', '%'.$first_name.'%');             
        }
        
        if( request()->has('last_name') ){
            $last_name = request()->get('last_name');
            $members->where('last_name', 'LIKE', '%'.$last_name.'%');            
        } 
      $members= $members->orderBy('first_name')->paginate(15);  
     }

       return view('members.index', compact('members', 'user', 'church','count'));
     }
     
    public function filterByNameLastName(){
        $church = $this->church;
        
         $members= $church->members();
          
         if( request()->has('first_name') ){
            $first_name = request()->get('first_name');
            $members->where('first_name', 'LIKE', '%'.$first_name.'%');             
        }
        
        if( request()->has('last_name') ){
            $last_name = request()->get('last_name');
            $members->where('last_name', 'LIKE', '%'.$last_name.'%');            
        }
       
        return $members;
    } 
     
     
    
    public function form_members(Church $church){
        $user= Auth::user();
        return view('members.create', compact('user','church'));
    }
    
    public function store_members(Church $church, MembersRequest $request ){
       
      
     // Auth::user()->$church->members()->create(['church_id'=>$church['id'], $params ]);
     
      //Auth::user()->members1()->create($params);
      $params = $request->all();
      
      $params['active'] = $request->get('active');
      $params['church_id'] = $church;
      $params['user_id'] = Auth::id();
      $params['baptized_water'] = Carbon::parse($params['baptized_water']);;
      
      
      $params['image'] = $this->uploadImageAndReturnName();
      
 
      $church->members()->create($params);


      
      flash('Uspešno ste dodali člana!!')->success();
      
      //$church->members()->create(['user_id'=>Auth::id(), $params]);
      
      return redirect()->route('show_members', $church->id);
    }
    
    public function memberDetail(Member $member) {
         $churches=Church::all();
         $user=Auth::user();
         
         return view('members.detail', compact('user', 'churches', 'member'));
        
    }
    
    /*private function formatDate($date){
        if( empty($date) ) return null;

        $part = explode('.', $date);

        return $part[2].'-'.$part[1].'-'.$part[0];
    }
    */
    public function uploadImageAndReturnName() {
        
        if( !request()->hasFile('image') ) return null;
        
       $image = request()->file('image'); 
        
       $image_name = time().'.'.$image->getClientOriginalExtension();
       
       $path = 'img/'.$image_name;
        
        Image::make( $image->getRealPath() )->resize(100, 50)->save($path);
        
        request()->file('image')->move('img/', $image_name);
        
        return $image_name;
       
    }
    
    public function memberActive(Member $member) {
         if($member->active){
           $member->update(['active'=>0]);          
        }else{
           $member->update(['active'=>1]);
        }
        
         return redirect()->back();
        
    }

}
