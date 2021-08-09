<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Nikita-Veselov" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <title>Wann.fun - URL Shortener for dating and nutra ads</title>
        
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet" type="text/css" >
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3YV643GP6L"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-3YV643GP6L');
        </script>
    </head>
    <body>
        
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top navbar-gradient">
            <div class="container container-md">
                <div class="row justify-content-evenly align-items-center">
                    <div class="col-12 col-lg py-2 py-lg-0">
                        <div class="row">
                            <div class="col-12 navbar-brand-font text-center" style="font-size: 3.5rem">Wann.fun</div>
                            <div class="col-12 fs-6 fst-italic fw-bolder text-center text-black-50">First URL shortener for social media monetization.</div>
                        </div>
                    </div>  

                    <div class="col-12 col-lg py-2 py-lg-0">
                        <div class="row ">
                            <div class="alert alert-warning alert-dismissible fade show mb-0 " role="alert">
                                <strong>Sign up for full link customization and detailed statistics!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>   
                        </div>
                    </div> 

                    <div class="col-12 col-lg py-2 py-lg-0">
                        {{-- Register popover --}}    
                
                        <div class="d-flex justify-content-center"> 
                            @if(Auth::check())

                                {{-- Admin link --}}
                                @if( in_array(Auth::user()->name, $admins) )
                                    
                                        <div class="px-3">
                                            <form method="get" action="/admin">
                                                <button class="btn btn-primary custom-font" type="submit">Admin</button>
                                            </form>
                                        </div>    
                                    
                                @endif

                                <!-- Profile link -->
                                <div class="px-3">
                                    <form method="get" action="/profile">
                                        <button class="btn btn-primary custom-font" type="submit">Profile</button>
                                    </form>
                                </div>
                                <!-- Leave link -->
                                <div class="px-3">
                                    <form method="get" action="/login">
                                        <button class="btn btn-primary custom-font" type="submit">Log Out</button>
                                    </form>
                                </div>
                            @else
                                <!-- Login form -->
                                <div class="px-3 dropdown">
                                    <button 
                                        class="btn btn-primary dropdown-toggle custom-font" 
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
                                            <button type="submit" class="btn btn-primary">Log in</button>
                                        </form>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Forgot password?</a>
                                    </div>
                                </div>
                                <!-- Registration form -->
                                <div class="px-3 dropdown">
                                    <button 
                                        class="btn btn-primary dropdown-toggle custom-font" 
                                        data-bs-toggle="dropdown" 
                                        aria-expanded="false"
                                        data-bs-auto-close="outside"
                                    >
                                        Sign Up
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
                                            <button type="submit" class="btn btn-primary">Sign Up</button>
                                        </form>
                                    </div>

                                </div>
                            @endif

                        </div>
                    </div>  
                </div>
                
                
                

                
                
                
                
            </div>
        </nav>

        <!-- Main-->
        <header class="masthead" style="background: url('{{ asset('assets/img/bg-masthead.jpg') }}') no-repeat center center"> 
            
            <div class="container-fluid position-relative">   
                <div class="row justify-content-center">
                    <div class="col px-4 col-lg-6 px-lg-0 ">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="custom-font mb-5">Create your new short URL!</h1>
                            @if(session()->has('success'))
                                <div class="alert alert-success">{{ session()->get('success') }}</div>
                                @if(!empty(session()->get('url')))
                                    <div class="alert alert-info">{{ session()->get('url') }}</div>
                                @endif
                            @endif

                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            
                            <!-- URL form-->
                            <form method="post" action="{{ route('store') }}">
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
                                        <option><div class="">please_date_me</div></option>
                                        <option><div class="">chill_with_me</div></option>
                                        <option><div class="">my_photos</div></option>
                                        <option><div class="">my_pics</div></option>
                                        <option><div class="">pills</div></option>
                                        <option><div class="">magic_pills</div></option>
                                        <option><div class="">power_pills</div></option>
                                        <option><div class="">gel</div></option>
                                        <option><div class="">super_gel</div></option>
                                        <option><div class="">get_size</div></option>
                                    </select>
                                
                                    <button 
                                        class="btn btn-primary custom-font" 
                                        type="submit" 
                                        {{-- onclick="copyToClipboardById('url-form')"
                                        data-bs-toggle="tooltip" 
                                        data-bs-placement="bottom" 
                                        title="Your new URL will be automaticaly copied to your clipboard!" --}}
                                    >
                                        Create
                                    </button>
                                    
                                </div>
                                    
                                <p>
                                    By using the site you agree to our 
                                    <a href="" data-bs-toggle="modal" data-bs-target="#modal-terms" class="text-decoration-none link-info">Terms.</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        
        {{-- Ads --}}
            {{-- Direct --}}
        {{-- <a href="https://hypevpnddl.com/M3rXt5af71800a227e52cb1ede0b1ecc3563c1ccab2ca">
        <div class="container-fluid" style="background-color: rgb(130, 190, 102)">
            <div class="row">
                <div class="col-12 "><img class="img-fluid mx-auto d-block" src="{{ asset('assets/img/test-ad.jpg') }}" alt="..." /></div>
            </div>   
        </div>
        </a> --}}
            {{-- Push AD --}}
        {{-- <script src="//mediapalmtree.com/v2/loader.js?_t=54278" data-ts="1628343223" data-token="3150f81d199f26a4b148c34b436b9e34928ae593" data-am="true" data-promo-cdn="mediapalmtree.com"></script> --}}
         
            {{-- Banner --}}
        {{-- <div id="id_banner_affi" style="width: 768px; margin-left: auto; margin-right: auto;">Consider turning off AdBlock to support our free web-service!</div> --}}
        
        <a href="https://hypevpnddl.com/M3rXt5af71800a227e52cb1ede0b1ecc3563c1ccab2ca" class="text-decoration-none text-reset">
            <div class="container-fluid text-reset" style="background-color: rgb(135, 170, 118)">
                <div class="row row-cols-auto justify-content-center">
                    <div class="col py-2">
                        <img class="" src="{{ asset('assets/img/test-logo.png') }}" alt="..." />
                    </div>
                    <div class="col py-2 bg-light border-end border-start border-info border-5">
                        <div class="row row-cols-auto align-items-center mt-1">
                            <div class="col-12 col-sm-3 fs-2 fw-bold text-center" style="color: rebeccapurple">Best VPN</div>
                            <div class="custom-font col-12 col-sm fs-6 fw-light text-center text-break">
                                180 Days Free! 
                                VPN Award Winner 2021! 
                                Limited Time Offer!
                            </div>
                            <div class="col-12 col-sm-3">
                                <button type="button" class="btn btn-success mx-auto d-block">More info</button> 
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </a>
        

        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <img class="mx-auto" src="{{ asset('assets/img/icon_1.png') }}" alt="" style="width: 7rem;">
                            </div>
                            <h3>Built specially for marketing tasks</h3>
                            <p class="lead mb-0">
                                The first URL shortener able to make your dating or nutra promo link as clickable as possible!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <img class="mx-auto" src="{{ asset('assets/img/icon_2.png') }}" alt="" style="width: 7rem;">
                            </div>
                            <h3>Full link customization</h3>
                            <p class="lead mb-0">
                                Sign up and get access to the advanced functionality: make your own links with unique text and pull up full stats for each link you created as well!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <img class="mx-auto" src="{{ asset('assets/img/icon_3.png') }}" alt="" style="width: 7rem;">
                            </div>
                            <h3>Steady and swift</h3>
                            <p class="lead mb-0">
                                Links work stably with all dating apps, messengers and chat services - instant redirection with no ads integrated in the generated link!
                            </p>
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
                            <li class="list-inline-item">Email: <a href="mailto:admin@wann.fun" class="text-decoration-none link-light">admin@wann.fun </a></li>
                            <li class="list-inline-item">DMCA: <a href="mailto:dmca@wann.fun" class="text-decoration-none link-light">dmca@wann.fun </a></li>
                            <li class="list-inline-item">Partners: 
                                <a href="https://lambushka.media" class="text-decoration-none link-light">Lambushka</a> |
                                <a href="https://chikikliki.com" class="text-decoration-none link-light">Chikikliki</a> |
                                <a href="https://hypevpn.org" class="text-decoration-none link-light">Hype VPN</a> 
                            </li>
                        </ul>
                        <p><a href="" data-bs-toggle="modal" data-bs-target="#modal-terms" class="text-decoration-none link-info">Terms of service</a></p>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Wann.fun 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Modal --}}
        <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-center" id="ModalLabel">Terms of Use</h2>
                    </div>
                    <div class="modal-body">
                        <p>This Site allows publishers to shorten any URL and earn income by sharing the shortened URL. 
                            {{-- Advertising is shown to the viewer on their way to their destination URL. By using the Site's service, you agree that the Site includes advertisements on the shortened URLs which is a requirement for the Site to operate. --}}
                        </p>
                        <p>By using the Site's service, you agree&nbsp;<strong>not&nbsp;</strong>to:</p>
                        <ol>
                        <li>
                        <p>Advertise Wann.fun on&nbsp;<strong>traffic exchange</strong>&nbsp;websites and PTC/faucet websites;</p>
                        </li>
                        <li>
                        <p>Place shortened links on websites containing content that may be threatening, harassing, defamatory, obscene,&nbsp;<strong>adult content,&nbsp;pornography</strong>, contain any viruses, Trojan horses, worms, time bombs, cancelbots or contain software which may cause damage to the viewer or the Site's server;</p>
                        </li>
                        <li>
                        <p>Shrink URLs which redirect to websites containing the&nbsp;<strong>above mentioned content</strong>;</p>
                        </li>
                        <li>
                        <p>Offer an incentive or beg a visitor to click on your shortened links;</p>
                        </li>
                        <li>
                        <p>Spam any website, forum or blog with the Site's links;</p>
                        </li>
                        <li>
                        <p>Bring fake/automated traffic of any kind to your links. This will get your account terminated automatically by our system. Manipulation of our system to gain views is also not allowed. This includes iframes, redirects, bots, proxies, traffic exchange, Email traffic, PTC traffic, hitleap, jingling, etc;</p>
                        </li>
                        <li>
                        <p>Automatically redirect to your shortened url from a website. The viewer must click on the link him/herself;</p>
                        </li>
                        <li>
                        <p>Open your shortened URLs using an iframe or popups/popunder;</p>
                        </li>
                        <li>
                        <p>Click on your own shortened urls to generate revenue. We reserve the right to not pay for the revenue generated;</p>
                        </li>
                        <li>
                        <p>Create 'redirect loops' with&nbsp;Wann.fun URLs or similar services to generate revenue;</p>
                        </li>
                        <li>
                        <p>Create multiple accounts. Only one account per person is allowed;</p>
                        </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ad srcipts --}}
        {{-- Banner --}}
        {{-- <script src="//mediapalmtree.com/bn-script.js?t=1627242299" data-ts="1627242300" data-domain='gecontentasap.com' data-cdn-domain='mediapalmtree.com' data-promo-cdn='mediapalmtree.com' data-pl-token='1d1635376a82f4ef54e5d450cbfaa568c7c8dc5e' data-target='nw' data-freq='oncePer2Minutes' data-place-id='id_banner_affi' ></script> --}}
        
        {{-- Popper --}}
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        
        <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    </body>
</html>
