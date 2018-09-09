@extends('layout.main')

@section('script')
 <script>
    $(".pull-right").on("submit", function(){
        return confirm("Da li stvarno Želite da izbrišete ovog člana?");
    });
</script>
@endsection

@section('content')
<div class="container-fluid" style="margin-right:-60px; width: 110%;margin-left: -10px">
    <div class="row">
        <div class="col-md-11">
            <h2 class="sub-header">Članovi {{ $church->name }}</h2>

            <hr>

            <a href="{{ route('form_members', $church->id) }}" class="btn btn-success pull-right add-member" style="width: 200px">
                <i class="fa fa-plus"></i> Kreiraj Člana
            </a>
            
            @include('flash::message')
            <div class="container-fluid" style="align-content: center">    
                
            <form action="" method="get" style="margin-left: 10px; margin-bottom: 10px;" class="form-inline filter-form">
                <label>
                    Ime: 
                    <input name="first_name" value="{{ request()->get('first_name') }}" class="form-control">
                </label>
                <label>
                    Prezime: 
                    <input name="last_name" value="{{ request()->get('last_name') }}" class="form-control">
                </label>
                <input type="submit" value="Pretraži" class="btn btn-info" />
            </form>
                <a class="btn btn-primary float-right" style="margin-top: -47px;" href="{{route('show_active_members', $church->id )}}">Aktivni Clanovi </a>
            
            </div>  
           
              
            @if( $church->members->count() )
            <div class="table-responsive" style="padding-top: 15px">
                <table class="table table-striped">
                    <tr>                    
                        <th><a href="{{route('show_members', $church->id )}}">Ime</a></th>
                        <th><a href="{{route('show_members',[ $church->id, $secondParam = 1] )}}">Prezime</a></th>
                        <th>Mesto</th>
                        <th><a href="{{route('show_members',[ $church->id, $secondParam = 2] )}}">Kršten Vodom</a></th>  
                        <th>Kršten S.Duhom</th>    
                        <th><a href="{{route('show_members_by_create', $church->id )}}"> Kreirano</a></th>
                        <th><a href="{{route('show_members',[ $church->id, $secondParam = 3] )}}">Status</a></th>  
                        <th style="width:220px">Akcija</th>
                    </tr>
                
                    @foreach($members as $member)
                    <tr>   
                        <td>
                            @if($member->active)
                                {{ $member->first_name}}
                            @else
                                <p style="color: red"> {{ $member->first_name}}</p>
                            @endif
                        </td>
                        <td>
                            @if($member->active)
                                {{ $member->last_name }}
                            @else
                                <p style="color: red"> {{ $member->last_name}}</p>
                            @endif
                        </td>
                        <td>{{ $member->city}}</td>

                        <td>{!! $member->baptized_water ? $member->baptized_water->format('d.m.Y.') : '<i class="fa fa-close"></i>' !!}</td>

                        <td>{{ $member->baptized_spirit }}</td>

                        <td>{{ $member->created_at->format('d.m.Y. H:i') }}</td>
                        <td>
                            @if( $member->active)
                                <span class="text-success"><i class="fa fa-check"></i> Aktivan</span>
                            @else
                                <span class="text-danger"><i class="fa fa-close"></i> Neaktivan</span> 
                            @endif
                        </td>

                        <td style="padding-bottom: 0">
                          <a href="{{ route('home.detail', $member->id) }}" class="btn btn-primary">Detalji</a>
                          <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Uredi</a>

                          {!! Form::open(['route'=>['members.destroy', $member->id],'method'=>'DELETE','class'=>'pull-right']) !!}
                            <button type="submit" value="Delete" class="btn btn-danger">Izbriši</button>
                          {!!Form::close()!!}
                        </td>
                  
                    </tr>
                @endforeach
                </table>

                
          @if(request()->routeIs('show_active_members'))
          
          <h4>Aktivan broj članova: {{$count }} </h4>
          
          @else
          @if(request()->get('first_name') or request()->get('last_name'))
          
          @else
           <h4>Ukupan broj članova: {{$church->members->count() }}</h4>
          @endif
          
          @endif
          
          <div class="pull-right">
                    {!! $members->render() !!}
          </div>
                
            </div>
            @endif

            @if( $church->members->count() == 0 )
                <div class="d-flex justify-content-center" style="margin-bottom: 35px">
                   <h2>Nemate nijednog kreiranog člana!</h2>
                </div>  
            @endif
        </div>
    </div>
</div>
@endsection