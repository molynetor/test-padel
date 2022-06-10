<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mi-Padel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--for datepicker-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>

    <!--Bootstrap-->
    <script src="{{asset('template/plugins/bootstrap/dist/js/bootstrap.min.js')}}" defer></script>

        <!-- AOS -->
 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!--MDB Bootstrap-->
  <script src="{{asset('template/plugins/mdb/mdb.js')}}" defer></script>
  <link href="{{asset('template/plugins/mdb/mdb.css')}}"rel="stylesheet"></script>

    <!--  Magnific Popup css file  -->
    <link rel="stylesheet" href="{{asset('template/plugins/Magnific-Popup/dist/magnific-popup.css')}}">


    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="{{asset('template/plugins/owl-carousel/css/owl.carousel.min.css')}}">
   

<!--Core JS-->
<script src="{{asset('template/plugins/core/core.js')}}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app1.css') }}" rel="stylesheet">
   
    <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">



    <!--for datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--for datepicker-->


</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" id="home">
    <div id="app">
        <header class="header">
            <!--navbar-->
            <nav class="navbar navbar-expand-sm scrolling-navbar navbar-dark fixed-top" data-aos="fade-down">
                <div class="container">
                   
                    <a class="navbar-brand ms-5" href="{{ url('/') }}">
                    LOGO YSTP              
                    </a>
                  
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                    </button>
               
                    
                    <!-- Cuerpo del menu -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">


                        <!-- Center-->
                        <ul class="navbar-nav mx-auto align-items-center">
                            <li class="nav-item ">

                                <a href="#home" class="nav-link mx-4">Inicio</a>
                            </li>
                            <li class="nav-item">

                                <a href="{{ route('home.blog') }}" class="nav-link mx-4">Noticias</a>
                            </li>
                            <li class="nav-item">

                                <a href="#reservar" class="nav-link mx-4">Reservar</a>
                            </li>
                            <li class="nav-item">

                                <a href="#galeria" class="nav-link mx-4">Galería</a>
                            </li>
                            <li class="nav-item">

                                <a href="#contacto" class="nav-link mx-4">Contacto</a>
                            </li>

                            @if(auth()->check()&& auth()->user()->role->name === 'user' && auth()->user()->role->name ==='admin')
                            <li class="nav-item mx-4">
                                <a class="nav-link" href="{{ route('my.booking') }}">{{ __('Mis Reservas') }}</a>
                            </li>
                            @endif
                            <div class="dropdown dropdown-cart mx-2"> 
                                <a href="#" class="dropdown-toggle lnk-cart"
                                    data-toggle="dropdown" id="mini">
                                    <div class="items-cart-inner align-items-center">
                                        <div class="basket"> <i class="fas fa-shopping-cart text-white"></i></div>
                                        <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                        <div class="total-price-basket"> <span class="lbl">Total:</span>
                                            <span class="value" id="cartSubTotal"></span> </span>
                                            <span class="total-price"> <span class="sign">€</span>
                                        </div>
                                        
                                    </div>
                                </a>
                                <ul class="dropdown-menu p-3">
                                    <li>
                                        <!--   // Mini Cart Start with Ajax -->

                                        <div id="miniCart">

                                        </div>

                                        <!--   // End Mini Cart Start with Ajax -->


                                        <div class="clearfix cart-total">
                                            <div class="pull-right"> <span class="text">Sub Total :</span>
                                                <span class='price' id="cartSubTotal"> </span>€
                                            </div>
                                            <div class="clearfix"></div>
                                            <form action="{{ route('mycart') }}">
                    <button type="submit" class="btn btn-outline-brand">PAGAR</button>
                           </form>
                                            

                                    </li>
                                </ul>
                                <!-- /.dropdown-menu-->
                            </div>

                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item mx-3">
                                <a class="btn btn-brand" href="{{ route('login') }}">Entrar</a>
                            </li>

                            @if (Route::has('register'))
                            <li class="nav-item">
                            <form action="{{ route('register') }}">
                    <button type="submit" class="btn btn-outline-brand">Registrarse</button>
                           </form>
                           
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown ms-0">
                                <a style="color: #fff; font-size:16px; font-weight: bold;" id="navbarDropdown"
                                    class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    @if(!auth()->user()->image)
                                    <img class="img-fluid ms-2 foto mb-1" src="/images/0809-250x250.jpg" 
                                        >
                                    @else
                                    <img class="img-fluid ms-2 foto mb-1" src="/profile/{{auth()->user()->image}}">
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-down ms-5 drop" aria-labelledby="navbarDropdown">

                                    @if(auth()->check()&& auth()->user()->role->name === 'user')
                                    <a href="{{url('perfil')}}" class="dropdown-item"
                                        style="color: #000; font-size:16px; font-weight: bold;">Perfil</a>
                                    @else
                                    <a href="{{url('perfil')}}" class="dropdown-item"
                                        style="color: #000; font-size:16px; font-weight: bold;">Perfil</a>
                                    <a href="{{url('dashboard')}}" class="dropdown-item"
                                        style="color: #000; font-size:16px; font-weight: bold;">Dashboard</a>
                                    @endif
                                    <a style="color: #000; font-size:16px; font-weight: bold;" class="dropdown-item"
                                        href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @if(Session::has('message'))
                <div class="alert alert-success text-end">
                    {{Session::get('message')}}
                </div>
                @endif
                @if(Session::has('errmessage'))
                <div class="alert alert-danger text-end">
                    {{Session::get('errmessage')}}
                </div>
                @endif
            
        </header>
        
        
        <main>
    
            @yield('content')
        </main>

    </div>

  <!--  isotope js library  -->
  <script src="{{asset('template/plugins/isotope/isotope.min.js')}}"></script>

