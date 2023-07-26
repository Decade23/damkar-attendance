@if(Sentinel::inRole('root') || Sentinel::hasAccess(['report.show']) || Sentinel::hasAccess(['report_category.show']) )
    <li class="{{ request()->is('reports*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('reports*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">Reports</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['report_category.show']))
                <li class="{{request()->is('reports/category*') == true  ? 'active' : '' }}">
                    <a href="{{route('report_category.index')}}"><i class="fa fa-dot-circle-o"></i> Category</a>
                </li>
            @endif

            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['report.show']))
                <li class="{{request()->is('reports/lists*') == true  ? 'active' : '' }}">
                    <a href="{{route('report.index')}}"><i class="fa fa-dot-circle-o"></i> Reports Lists</a>
                </li>
            @endif
        </ul>
    </li>
@endif
