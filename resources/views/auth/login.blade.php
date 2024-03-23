
{{-- session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate the credentials against your database (pseudo code)
    if ($email == 'valid_email@example.com' && $password == 'valid_password') {
        // Set session variables indicating user is logged in
        $_SESSION['loggedin'] = true;
        // Redirect to the index page after successful login
        header('Location: index.php');
        exit;
    } else {
        // Redirect back to the login page with an error message
        header('Location: index.php?error=invalid_credentials');
        exit;
    }
} --}}




  @extends('Layout.head')
    <body >
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="{{route('login')}}" method="post">
                                            @csrf
                                            <div class="form-floating mb-3">
                                            <input name="email" class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                                @error('email')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                              @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                            <input name="password" class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                                @error('password')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                              @enderror
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('register')}}">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
              @include('Layout.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
