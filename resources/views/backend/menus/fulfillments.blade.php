@if(Sentinel::inRole('root') || Sentinel::hasAccess(['fulfillments.show']) || Sentinel::hasAccess(['category.show']) || Sentinel::hasAccess(['posts.show']))
    <li class="{{ request()->is('auth/fulfillments*') || request()->is('auth/categories*') || request()->is('auth/posts*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('auth/fulfillments*')) || (request()->is('auth/categories*')) || (request()->is('auth/posts*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">Content</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            <!-- @if(Sentinel::inRole('root') || Sentinel::hasAccess(['fulfillments.show']))
            <li class="{{request()->is('auth/fulfillments*') == true  ? 'active' : '' }}">
                <a href="{{route('fulfillments.index')}}"><i class="fa fa-dot-circle-o"></i> Fulfillments</a>
            </li>
            @endif -->
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['category.show']))
            <li class="{{request()->is('auth/categories*') == true  ? 'active' : '' }}">
                <a href="{{route('category.index')}}"><i class="fa fa-dot-circle-o"></i> Categories</a>
            </li>
            @endif
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['tag.show']))
            <li class="{{request()->is('auth/tags*') == true  ? 'active' : '' }}">
                <a href="{{route('fulfillments.tag.index')}}"><i class="fa fa-dot-circle-o"></i> Tags</a>
            </li>
            @endif
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['posts.show']))
            <li class="{{request()->is('auth/posts*') == true  ? 'active' : '' }}">
                <a href="{{route('posts.index')}}"><i class="fa fa-dot-circle-o"></i> Posts</a>
            </li>
            @endif
        </ul>
    </li>
@endif
