@if( Sentinel::inRole('root') || Sentinel::hasAccess(['info.show']) )
    <li class="{{ request()->is('info*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('info*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">info</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['info.show']))
                <li class="{{request()->is('info/lists*') == true  ? 'active' : '' }}">
                    <a href="{{route('info.index')}}"><i class="fa fa-dot-circle-o"></i> Info Lists</a>
                </li>
            @endif
        </ul>
    </li>
@endif
