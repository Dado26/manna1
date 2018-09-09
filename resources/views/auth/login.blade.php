@extends('layout.main')

@section('title', 'Manna - Login in')

@section('auth')

<div class="row text-center">
 <div class="col-md-6 col-md-offset-3">
                <div class="account-wall login-position">
                    <h2>Prijavite se</h2>
                    <img class="profile-img img-circle" style="margin-bottom: 15px" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=220">
                  
                 @include('partials.errors')

                   
                 {!! Form::open(['route'=>'login', 'method'=>'POST', 'class'=>'form-signin validate login']) !!}

                      
                      {!! Form::text('email',null, ['class'=>'form-control','placeholder'=>'Email','required','style'=>'margin-bottom:15px']) !!}
                      
                      {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Šifra','required']) !!}
                      
                      <label class="remember-me">
                      {!! Form::checkbox('remember_me') !!}
                      Zapamti me
                      </label> 
                      
                        <button class="btn btn-lg btn-primary btn-block" style="margin-bottom: 10px" type="submit">Prijavi me</button>
                       
                        {!! Form::close() !!}
                    
                        <a href="{{ route('register_form') }}" class="text-center new-account" style="text-decoration:none;">Kreiraj nalog</a>

                </div>
            </div>
    </div>

@endsection