<!--  Magnific popup script file  -->
<script src="{{asset('template/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js')}}"></script>

<!--  Owl-carousel js file  -->
<script src="{{asset('template/plugins/owl.carousel/js/owl.carousel.min.js')}}"></script>


    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
    <script type="text/javascript">
    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.quantity == 0) {

                    $('#mini').hide();

                }
                $('span[id="cartSubTotal"]').text(response.total);
                $('#cartQty').text(response.quantity);
                $('#date').text(response.attributes);

                var miniCart = ""
                $.each(response.carts, function(key, value) {
                    miniCart += `<div class="cart-item product-summary">
                    <div class="row">
                    <div class="col-xs-4">
                    <img src="{{asset('images')}}/${response.pistas[value.conditions-1].image}" class="table-user-thumb pista-mini my-3"></div>
            </div>
            <div class="col-xs-7">
              <h3 class="name">Hora ${value.name}</h3>
              <div class="price">Fecha: ${value.attributes}  </div>
              <div class="price">Pista: ${value.conditions} </div>
              <div class="price">Precio: ${value.price}€ </div>
            </div>
            <div class="col-xs-1 action"> 
            <button type="submit" id="${value.id}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>

          </div>
        </div>
        <!-- /.cart-item -->
        <div class="clearfix"></div>
        <hr>`
                });

                $('#miniCart').html(miniCart);
            }
        })
    }
    miniCart();

    function miniCartRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/product-remove/' + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();
                cart();
                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }
    </script>

    <script type="text/javascript">
    function cart() {
        $.ajax({
            type: 'GET',
            url: '/get-cart-product',
            dataType: 'json',
            success: function(response) {
                if (response.carts.length < 1) {
                    $('#pago').hide();
                    $('#vacio').html(`<p class="fs-bold fs-3 texto mt-3">El Carrito está vacío</p>`);

                }

                var rows = ""
                $.each(response.carts, function(key, value) {
                    rows += `<tr> 
        <td class="col-md-2">
        <img src="{{asset('images')}}/${response.pistas[value.conditions-1].image}" class="table-user-thumb-2 pista" ></div>
        </td>
        <td>
        <div class="price texto2">Pista ${value.conditions} </div>
        </td>
        <td class="col-md-2">
        <div class="product-name texto2">${value.name}</div>
        </td>
        <td>
        <div class="date texto2"> 
            ${value.attributes}           
        </div> 
        </td>
          <td>
          <div class="price texto2">${value.price}€ </div>
          </td>   

        <td class="col-md-1 close-btn">
        <button type="submit" class="" id="${value.id}" onclick="cartRemove(this.id)"><i class="fa fa-trash"></i></button>
        </td>
                </tr>`
                });
                $('#cartPage').html(rows);
            }
        })
    }
    cart();
    ///  Cart remove Start 
    function cartRemove(id) {
        $.ajax({
            type: 'GET',
            url: '/cart-remove/' + id,
            dataType: 'json',
            success: function(data) {
                couponCalculation();
                cart();
                miniCart();
                $('#couponField').show();
                $('#coupon_name').val('');
                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }


    function applyCoupon() {
        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                coupon_name: coupon_name
            },
            url: "{{ url('/coupon-apply') }}",
            success: function(data) {
                couponCalculation();
                if (data.validity == true) {
                    $('#couponField').hide();
                }

                // Mensaje 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }

            }
        })
    }

    function couponCalculation() {
        $.ajax({
            type: 'GET',
            url: "{{ url('/coupon-calculation') }}",
            dataType: 'json',
            success: function(data) {

                if (data.total) {
                    $('#couponCalField').html(
                        `<tr class="bg">
                <th>
                   
                    <div class="cart-grand-total mt-3 bg">
                    <p class="titular fw-bold fs-4">TOTAL a pagar: <span class="inner-left-md  fw-bold fs-3"> ${data.total}€</span></p
                    </div>
                </th>
            </tr>`
                    )
                } else {
                    $('#couponCalField').html(
                        `<tr >
        <th>
            <div class="cart-sub-total">
                Subtotal <span class="inner-left-md">${data.subtotal}€</span>
            </div>
            <div class="cart-sub-total">
                Cupón aplicado <span class="inner-left-md"> ${data.coupon_name}</span>
                <button type="submit" onclick="couponRemove()"><i class="fa fa-trash"></i>  </button>
            </div>
             <div class="cart-sub-total">
                Descuento <span class="inner-left-md"> ${data.discount_amount}€</span>
            </div>
            <div class="cart-grand-total fw-bold ">
               <p class="fw-bold titular fs-4 mb-0">Total a pagar <span class="inner-left-md fw-bold fs-3"> ${data.total_amount}€</span></p>
            </div>
        </th>
            </tr>`
                    )
                }
            }
        });
    }
    couponCalculation();

    function couponRemove() {
        $.ajax({
            type: 'GET',
            url: "{{ url('/coupon-remove') }}",
            dataType: 'json',
            success: function(data) {
                couponCalculation();
                $('#couponField').show();
                $('#coupon_name').val('');
                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }
    </script>

    <script>
    var baseUrl = window.location.href;

    var dateToday = new Date();
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            showButtonPanel: true,
            numberOfMonths: 2,
            minDate: dateToday,
        });
    });
    </script>
      
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
    </script>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}"></script>



    <script>
    $('.form-control').on('input', function() {
        var $field = $(this).closest('.form-group');
        if (this.value) {
            $field.addClass('field--not-empty');
        } else {
            $field.removeClass('field--not-empty');
        }


    });
    </script>
    

    <style type="text/css">
    body {
        background: #fff;
    }

    .ui-corner-all {
        background: red;
        color: #fff;
    }

    label.btn {
        padding: 0;
    }

    label.btn input {
        opacity: 0;
        position: absolute;
    }

    label.btn span {
        text-align: center;
        padding: 6px 12px;
        display: block;
        min-width: 80px;
    }

    label.btn input:checked+span {
        background-color: rgb(80, 110, 228);
        color: #fff;
    }



    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .pista {
        height: 120px;
        width: 150px;
        border-radius: 12%;
    }

    .pista-mini {
        height: 50px;
        width: 50px;
        border-radius: 50%;
    }
    </style>
    <style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
    </style>

</body>

</html>