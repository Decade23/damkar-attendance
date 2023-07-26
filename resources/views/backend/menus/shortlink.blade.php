@if(Sentinel::inRole('root') || Sentinel::hasAccess(['shortlink.show']))
    <li class="{{ request()->is('auth/shortlink*') == true ? 'active' : '' }}">
        <a href="{{ route('shortlink.index') }}">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">ShortLink</span>
        </a>
    </li>
@endif