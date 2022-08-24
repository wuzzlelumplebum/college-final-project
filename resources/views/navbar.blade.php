
<div class="navbar navbar-expand-md navbar-dark" style="background-color: #3bbbaf">
	<div class="navbar-brand" style="padding-top: 0px;padding-bottom: 0px;min-width:100px">
		<a class="d-inline-block" href="{{ url('/') }}">
			<img src="{{ URL::asset('global_assets/images/nore_w_1000px.png') }}" alt="" style="height:48px">
		</a>
	</div>

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
		</ul>

		<span class="ml-md-3 mr-md-auto">&nbsp;</span>

		<ul class="navbar-nav">


			<li class="nav-item dropdown">
			</li>

			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="{{ URL::asset('global_assets/images/user-default.png') }}" class="rounded-circle mr-2" height="34" alt="">
					<span>{{\Auth::user()->nama}}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<!-- <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a> -->
					<a href="{{ url('/changepass') }}" class="dropdown-item"><i class="icon-cog5"></i> Ganti Password</a>
					<a href="{{ url('/logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
		</ul>
	</div>
</div>
