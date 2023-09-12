<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ asset('admin/images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="/"><img src="{{ asset('admin/images/logo2.png') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ (request()->is('back')) ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                @permission(['Permission Update','All'])
                <li class="{{ (request()->is('back/permission')) ? 'active' : '' }}">
                    <a href="{{ route('admin.permissions') }}"> <i class="menu-icon fa fa-lock"></i>Permissions</a>
                </li>
                @endpermission

                @permission(['Role Update','All'])
                <li class="{{ (request()->is('back/roles')) ? 'active' : '' }}">
                    <a href="{{ route('admin.roles') }}"> <i class="menu-icon fa fa-tasks"></i>Roles </a>
                </li>
                @endpermission

                @permission(['Author Update','All'])
                <li class="{{ (request()->is('back/authors')) ? 'active' : '' }}">
                    <a href="{{ route('admin.authors') }}"> <i class="menu-icon fa fa-users"></i>Authors </a>
                </li>
                @endpermission

                <h3 class="menu-title">Blog</h3><!-- /.menu-title -->

                @permission(['Category List','All'])
                <li class="{{ (request()->is('back/categories')) ? 'active' : '' }}">
                    <a href="{{ route('admin.categories') }}"> <i class="menu-icon fa fa-list-alt"></i>Categories </a>
                </li>
                @endpermission

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
