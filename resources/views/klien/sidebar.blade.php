<style>

    ul{
        list-style-type: none;
    }
    
</style>
    
    
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md" style="background-color: #ffffff">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <img src="{{ URL::asset('global_assets/images/user-default.png') }}" width="38" height="38" class="rounded-circle" alt="">
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold" style="color: #000000">{{\Auth::user()->nama}}</div>
                        <div class="font-size-xs opacity-50" style="color: #000000">
                            <i class="icon-pin font-size-sm"></i> &nbsp;{{\Auth::user()->alamat}}
                        </div>
                    </div>

                    <div class="ml-3 align-self-center dropdown">
                        <a href="#" class="text-white" data-toggle="dropdown"><i class="icon-cog3" style="color: #000000"></i></a>
                        <div class="dropdown-menu">
                            <!-- <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a> -->
                            <a href="{{ url('/changepassklien') }}" class="dropdown-item"><i class="icon-cog5"></i> Ganti Password</a>
                            <a href="{{ url('/logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <hr style="margin-bottom: -20px;">
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu" title="Main"></i></li>

                <li class="nav-item">
                    <a href="{{ url('/customer') }}" class="nav-link {{ (request()->is('customer*')) ? 'active' : '' }}">
                        <i class="icon-home4" style="color: #000000"></i>
                        <span>
                            <font color="#000000">Dashboard</font>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/taskclients') }}" class="nav-link {{ (request()->is('tasks*')) ? 'active' : '' }}">
                        <i class="icon-stack-text"></i>
                        <span>
                        <font color="#000000">Task</font>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/history') }}" class="nav-link {{ (request()->is('history')) ? 'active' : '' }}">
                        <i class="icon-history" style="color: #000000"></i>
                        <span>
                        <font color="#000000">History Task</font>
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ (request()->is('tagihanuser*','dptagihanuser*')) ? 'active' : '' }}">
                        <i class="icon-users" style="color: #000000"></i>
						<span>
                        <font color="#000000">Tagihan & DP Tagihan</font>
						</span>
					</a>
                    <ul class="nav nav-group-sub" data-submenu-title="JSON forms" style="display: {{ (request()->is('tagihanuser*','dptagihanuser*')) ? 'block' : 'none' }};">
                        <li class="nav-item">
                            <a href="{{ url('/dptagihanuser') }}" class="nav-link {{ (request()->is('dptagihanuser*')) ? 'active' : '' }}">
                                <i class="icon-clipboard" style="color: #000000"></i>
                                <span>
                                <font color="#000000">DP Tagihan</font>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/tagihanuser') }}" class="nav-link {{ (request()->is('tagihanuser*')) ? 'active' : '' }}">
                                <i class="icon-clipboard" style="color: #000000"></i>
                                <span>
                                <font color="#000000">Tagihan</font>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/paymentclients') }}" class="nav-link {{ (request()->is('paymentclients*')) ? 'active' : '' }}">
                        <i class="icon-cash" style="color: #000000"></i>
                        <span>
                        <font color="#000000">Pembayaran</font>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->
        
    </div>
    <!-- /sidebar content -->

</div>
    