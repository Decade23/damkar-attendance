@if(Sentinel::inRole('root') || Sentinel::hasAccess(['picket.show']) )
    <li class="{{ request()->is('picket*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('picket*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">Picket</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['picket.show']))
                <li class="{{request()->is('picket/publish*') == true  ? 'active' : '' }}">
                    <a href="{{route('picket.index')}}"><i class="fa fa-dot-circle-o"></i> Lists</a>
                </li>
            @endif
        </ul>
    </li>
@endif
