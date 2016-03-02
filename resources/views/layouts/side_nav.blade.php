<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                <a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Summary</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Clients<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('*clients/create*') ? 'class="active"' : '') }}>
                        <a href="{{ action('ClientsController@create') }}"> Add client</a>
                    </li>
                    <li {{ (Request::is('*clients/pending*') ? 'class="active"' : '') }}>
                        <a href="{{ action('ClientsController@pending') }}"> Pending clients</a>
                    </li>
                    <li {{ (Request::is('*clients/contacted*') ? 'class="active"' : '') }}>
                        <a href="{{ action('ClientsController@sent') }}"> Contacted clients</a>
                    </li>
                </ul>
            </li>
            <li {{ (Request::is('*users*') ? 'class="active"' : '') }}>
                <a href="{{ action('UsersController@index') }}"><i class="fa fa-user fa-fw"></i> Users</a>
            </li>
        </ul>
    </div>
</div>