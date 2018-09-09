@extends('layout.main')

@section('script')
    <script src="{{asset ('bootstrap-datepicker\dist\js\bootstrap-datepicker.min.js') }}"></script>
   <script>
    $('.datepicker').datepicker();
</script>
@endsection

@section('content')
<section class="content-header" style="margin-left: 50px;">
      <h1>Kreiraj člana - {{$church->name}}</h1>
 
</section>


@section('style')
    <link rel="stylesheet" href="{{asset('bootstrap-datepicker\dist\css\bootstrap-datepicker.min.css') }}">
@endsection
    <!-- Main content -->
    {!! Form::open(['route'=>['store_members', $church->id], 'method'=>'POST', 'class'=>'validate', 'files'=>true]) !!}
    <section class="content">
          <div class="row">
              <div class="col-md-6 members-position">
                  
              @include('partials.errors')
                  
                <div class="box">
                      <div class="box-body">
                <div class="form-group">
                  <label>Ime</label>
                  {!! Form::input('text', 'first_name', null, ['class'=>'form-control']) !!}
                </div>                          
                 
               <div class="form-group">
               <label>Prezime</label>                              
                  {!! Form::input('text', 'last_name', null, ['class'=>'form-control']) !!}            
               </div>
                          
               <div class="form-group">
               <label>Mesto</label>                              
                  {!! Form::input('text', 'city', null, ['class'=>'form-control']) !!}            
               </div>
                          
               <div class="form-group">
               <label>Adresa</label>                              
                  {!! Form::input('text', 'adress', null, ['class'=>'form-control']) !!}            
               </div>
                                                                
                <div class="form-group">
                  <label>Kršten vodom</label>
                 {!! Form::input('text','baptized_water', null, ['class'=>'form-control datepicker']) !!}

                </div>
                          
               <div class="form-group">
               <label>Kršten Duhom Svetim</label>                              
                  {!! Form::input('text', 'baptized_spirit', null, ['class'=>'form-control']) !!}            
               </div>
                          
                <div class="form-group">
                  <label>Slika</label>
                  {!! Form::file('image',['class'=>'form-control']) !!}
                </div> 
                 
               <div class="form-group">
               <label>Telefon</label>                              
                  {!! Form::input('text', 'phone', null, ['class'=>'form-control']) !!}            
               </div>
                          
               <div class="form-group">
               <label>Email</label>                              
                  {!! Form::input('text', 'email', null, ['class'=>'form-control']) !!}            
               </div>
                                                                
                <div class="form-group">
                 <label>Komentar</label>  
                 {!! Form::textarea('comment', null, ['size' => '70x5','class'=>'form-control']) !!}               
                </div> 
                   <div class="form-group" style="margin-top: 35px;">
                            <span style="margin-right: 10px;">Status:</span>              
                            <label>
                                {!! Form::checkbox('active', 1, 1) !!} Aktivan
                            </label> 
                        </div>                                         
                          
                </div>
        <div class="box-footer">
         <div class="pull-left">
         <a href="{{route('show_members', $church->id)}}" class="btn btn-primary btn-lg">Nazad</a>
         </div>
            
         <div class="pull-right">
             <button class="btn btn-success btn-lg">Sačuvaj</button>
         </div>
        
                      </div>
                 </div>
             </div>
              
        </div>
    </section>
    {!! Form::close() !!}
    
    <!-- /.content -->
@endsection