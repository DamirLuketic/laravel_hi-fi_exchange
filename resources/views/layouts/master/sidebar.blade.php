@if(Auth::check())

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li> <a href="{{route('users.index')}}">Users</a></li>

                <li>
                    <a href="#">Product:</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('products.index')}}">List</a>
                        </li>

                        <li>
                            <a href="{{route('products.create')}}">Crate</a>
                        </li>
                    </ul>

                    {{-- Admin part --}}


                    @if(Auth::user()->role_id === 1)

                    <a href="#">Admin:</a>

                    <ul class="nav nav-second-level">

                            <li>
                                <a href="{{route('admin.products.index')}}">Approve</a>
                            </li>

                    </ul>
                @endif

                    <!-- /.nav-second-level -->
                </li>

            </ul>

        </div>
        <!-- /.sidebar-collapse -->
    </div>

@endif