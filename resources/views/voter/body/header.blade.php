<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#"><img src="{{asset('frontend/assets/img/logo2.png')}}"></a><a class="navbar-brand" href="#"><img src="{{asset('frontend/assets/img/logo.png')}}"></a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="#services">Application</a>
					</li>

					<li class="nav-item">

						@auth
						<a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
						@else
						<a class="nav-link" href="{{route('login')}}">Login</a>
						@endauth

					</li>
				</ul>
			</div>
		</div>
	</nav>