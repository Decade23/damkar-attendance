@if(Sentinel::inRole('root') || Sentinel::hasAccess(['contact_us.show']))
    <li class="{{(request()->is('auth/settings*')) == true  ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('auth/settings*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-cogs"></span>
            <span class="sidebar-title">Settings</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['contact_us.show']))
            <li class="{{request()->is('auth/settings/contact-us*') == true  ? 'active' : '' }}">
                <a href="{{route('contact_us.index')}}"><i class="fa fa-dot-circle-o"></i> Contact Us</a>
            </li>
            @endif
        </ul>
    </li>
@endif
