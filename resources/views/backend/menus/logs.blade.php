@if(Sentinel::inRole('root') || Sentinel::hasAccess(['throttle.show']) )
    <li class="{{ request()->is('auth/logs*') || request()->is('auth/log-email*') || request()->is('auth/throttle*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('auth/logs*')) || (request()->is('auth/log-email*')) || request()->is('auth/throttle*') == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">Logs</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['throttle.show']))
            <li class="{{request()->is('auth/throttle*') == true  ? 'active' : '' }}">
                <a href="{{route('throttle.index')}}"><i class="fa fa-dot-circle-o"></i> Throttle</a>
            </li>
            @endif
		</ul>
	</li>
@endif
