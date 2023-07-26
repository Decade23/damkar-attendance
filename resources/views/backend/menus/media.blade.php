@if(Sentinel::inRole('root') || Sentinel::hasAccess(['media.show']))
    <li class="{{ request()->is('auth/media*') == true ? 'active' : '' }}">
        <a href="{{route('media.index')}}">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">Media</span>
        </a>
    </li>
@endif