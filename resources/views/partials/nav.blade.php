<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="/home">DARLING COLLEGE</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbars">
                            <ul class="navbar-nav mr-auto">
                                @if (Route::has('login'))
                                    @if (Auth::check())
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="dropdown-pupils" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pupils</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-pupils">
                                        <a class="dropdown-item" href="/pupils/">View Class List</a>
                                        <a class="dropdown-item" href="/pupil/add">Add a Pupil</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                    @endif
                                @endif
                            </ul>
                            <ul class="navbar-nav navbar-right" >
                                @if (Auth::guest())
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                @else
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="account">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
</header>