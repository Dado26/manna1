@extends('layout.main')

@section('title', 'Manna - Contact')

@section('content')

 <div class="col-md-8 col-md-offset-2">
                <div class="account-wall contact-position">
                    <h2>Kontakt</h2>
                    
                @include('flash::message')
                    
                @include('partials.errors')

                   
                 {!! Form::open(['route'=>'send_contact_email_attempt', 'method'=>'POST', 'class'=>'validate']) !!}

                      
                      {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ime i Prezime','required']) !!}
                      
                      {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email','required']) !!}
                      
                        {!! Form::text('subject',null, ['class'=>'form-control','placeholder'=>'Naziv']) !!}
                      
                       {!! Form::textarea('content',null, ['class'=>'form-control','required']) !!}

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Pošalji</button>
                       
                  {!! Form::close() !!}
               
                 

                </div>
            </div>

@endsection