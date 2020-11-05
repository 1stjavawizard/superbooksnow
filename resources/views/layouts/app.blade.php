<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   
	

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
	
	 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@yield('css')
	
	<style>
	 .btn-info{
		 color:white;
	 }
	</style>
	<link rel="stylesheet" href="{{ asset('assets/vendor/datatables_net_bs4/css/dataTables.bootstrap4.min.css') }}" type="text/css">
	
</head>
<body class="bg-default">
 <span id="app"></span>
@auth
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
           SuperBooks 
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">
				
				     @guest
                           
                            @if (Route::has('register'))
                               
                            @endif
                        @else
							 {{ Auth::user()->name }}
                           
                            </span>
                        @endguest
				</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('posts.index')}}">
                 <i class="fas fa-book"></i>
                <span class="nav-link-text">Books</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('categories.index')}}">
                 <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Categories</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('trashed-posts.index')}}">
                <i class="ni ni-basket text-yellow"></i>
                <span class="nav-link-text">Trashed</span>
              </a>
            </li>
          
         
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
      
          <!-- Navigation -->
         
		</div>
      </div>
    </div>
  </nav>
  <!-- Main content -->

  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            
			
		  </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"> {{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome  {{ Auth::user()->name }}!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
               
                <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										 <i class="ni ni-user-run"></i>
                                       <span> {{ __('Logout') }}</span>
                                    </a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
          
          <!-- Card stats -->
          <div class="row">
           
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
				<a class="nav-link" href="{{route('categories.index')}}">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Book Categories</h5>
                       
					   
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
				</a>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
				<a class="nav-link" href="{{route('posts.index')}}">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Books</h5>
                      
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
					   
                        <i class="fas fa-book"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
				</a>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
				<a class="nav-link" href="{{route('trashed-posts.index')}}">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Book Archive</h5>
                      
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-basket"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
				</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
   <!-- Page content -->
    
    <div class="container-fluid mt-2">
         @if(session()->has('success'))
		  <div class="alert alert-success">
		  {{session()->get('success')}}
	      </div>
		@endif
		
		 @if(session()->has('error'))
		  <div class="alert alert-danger">
		  {{session()->get('error')}}
	      </div>
		@endif
      <div class="row">
        <div class="col-xl-12">
         @yield('content')
		</div>
       
		
      </div>
      <!-- Footer -->
  
  </div>
    
    </div>
  <footer class="footer pt-0" style="positon:fix;bottom:0;">
        <div class="row align-items-center justify-content-lg-between mb-0">
          <div class="col-xl-12">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">Segun sowemimo</a>
            </div>
          </div>
          <div class="col-lg-6">
           .
          </div>
        </div>
      </footer>

    
	 
		 
	
		
		
		

		
		
		
		
		
		
		
		
		
		
          
		  @else
			  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{url('/home')}}">
        SuperBooks 
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
	  
	  <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                           
                            @if (Route::has('register'))
                               
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    </div>
  </nav>
  
			  <main class="py-4">
			   @yield('content')
             </main>
		  @endauth
        
    
	 <script src="{{ asset('js/app.js') }}"></script>
	 
	 <script src="{{ asset('assets/vendor/datatables_net/js/jquery.dataTables.min.js') }}"></script>
	 
	  <script src="{{ asset('assets/vendor/datatables_net_bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	 
	  <!--<script src=" https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

-->
	 <script>
	 
	 $(document).ready( function () {
       $('.mytable').DataTable();
} );
	 </script>
	@yield('scripts')
	
</body>
</html>
