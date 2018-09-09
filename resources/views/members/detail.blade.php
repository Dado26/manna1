@extends('layout.main')

@section('content')
<div class="row" style="margin-left: 10px;">
    <div class="col-md-6">
        <h2 style="margin-bottom: 30px;">Detalji o {{$member->first_name.' '.$member->last_name}}</h2>
        <h4><b>Adresa:</b> {{ $member->adress}}<hr><br>
            <b>Telefon:</b>  {{$member->phone}}<hr><br>
            <b> Email:</b>    {{$member->email}}<hr><br>
            <b> Komentar:</b><br><h5> {{$member->comment}}</h5> <hr>
        </h4>
    </div>
    <div class="col-md-6">
                @if($member->image)
                <img src="{{ asset('img/'.$member->image) }}" class="img-responsive" style="margin-top: 20px">    
                @endif                   
    </div>
    <div class="box-footer">
         <div class="pull-left">
             <a href="{{route('show_members', $member->church->id)}}" class="btn btn-primary btn-lg">Nazad</a>
         </div>
 </div>
</div>
 
@endsection