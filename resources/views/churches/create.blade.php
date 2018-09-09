@extends('layout.main')
@section('content')
 <section class="content-header" style="margin-left: 50px;">
     <h1>Napravi crkvu</h1>
 
    </section>

    <!-- Main content -->
    {!! Form::open(['route'=>['store'], 'method'=>'POST', 'class'=>'validate', 'files'=>true]) !!}
    <section class="content">
          <div class="row">
              <div class="col-md-6 members-position">
                  
              @include('partials.errors')
                  
                <div class="box">
                      <div class="box-body">
                <div class="form-group">
                  <label>Ime</label>
                  {!! Form::input('text', 'name', null, ['class'=>'form-control', 'required']) !!}
                </div> 
                          
                <div class="form-group">
                  <label>Mesto</label>
                 {!! Form::input('text','city', null, ['class'=>'form-control', 'required']) !!}
                </div>  
              <!--            
                <div class="col-md-6">                  
                <div class="box">
                    <div class="box-header">
                        User
                    </div>
                      <div class="box-body">    
                         {!! Form::select('churches_id', $user, ['class'=>'form-control','required']) !!}                         
                     </div>
                </div>
              -->
                        </div> 
                          
               
                </div>
        <div class="box-footer">
         <div class="pull-right">
             <button class="btn btn-success btn-lg">Sačuvaj</button>
         </div>
         <div class="pull-left">
         <a href="{{ route('home') }}" class="btn btn-primary btn-lg">Nazad</a>
         </div>
                      </div>
                 </div>
              </div>
              
        </div>
    </section>
    {!! Form::close() !!}
    
    <!-- /.content -->
@endsection