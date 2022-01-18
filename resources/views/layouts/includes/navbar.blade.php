<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="index.html"><img src="{{ asset('assets/img/companies_logos.jpg') }}" alt="Logo" class="img-responsive logo" style="height: 30px;"></a>
	</div>
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
		</div>
		<div id="navbar-menu">

			<ul>
				<ul class="col-md-2 col-md-offset-5 text-right">
		            <strong>{{ trans('validation.s.lang'); }}</strong>
		        </ul>
		        <ul class="col-md-2">
		            <select onchange="if (this.value) window.location.href=this.value" class="form-control">
		                <option value="{{ url('locale/en') }}">English</option>
		                <option value="{{ url('locale/id') }}">Indonesia</option>
		            </select>
		        </ul>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/user.png') }}" class="img-circle" alt="Avatar"> <span>{{ auth()->user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
					<ul class="dropdown-menu">
						<!-- <li><a href=""><i class="lnr lnr-user"></i> <span>{{ Auth::user()->lang == 'en' ? 'My Profile' : 'Profil Saya' }}</span></a></li> -->
						<li><a href="{{ route('logout') }}" 
								onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        <i class="lnr lnr-exit"></i> <span>{{ Auth::user()->lang == 'en' ? 'Logout' : 'Keluar' }}</span></a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>







