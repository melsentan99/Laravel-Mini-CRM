<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				
				<li><a href="{{ route('company.index') }}" class="{{ Request::is('home') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>{{ trans('validation.company'); }}</span></a></li>
				<li><a href="{{ route('employee.index') }}" class="{{ Request::is('employee') ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>{{ trans('validation.employee'); }}</span></a></li>

				<li><a href="{{ route('timezone') }}" class="{{ Request::is('timezone') ? 'active' : '' }}"><i class="lnr lnr-clock"></i> <span>{{ trans('validation.timezone'); }}</span></a></li>

				<li><a href="{{ route('items.index') }}" class="{{ Request::is('items') ? 'active' : '' }}"><i class="lnr lnr-tag"></i> <span>{{ trans('validation.items'); }}</span></a></li>
				
				<li><a href="{{ route('sells.index') }}" class="{{ Request::is('sells') ? 'active' : '' }}"><i class="lnr lnr-cart"></i> <span>{{ trans('validation.sells'); }}</span></a></li>

				<li><a href="{{ route('sell-summary.index') }}" class="{{ Request::is('sell-summary') ? 'active' : '' }}"><i class="lnr lnr-database"></i> <spanS>Sell Summary</span></a></li>

<!-- 				<li>
					<a href="#subPages" data-toggle="collapse" class="{{ Request::is('sell-summary') ? 'active' : '' }}"><i class="lnr lnr-book"></i> <span>{{ trans('validation.sell_summary'); }}</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages" class="collapse">

						<ul class="nav" id="subPages" class="collapse"> 
							<li><a href="{{ route('sell-summary.index') }}" class="{{ Request::is('sell-summary') ? 'active' : '' }}"><i class="lnr lnr-boox"></i> <span>{{ trans('validation.daily') }}</span></a></li>
							
						</ul>
					</div>
				</li> -->
			</ul>
		</nav>
	</div>
</div>