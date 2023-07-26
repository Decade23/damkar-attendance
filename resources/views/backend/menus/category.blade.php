@if(Sentinel::inRole('root') || Sentinel::hasAccess(['category_sub.show']) || Sentinel::hasAccess(['category_sub_detail.show']) )
    <li class="{{ request()->is('categories*') == true ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('categories*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-th-list"></span>
            <span class="sidebar-title">Fulfillments</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
{{--            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['category_sub.show']))--}}
{{--                <li class="{{request()->is('categories/sub/parent*') == true  ? 'active' : '' }}">--}}
{{--                    <a href="{{route('category_sub.index')}}"><i class="fa fa-dot-circle-o"></i> Category Sub</a>--}}
{{--                </li>--}}
{{--            @endif--}}

            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['category_sub_detail.show']))
                <li class="{{request()->is('categories/sub/child/detail*') == true  ? 'active' : '' }}">
                    <a href="{{route('category_sub_detail.index')}}"><i class="fa fa-dot-circle-o"></i> Posts</a>
                </li>
            @endif
        </ul>
    </li>
@endif
