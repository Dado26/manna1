@extends('layout.main')

@section('title', 'Manna - Register')

@section('auth')

<div class="row text-center">
   <div class="col-sm-8 blog-main">
        <div class="col-md-6 col-md-offset-3">
              <div class="account-wall register-position">
                    <h2>Registrujte se</h2>
                    <img class="profile-img img-circle" style="margin-bottom: 15px" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=220">
                  
                 @include('partials.errors')

                   
                 {!! Form::open(['route'=>'register', 'method'=>'POST', 'class'=>'form-signin validate']) !!}

                       {!! Form::text('first_name',null, ['class'=>'form-control','placeholder'=>'Ime', 'required','style'=>'margin-bottom:15px']) !!}
                      
                       {!! Form::text('last_name',null, ['class'=>'form-control','placeholder'=>'Prezime', 'required','style'=>'margin-bottom:15px']) !!}
                       
                      {!! Form::text('email',null, ['class'=>'form-control','placeholder'=>'Email','required','style'=>'margin-bottom:15px']) !!}
                      
                      {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Šifra','required','style'=>'margin-bottom:15px']) !!}
                      
                      {!! Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Potvrdi šifru','required','style'=>'margin-bottom:15px']) !!}

                                            
                       <button class="btn btn-lg btn-primary btn-block" style="margin-bottom: 10px" type="submit">Registruj me</button>
                       
                        {!! Form::close() !!}
                   
                        <a href="{{route('login_form')}}" class="text-center new-account" style="text-decoration: none">Već imam nalog</a>

                </div>
            </div>
         </div>
      </div>
@endsection