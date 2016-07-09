@if(Cookie::get('user'))

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li> <a href="{{route('posts.index')}}">Posts</a></li>

                <li>
                    <a href="{{route('posts.create')}}"><i class="fa fa-wrench fa-fw"></i>Create post</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('posts.show', 1)}}">Category 1</a>
                        </li>

                        <li>
                            <a href="{{route('posts.show', 2)}}">Category 2</a>
                        </li>

                        <li>
                            <a href="{{route('posts.show', 3)}}">Category 3</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

            </ul>

        </div>
        <!-- /.sidebar-collapse -->
    </div>

@endif