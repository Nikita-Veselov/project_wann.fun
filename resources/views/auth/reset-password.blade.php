<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Nikita-Veselov" />
        <meta name="description" content="Generate short link ideal for Dating and Nutra ad verticals. Create your own topical custom short link for your profitable ad campaign." />
        <meta name="keywords" content="url shortener, custom short url, link short, generate short link, dating offers, nutra offers" />
        
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <title>Password Reset | Wann.fun</title>

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet" type="text/css" >
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    
    </head>
    <body>
        @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif
        <div class="container">
            <div class="row vh-100 justify-content-center align-items-center">
                <div class="col-6">
                    <form method="post" action="/reset-password" >
                        @csrf
                        <div class="fs-2">Reset Password</div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirmation" placeholder="Password">
                            <label for="floatingPasswordConfirmation">Password confirmation</label>
                        </div>
                            <input type="hidden" name="token" value="{{ $token }}">
                            <a href="/"><button type="button" class="btn btn-secondary">Cancel</button></a>
                            <button type="submit" class="btn btn-primary">Reset</button>  
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>