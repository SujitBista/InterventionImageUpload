<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="/">Chito Logo</a>
	<div class="collapse navbar-collapse" id="navbarCollapse">
			@if (Route::has('login'))
				<ul class="nav navbar-nav ml-auto">
					@auth
					<li class="nav-item active">
						<a href="{{ url('/home') }}" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
							<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
									Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
							</form>
					</li>
					@else
					<li class="nav-item">
						<a href="{{ route('login') }}" class="nav-link">Login</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('register') }}" class="nav-link">Register</a>
					</li>
					@endauth
				</ul>
			@endif
	</div>
		
</nav>


