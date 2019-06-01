<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/488ad36053.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<div id="app">
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" class="logo img-fluid" alt="Responsive image">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a href="" class="nav-link" data-toggle="modal"
                                   data-target="#modalForm">{{ __('Login/Sign up') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown"><img src="{{ asset('img/avatar.png') }}" class="avatar"
                                                               alt="Responsive image"></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fullname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(Auth::user()->role_id==1)
                                    <a class="dropdown-item" href="{{ route('users') }}" >
                                        {{ __('User Management') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('catalogs') }}" >
                                        {{ __('Catalogs Management') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('products') }}" >
                                        {{ __('Products Management') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('campaigns') }}" >
                                        {{ __('Campaigns Management') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('reports') }}">
                                        {{ __('Reports Management') }}
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!--Navbar -->
        <nav class="menu navbar navbar-expand-lg navbar-dark default-color">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent-333">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Service</a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Service</a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Service</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Dropdown
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <!--/.Navbar -->

        @component('components.login-register')
        @endcomponent
        <!--Carousel Wrapper-->
        <div style="height: 50vh" id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

          <!--Indicators-->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
          </ol>
          <!--/.Indicators-->

          <!--Slides-->
          <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">
              <div class="view" style="background-image: url(&apos;https://mdbootstrap.com/img/Photos/Others/images/77.jpg&apos;); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                  <!-- Content -->
                  <div class="text-center white-text mx-5 wow fadeIn">
                    <h1 class="mb-4">
                      <strong>Learn Bootstrap 4 with MDB</strong>
                    </h1>

                    <p>
                      <strong>Best &amp; free guide of responsive web design</strong>
                    </p>

                    <p class="d-none d-md-block">
                      <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                      available. Create your own, stunning website.</strong>
                    </p>

                  </div>
                  <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

              </div>
            </div>
            <!--/First slide-->

            <!--Second slide-->
            <div class="carousel-item">
              <div class="view" style="background-image: url(&apos;https://mdbootstrap.com/img/Photos/Others/images/47.jpg&apos;); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                  <!-- Content -->
                  <div class="text-center white-text mx-5 wow fadeIn">
                    <h1 class="mb-4">
                      <strong>Learn Bootstrap 4 with MDB</strong>
                    </h1>

                    <p>
                      <strong>Best &amp; free guide of responsive web design</strong>
                    </p>

                    <p class="mb-4 d-none d-md-block">
                      <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                      available. Create your own, stunning website.</strong>
                    </p>
                  </div>
                  <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

              </div>
            </div>
            <!--/Second slide-->

            <!--Third slide-->
            <div class="carousel-item">
              <div class="view" style="background-image: url(&apos;https://mdbootstrap.com/img/Photos/Others/images/79.jpg&apos;); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                  <!-- Content -->
                  <div class="text-center white-text mx-5 wow fadeIn">
                    <h1 class="mb-4">
                      <strong>Learn Bootstrap 4 with MDB</strong>
                    </h1>

                    <p>
                      <strong>Best &amp; free guide of responsive web design</strong>
                    </p>

                    <p class="mb-4 d-none d-md-block">
                      <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                      available. Create your own, stunning website.</strong>
                    </p>

                  </div>
                  <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

              </div>
            </div>
            <!--/Third slide-->

          </div>
          <!--/.Slides-->

          <!--Controls-->
          <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!--/.Controls-->

        </div>
        <!--/.Carousel Wrapper-->
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="page-footer font-small blue-grey lighten-5">

      <div class="default-color">
        <div class="container">

          <!-- Grid row-->
          <div class="row py-4 d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
              <h6 class="mb-0">Get connected with us on social networks!</h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-lg-7 text-center text-md-right">

              <!-- Facebook -->
              <a class="fb-ic">
                <i class="fab fa-facebook-f white-text mr-4"> </i>
              </a>
              <!-- Twitter -->
              <a class="tw-ic">
                <i class="fab fa-twitter white-text mr-4"> </i>
              </a>
              <!-- Google +-->
              <a class="gplus-ic">
                <i class="fab fa-google-plus-g white-text mr-4"> </i>
              </a>
              <!--Linkedin -->
              <a class="li-ic">
                <i class="fab fa-linkedin-in white-text mr-4"> </i>
              </a>
              <!--Instagram-->
              <a class="ins-ic">
                <i class="fab fa-instagram white-text"> </i>
              </a>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row-->

        </div>
      </div>

      <!-- Footer Links -->
      <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3 dark-grey-text">

          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold">Company name</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
              consectetur
              adipisicing elit.</p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Products</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <a class="dark-grey-text" href="#!">MDBootstrap</a>
            </p>
            <p>
              <a class="dark-grey-text" href="#!">MDWordPress</a>
            </p>
            <p>
              <a class="dark-grey-text" href="#!">BrandFlow</a>
            </p>
            <p>
              <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Useful links</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <a class="dark-grey-text" href="#!">Your Account</a>
            </p>
            <p>
              <a class="dark-grey-text" href="#!">Become an Affiliate</a>
            </p>
            <p>
              <a class="dark-grey-text" href="#!">Shipping Rates</a>
            </p>
            <p>
              <a class="dark-grey-text" href="#!">Help</a>
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Contact</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope mr-3"></i> info@example.com</p>
            <p>
              <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p>
              <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>
      <!-- Footer Links -->

      <!-- Copyright -->
      <div class="footer-copyright text-center text-black-50 py-3">© 2018 Copyright:
        <a class="dark-grey-text" href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->
</div>

<!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/mdb.js') }}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $("#formRegister").validate({
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                phone: {
                    required: true,
                    number: true
                }
            },
        });

        $("#formLogin").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                },
            },
        });

        $('#formRegister').submit(function (e) {
            e.preventDefault()
            $('#error-firstname').html('')
            $('#error-lastname').html('')
            $('#error-email').html('')
            $('#error-password').html('')
            $('#error-phone').html('')
            if ($('#formRegister').valid()) {
                console.log('ok register');
                formInputs = $('#formRegister').serialize();
                $.ajax({
                    url: '/register',
                    type: 'POST',
                    data: formInputs,
                    success: function (data) {
                        $('#modalForm').modal("hide")
                        Swal.fire({
                            title: 'Successful',
                            text: data.message,
                            type: 'success',
                        })
                    },
                    error: function (data) {
                        errors = data.responseJSON.errors
                        if (errors.first_name) {
                            $('#error-firstname').html(errors.first_name[0]);
                        }
                        if (errors.last_name) {
                            $('#error-lastname').html(errors.last_name[0]);
                        }
                        if (errors.email) {
                            $('#error-email').html(errors.email[0]);
                        }
                        if (errors.password) {
                            $('#error-password').html(errors.password[0]);
                        }
                        if (errors.phone) {
                            $('#error-phone').html(errors.phone[0]);
                        }
                    }
                });
            } else {
                console.log('error register');
            }


        });

        $('#formLogin').submit(function (e) {
            e.preventDefault()
            $('#error-emailLogin').html('')
            $('#error-passwordLogin').html('')
            $('#activate').html('')
            if ($('#formLogin').valid()) {
                console.log('ok Login')
                formInputs = $('#formLogin').serialize();
                $.ajax({
                    url: '/login',
                    type: 'POST',
                    data: formInputs,
                    success: function (data) {
                        if (data.message) {
                            $('#activate').html(data.message)
                        } else {
                            $('#modalForm').modal("hide")
                            location.reload()
                        }
                    },
                    error: function (data) {
                        errors = data.responseJSON.errors
                        if (errors.email) {
                            $('#error-emailLogin').html(errors.email[0]);
                        }
                        if (errors.password) {
                            $('#error-passwordLogin').html(errors.password[0]);
                        }
                    }
                });
            } else {
                console.log('error Login')
            }
        });
    })
</script>