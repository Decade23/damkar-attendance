@if(Sentinel::inRole('root') || Sentinel::hasAccess(['news.show']))
    <li class="{{ request()->is('news*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('news*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">News</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['news.show']))
            <li class="{{request()->is('news*') == true  ? 'active' : '' }}">
                <a href="{{route('news.index')}}"><i class="fa fa-dot-circle-o"></i> News</a>
            </li>
            @endif
        </ul>
    </li>
@endif
