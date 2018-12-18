<div class="container-fluid" style="background-color:#232f3e !important;">
    <div class="row">
        <div class="col-md-2 p-0">
            <a class="navbar-brand" href="{{ url('/items') }}">
                <img src="{{ asset('image/lg.png') }}" alt="" class="ml-3 mt-4 d-inline" >   
            </a>
        </div>
        <div class="col-md-7 pb-0 pl-0">
           <div class="input-group md-form form-sm form-2 pl-0 mt-3 ml-2" >
                <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search for a product" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn" type="button">
                        <i class="fa fa-search" arial-hidden="true"></i>
                    </button>
                </div>
            </div>
            <nav class="navbar navbar-dark navbar-expand-md navbar-light m-0 pl-0" id="mainNav">              
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                  
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item px-2 pl-0">
                            <a href="{{ url('/items') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item px-2 {{!Auth::check() ? 'hideUnhide' : ''}}">
                            <a href="{{ url('/items/create')}}" class="nav-link">Sell</a>
                        </li>

                        <li class="nav-item px-2">
                            <a href="" class="nav-link">Help</a>
                        </li>
                        <li class="nav-item px-2">
                            <a href="" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item px-2">
                            <a href="" class="nav-link">Contact</a>
                        </li>
                    </ul>
            
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item px-2">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item px-2">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                        @else
                        <li class="nav-item px-2">
                                <a class="nav-link" href="#" role="button">
                                <i class="fas fa-shopping-cart"></i>
                                Cart</a>
                        </li>
                        <li class="nav-item dropdown px-2">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a href="/profile/{{Auth::user()->username}}" class="dropdown-item">
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>                          
                        @endguest
                    </ul>
                </div>
             </nav>
        </div>
        <div class="col-md-3 text-white my-2 d-none d-sm-block">
            <img src="{{ asset('image/banner-3.png') }}" class="img-fluid" alt="" style="width:275px; height:120px;">    
        </div>
     </div>
</div>