<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Nikita-Veselov" />

        <title>Wann.fun - short URL's for you</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet" type="text/css" >
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        
        

        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top navbar-gradient">
            <div class="container container-md">
                <a class="navbar-brand navbar-brand-font" href="#!">Wannfun</a>
                <div class="row">

                    @if(Auth::check())
                        <!-- Profile link -->
                        <div class="col-6">
                            <form method="get" action="/profile">
                                <button class="btn btn-primary custom-font" type="submit">{{ Auth::user()->name }}</button>
                            </form>
                        </div>
                        <!-- Leave link -->
                        <div class="col-6">
                            <form method="get" action="/login">
                                <button class="btn btn-primary custom-font" type="submit">Logout</button>
                            </form>
                        </div>
                    @else
                        <!-- Login form -->
                        <div class="col-6 dropdown">
                            <button 
                                class="btn btn-primary dropdown-toggle" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false"
                                data-bs-auto-close="outside"
                            >
                                Log In
                            </button>

                            <div class="dropdown-menu dropdown-menu-md-end dropdown-menu-start">
                                <form class="px-4 py-3" style="width: 15rem;" method="POST" action="/login">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                        <label class="form-check-label" for="remember" >Remember me</label>   
                                        <input type="checkbox" class="form-check-input" name="remember">
                                        
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Forgot password?</a>
                            </div>
                        </div>
                        <!-- Registration form -->
                        <div class="col-6 dropdown">
                            <button 
                                class="btn btn-primary dropdown-toggle" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false"
                                data-bs-auto-close="outside"
                            >
                                Register
                            </button>

                            <div class="dropdown-menu dropdown-menu-end">
                                <form class="px-4 py-3" style="width: 15rem;" method="POST" action="/registration">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" placeholder="email@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>
                            </div>

                        </div>
                    @endif

                    
                </div>
            </div>
        </nav>

        
        <!-- Main-->
        <header class="masthead" style="background: url('{{ asset('assets/img/bg-masthead.jpg') }}') no-repeat center center">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="custom-font mb-5">Create your new short URL!</h1>

                            @if(session()->has('success'))
                                <div class="alert alert-success">{{ session()->get('success') }}</div>
                                @if(session()->has('url'))
                                <div class="alert alert-info">{{ session()->get('url') }}</div>
                                @endif
                            @endif

                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            
                            <!-- URL form-->
                            <form method="post" action="{{ route('main.store') }}">
                                @csrf

                                <div class="input-group">
                                    <input 
                                        class="form-control custom-font" 
                                        type="text" 
                                        placeholder="Enter your URL (e.g. https://google.com)" 
                                        aria-label="Enter your URL (e.g. https://google.com)" 
                                        aria-describedby="button-submit" 
                                        id="url-form"
                                        name="output_url"
                                    />

                                    <select name="input_url">
                                        <option><div class="active">date_me</div></option>
                                        <option><div class="">kiss_me</div></option>
                                        <option><div class="">wanna_date_me</div></option>
                                        <option><div class="">my_photos</div></option>
                                        <option><div class="">date_me_then</div></option>
                                        <option><div class="">please_date_me</div></option>
                                        <option><div class="">date_4_me</div></option>
                                    </select>
                                
                                    <button 
                                        class="btn btn-primary custom-font" 
                                        type="submit" 
                                        onclick="copyToClipboardById('url-form')"
                                        data-bs-toggle="tooltip" 
                                        data-bs-placement="bottom" 
                                        title="Your new URL will be automaticaly copied to your clipboard!"
                                    >
                                        Create
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Ads --}}
        <div id="id_banner_affi" class="ad-container">Stop AdBlock!</div>

        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                            <h3>Adjustable size</h3>
                            <p class="lead mb-0">
                                Your links will look great on any device, no matter the size!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                            <h3>Statistics ready</h3>
                            <p class="lead mb-0">
                                Log in and check the statistics of your link at any time! Including geo, timstamps and more.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                            <h3>Easy to Use</h3>
                            <p class="lead mb-0">Ready to use with any of your links or customize it for your personal needs!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!-- Testimonials-->
        <section class="testimonials text-center bg-white">
            <div class="container">
                <h2 class="mb-5">What people are saying...</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets/img/testimonials-4.jpg') }}" alt="..." />
                            <h5>Jayesh D.</h5>
                            <p class="font-weight-light mb-0">"Perform great with social media and chat traffic."</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets/img/testimonials-5.jpg') }}" alt="..." />
                            <h5>Tushar K.</h5>
                            <p class="font-weight-light mb-0">"This product is truly amazing! I've increased my CR up to 50% with it."</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets/img/testimonials-6.jpg') }}" alt="..." />
                            <h5>Lakshit B.</h5>
                            <p class="font-weight-light mb-0">"Easy to use and effective as well. Perfect for the tasks it made for."</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer bg-light navbar-gradient">
            <div class="container">
                <div class="row">
                    <div class="col-12 h-100 text-center my-auto">
                        <ul class="list-inline mb-2">
                            {{-- <li class="list-inline-item"><a href="#!">About</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contact</a></li> --}}
                            <li class="list-inline-item">Email: wann.fun.shortener@gmail.com</li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item">Partners: 
                                <a href="https://lambushka.media" class="text-decoration-none link-light">Lambushka</a> |
                                <a href="https://chikikliki.com" class="text-decoration-none link-light">Chikikliki</a>
                            </li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Wann.fun 2021. All Rights Reserved.</p>
                    </div>
                    {{-- <div class="col-12 h-100 text-center my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-facebook fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-instagram fs-3"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </footer>
        {{-- Ad srcipts --}}

        <script src="//mediapalmtree.com/bn-script.js?t=1627242299" data-ts="1627242300" data-domain='gecontentasap.com' data-cdn-domain='mediapalmtree.com' data-promo-cdn='mediapalmtree.com' data-pl-token='1d1635376a82f4ef54e5d450cbfaa568c7c8dc5e' data-target='nw' data-freq='oncePer2Minutes' data-place-id='id_banner_affi' ></script>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        
    </body>
</html>
