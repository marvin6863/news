<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ asset('others') }}/{{ $shareData['admin_logo']}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="/"><img src="{{ asset('others') }}/{{ $shareData['admin_logo2']}}"
                    alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('back') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                @permission(['Permission Update', 'All'])
                    <li class="{{ request()->is('back/permission') ? 'active' : '' }}">
                        <a href="{{ route('admin.permissions') }}"> <i class="menu-icon fa fa-lock"></i>
                            Permissions<span
                                class="badge badge-pill rounded badge-danger">{{ App\Permission::all()->count() }}</span></a>
                    </li>
                @endpermission

                @permission(['Role Update', 'All'])
                    <li class="{{ request()->is('back/roles') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles') }}"> <i class="menu-icon fa fa-tasks"></i>
                            Roles<span class="badge badge-pill rounded badge-info">{{ App\Role::all()->count() }}</span>
                        </a>
                    </li>
                @endpermission

                @permission(['Author Update', 'All'])
                    <li class="{{ request()->is('back/authors') ? 'active' : '' }}">
                        <a href="{{ route('admin.authors') }}"> <i class="menu-icon fa fa-users"></i>
                            Authors<span
                                class="badge badge-pill rounded badge-warning">{{ $shareData['authors']->count() }}</span>
                        </a>
                    </li>
                @endpermission

                <h3 class="menu-title">Blog</h3><!-- /.menu-title -->

                @permission(['Category List', 'All'])
                    <li class="{{ request()->is('back/categories') ? 'active' : '' }}">
                        <a href="{{ route('admin.categories') }}"> <i class="menu-icon fa fa-list-alt"></i>
                            Categories<span
                                class="badge badge-pill rounded badge-success">{{ $shareData['categories']->count() }}</span>
                        </a>
                    </li>
                @endpermission

                @permission(['Post List', 'All'])
                    <li class="{{ request()->is('back/posts') ? 'active' : '' }}">
                        <a href="{{ route('admin.posts') }}"> <i class="menu-icon fa fa-sticky-note-o"></i>
                            Posts<span class="badge badge-pill rounded badge-primary">{{ App\Post::all()->count() }}</span>
                        </a>
                    </li>
                @endpermission

                @permission(['System Settings', 'All'])
                    <li class="{{ request()->is('back/posts') ? 'active' : '' }}">
                        <a href="{{ route('setting') }}"> <i class="menu-icon fa fa-gear"></i>
                            Settings
                        </a>
                    </li>
                @endpermission

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="menu-icon fa fa-sign-out"></i>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
