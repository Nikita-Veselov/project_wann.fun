@extends('layouts.main')

@section('content')

<!-- Navigation-->
<nav class="navbar navbar-light bg-light static-top navbar-gradient">
    <div class="container container-md">
        <div class="row justify-content-evenly align-items-center">
            {{-- Title --}}
            <div class="col-12 col-lg py-2 py-lg-0">
                <div class="row">
                    <div class="col-12 navbar-brand-font text-center" style="font-size: 3.5rem">Wann.fun</div>
                    <div class="col-12 fs-6 fst-italic fw-bolder text-center text-black-50">Custom URL shortener for effective promotion of dating and nutra offers</div>
                </div>
            </div>

            {{-- Alert --}}
            @if (session('navAlert') != 'close')
                <div class="col-12 col-lg py-2 py-lg-0">
                    <div class="row ">
                        <div class="alert alert-warning alert-dismissible fade show mb-0 " role="alert">
                            <strong>Sign up for full link customization and detailed statistics!</strong>
                            <a class="btn-close" href="{{ session()->put('navAlert', 'close'); }}" role="button" data-bs-dismiss="alert" aria-label="Close"></a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Button group --}}
            <div class="col-12 col-lg py-2 py-lg-0">
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

                                <a href="" data-bs-toggle="modal" data-bs-target="#modal-resetPassword" class="px-3 text-reset text-decoration-none">Forgot Password?</a>

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

{{-- Main --}}
<header class="masthead" style="background: url('{{ asset('assets/img/bg-masthead.jpg') }}') no-repeat center center">
    <div class="container-fluid position-relative">
        <div class="row justify-content-center">
            <div class="col px-4 col-lg-8 px-lg-0 ">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h1 class="custom-font mb-5">Create your new short URL!</h1>

                    @if(session()->has('email'))
                        <div class="alert alert-danger">{{ session()->get('email') }}</div>
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
                                placeholder="Enter your URL (e.g. https://google.com) and choose ending =>"
                                aria-label="Enter your URL"
                                aria-describedby="button-submit"
                                id="url-form"
                                name="output_url"
                            />

                            <select class="custom-font col-3" name="input_url">
                                @foreach ($linkOptions as $option)
                                    <option class="custom-font">{{ $option }}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-primary custom-font"type="submit">Create</button>

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
    {{-- Announcment --}}
    <div class="container-fluid position-relative h-50">
            {{-- Alert --}}
        <div class="row justify-content-center">
            <div class="col-6 p-4 mt-4">
                <div class="row">
                    <div class="alert alert-info alert-dismissible fade show mb-0 text-center" role="alert">
                        <div>Don't forget to register or sign in to have unlimited link lifespan! </div>
                        <div>2 weeks lifespan for unregistered users!</div>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

{{-- Ads --}}
    {{-- Banner --}}
<a href="https://g0t0-22.com/FYrV966705306d8d71dd8cb26ba85a92d575b606254fa" class="text-decoration-none text-reset">
    <div class="container-fluid text-reset" style="background-color: rgb(14, 21, 53)">
        <div class="row row-cols-auto align-items-center justify-content-center">
            <div class="col">
                <img class="py-auto" src="{{ asset('assets/img/AdImg/AtlasVPN/AtlasLogo.svg') }}" alt="..." style="min-width: 200px" />
            </div>
            <div class="col-1"></div>
            <div class="col border-end border-start border-info border-5 bg-gradient" style="background: rgb(168, 188, 229)">
                <div class="row row-cols-auto align-items-center mt-1">
                    <div class="col-12 col-lg-2 fs-1 fw-bold text-center" style="color: rgb(43, 90, 190)">Best VPN</div>
                    <div class="col-12 col-lg-6 custom-font font-weight-light fs-5 text-center text-break">
                        1.39$ Per Month!
                        Limited Time Offer With 86% Off!
                    </div>
                    <div class="col col-lg-2 mx-auto py-2">
                        <img class="img-fluid" src="{{ asset('assets/img/AdImg/AtlasVPN/AtlasRocket.png') }}" alt="..." style="max-width: 175px">
                    </div>
                    <div class="col-12 col-lg-2 py-2">
                        <button type="button" class="btn btn-success mx-auto d-block" style="background-color: rgb(14, 21, 53)">Get Now</button>
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
                        <a href="https://atlasvpn.com/" class="text-decoration-none link-light">Atlas VPN</a>
                    </li>
                </ul>
                <p><a href="" data-bs-toggle="modal" data-bs-target="#modal-terms" class="text-decoration-none link-info">Terms of service</a></p>
                <p class="text-muted small mb-4 mb-lg-0">&copy; Wann.fun 2021. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

{{-- Modal link created --}}
<div class="modal fade" id="modal-linkCreated" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="ModalLinkCreated" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="">
                @csrf
                <div class="modal-header">
                    <h2 class="modal-title text-center" id="ModalLabel">Link created</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    <label for="link">Your link:</label>
                    <div class="input-group p-2">
                        <input id="copyFirst" type="text" class="form-control url-form" name="link" value="{{ session()->get('url') }}">
                        <button
                            class="btn btn-primary custom-font"
                            type="button"
                            data-clipboard-target="#copyFirst"
                        >
                            Copy
                        </button>
                    </div>

                    <label for="link2">Another option:</label>
                    <div class="input-group p-2">
                        <input id="copySecond" type="text" class="form-control url-form" name="link2" value="https://{{ session()->get('url') }}">
                        <button
                            class="btn btn-primary custom-font"
                            type="button"
                            data-clipboard-target="#copySecond"
                        >
                            Copy
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal TOS --}}
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="ModalTerms" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="ModalLabel">Terms of Use</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <div class="modal-footer" style="border: none">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal password reset --}}
<div class="modal fade" id="modal-resetPassword" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="ModalResetPassword" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="/forgot-password">
                @csrf
                <div class="modal-header">
                    <h2 class="modal-title text-center" id="ModalLabel">Reset password</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"  name="email" id="floatingEmail" placeholder="name@example.com">
                                <label for="floatingEmail">Email address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


