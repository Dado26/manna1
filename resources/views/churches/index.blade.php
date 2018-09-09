@extends('layout.main')

@section('script')
    <script>
        $(".delete").on("submit", function(){
            return confirm("Da li stvarno želite da izbrišete crkvu?");
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid" style="margin-left: 20px">
        <div class="row">
            <div class="col-md-7">
                <h2 class="sub-header">Moje Crkve</h2>

                <hr>

                @include('flash::message')

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ime</th>
                            <th>Grad</th>
                            <th style="width:200px">Datum</th>
                            <th style="width:210px">Akcije</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->churches()->exists())
                            @foreach($user->churches as $church)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $church->name }}</td>
                                    <td>{{ $church->city }}</td>
                                    <td>{{ $church->created_at->format('d.m.Y. H:i:s') }}</td>
                                    <td>
                                        @if( $church->members->count() )
                                            <a href="{{ route('church.edit', $church->id) }}" class="btn btn-warning" style="margin-left: 25px; margin-bottom: 25px; width:100px;">Uredi</a>
                                        @else
                                            <a href="{{ route('church.edit', $church->id) }}" class="btn btn-warning pull-left" style="margin-left: 25px;margin-right: 45px;">Uredi</a>

                                            {!! Form::open(['route'=>['church.destroy', $church->id],'method'=>'DELETE', 'class'=>'delete']) !!}
                                            <button type="submit" value="delete" class="btn btn-danger">Izbriši</button>
                                            {!!Form::close()!!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="d-flex justify-content-center" style="margin-bottom: 35px">
                                <h2>Nemate nijednu kreiranu crkvu!</h2>
                            </div>
                            <a href="{{ route('create') }}" class="btn btn-success btn-lg position-create-church text-light">Kreirajte Crkvu</a>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection