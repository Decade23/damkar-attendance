<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['reports_sales.show']))
                <li class="{{(request()->is('auth/reports/sales*')) == true  ? 'active' : '' }}">
                    <a href="{{route('reports.sales.index')}}?year={{\Carbon\Carbon::now()->year}}&month={{\Carbon\Carbon::now()->month}}">Sales</a>
                </li>
            @endif

            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['reports_agents.show']))
                <li class="{{(request()->is('auth/reports/agents*')) == true  ? 'active' : '' }}">
                    <a href="{{route('reports.agents.index')}}?year={{\Carbon\Carbon::now()->year}}&month={{\Carbon\Carbon::now()->month}}">Agents</a>
                </li>
            @endif

            
        </ul>
    </div>
</header>