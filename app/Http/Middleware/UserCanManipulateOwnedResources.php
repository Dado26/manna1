<?php

namespace App\Http\Middleware;

use Closure;

class UserCanManipulateOwnedResources
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if( $request->route('church') ){
       $model = $request->route('church');}
       else{
            $model = $request->route('member');
        } 
       
       //dali postoji model church ili member
        if(isset($model)){
       if( $model->user_id != auth()->user()->id ){
            return redirect()->route('home');
        }
        
        }
        return $next($request);
    }
}
