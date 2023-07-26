@if(Sentinel::inRole('root') || Sentinel::hasAccess(['advertisement.show']) || Sentinel::hasAccess(['advertisement_customer.show']))
    <li class="{{ request()->is('advertisement*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('advertisement*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">Advertisements</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['advertisement.show']))
            <li class="{{request()->is('advertisement/publish*') == true  ? 'active' : '' }}">
                <a href="{{route('advertisement.index')}}"><i class="fa fa-dot-circle-o"></i> Publish Ads</a>
            </li>
            @endif

            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['advertisement_customer.show']))
                <li class="{{request()->is('advertisement/customer*') == true  ? 'active' : '' }}">
                    <a href="{{route('advertisement.customer.index')}}"><i class="fa fa-dot-circle-o"></i> Customer Ads</a>
                </li>
            @endif
        </ul>
    </li>
@endif
