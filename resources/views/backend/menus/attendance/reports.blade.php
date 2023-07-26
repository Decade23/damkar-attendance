@if(Sentinel::inRole('root') ||
Sentinel::hasAccess(['report_damkar.show']) )
    <li class="{{ request()->is('report/*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('report/*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-thumb-tack"></span>
            <span class="sidebar-title">Report</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['report_damkar.show']))
                <li class="{{request()->is('report/picket*') == true  ? 'active' : '' }}">
                    <a href="{{route('report_damkar.index')}}"><i class="fa fa-dot-circle-o"></i> Picket</a>
                </li>
            @endif
        </ul>
    </li>
@endif
