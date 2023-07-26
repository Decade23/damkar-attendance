<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">

                <li class="{{request()->is('advertisement*') == true ? 'active':''}}">
                    <a href="{{route('picket.index')}}">Picket</a>
                </li>
        </ul>
    </div>

    <div class="topbar-right">
         <ul class="nav nav-list nav-list-topbar pull-left">
                <li class="">
                    <a href="#">#</a>
                </li>
        </ul>
    </div>
</header>
