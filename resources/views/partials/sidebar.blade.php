

<div id="sidebar-wrapper" style="{{ !auth()->check() ? : 'width: 224px;height:100%'}}" >
    <h2>Meni</h2>
    <ul class="sidebar-nav" style="{{ !auth()->check() ? :'margin-left: -20px'}}">
        @if($user)
            <li style="margin-top:50px" class="{{ !request()->is('create') ?: 'active' }}">
                <a href="{{route('create') }}"><i class="fa fa-plus"></i> Dodaj Crkvu</a>
            </li>
            <li class="{{ !request()->is('church') ?: 'active' }}">
                <a href="{{route('church.index') }}"><i class="fa fa-list"></i> Moje Crkve</a>
            </li>

            <hr>

            <li><h3 style="margin-left: 25px">Crkve</h3></li>

           @foreach($user->churches as $church)
            <li>
                <a href="{{ route('show_members', $church->id) }}">
                    <i class="fa fa-home"></i> {{ $church->name }}
                </a>
                <a class="pull-right" href="{{ route('form_members', $church->id) }}" style="height:40px; padding-top: 13px"><i class="fa fa-plus"></i></a>
            </li>
            @endforeach
        @endif
    </ul>
</div>