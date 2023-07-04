
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row d-flex justify-content-center vh-100 align-items-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-0 mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">

                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <!-- Name -->
                                                    <div class="form-floating">
                                                        <input class="form-control shadow-none rounded-0" name="name" id="name" type="text" placeholder="Enter your name" />
                                                        <label for="name">Full Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Email Address -->
                                            <div class="form-floating mb-3">
                                                <input class="form-control shadow-none rounded-0" name="email" id="email" type="email" placeholder="name@example.com" />
                                                <label for="email">Email address</label>
                                            </div>
                                            <!-- Password -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control shadow-none rounded-0" name="password" id="password" type="password" placeholder="Create a password" />
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <!-- Confirm Password -->
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control shadow-none rounded-0" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm password" />
                                                        <label for="password_confirmation">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary  shadow-none rounded-0">Create Account</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('login')}}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/js/scripts.js"></script>
    </body>
</html>
