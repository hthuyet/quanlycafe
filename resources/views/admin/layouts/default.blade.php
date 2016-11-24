<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>
            @section('title')
            | Josh Admin Template
            @show
        </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- global css -->

        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/my.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('assets/plugins/ladda/ladda-themeless.min.css') }}">
        <!-- font Awesome -->


        <!-- end of global css -->
        <!--page level css-->
        @yield('header_styles')
        <!--end of page level css-->

        <style type="text/css">
            body{
                padding-right: 0px !important;
            }
        </style>

    <body class="skin-josh">
        <script type="text/javascript">
            var a = ['', 'một ', 'hai ', 'ba ', 'bốn ', 'năm ', 'sáu ', 'bảy ', 'tám ', 'chín ', 'mười ', 'mười một ', 'mười hai ', 'mười ba ', 'mười bốn ', 'mười lăm ', 'mười sáu ', 'mười bẩy ', 'mười tám ', 'mười chín '];
            var b = ['', '', 'hai mươi', 'ba mươi', 'bốn mươi', 'năm mươi', 'sáu mươi', 'bẩy mươi', 'tám mươi', 'chín mươi'];
            function inWords(num) {
                if ((num = num.toString()).length > 9)
                    return 'overflow';
                n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
                if (!n)
                    return;
                var str = '';
                str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
                str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
                str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'nghìn ' : '';
                str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'trăm ' : '';
                str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
                return str;
            }

            console.log(inWords(5000.00));





            var ONE_TO_NINETEEN = [
                "one", "two", "three", "four", "five",
                "six", "seven", "eight", "nine", "ten",
                "eleven", "twelve", "thirteen", "fourteen", "fifteen",
                "sixteen", "seventeen", "eighteen", "nineteen"
            ];

            var TENS = [
                "ten", "twenty", "thirty", "forty", "fifty",
                "sixty", "seventy", "eighty", "ninety"
            ];

            var SCALES = ["thousand", "million", "billion", "trillion"];

            // helper function for use with Array.filter
            function isTruthy(item) {
                return !!item;
            }

            // convert a number into "chunks" of 0-999
            function chunk(number) {
                var thousands = [];

                while (number > 0) {
                    thousands.push(number % 1000);
                    number = Math.floor(number / 1000);
                }

                return thousands;
            }

            // translate a number from 1-999 into English
            function inEnglish(number) {
                var thousands, hundreds, tens, ones, words = [];

                if (number < 20) {
                    return ONE_TO_NINETEEN[number - 1]; // may be undefined
                }

                if (number < 100) {
                    ones = number % 10;
                    tens = number / 10 | 0; // equivalent to Math.floor(number / 10)

                    words.push(TENS[tens - 1]);
                    words.push(inEnglish(ones));

                    return words.filter(isTruthy).join("-");
                }

                thousands = number / 1000 | 0;
                if (thousands > 0) {
                    words.push(inEnglish(thousands));
                    words.push("thousands");
                    words.push(inEnglish(number - (thousands * 1000)));
                }

                hundreds = number / 100 | 0;
                if (hundreds > 0) {
                    words.push(inEnglish(hundreds));
                    words.push("hundred");
                    words.push(inEnglish(number % 100));
                }

                return words.filter(isTruthy).join(" ");
            }

            // append the word for a scale. Made for use with Array.map
            function appendScale(chunk, exp) {
                var scale;
                if (!chunk) {
                    return null;
                }
                scale = SCALES[exp - 1];
                return [chunk, scale].filter(isTruthy).join(" ");
            }

            console.log(inEnglish(5652));


            Number.prototype.format = function (n, x, s, c) {
                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                        num = this.toFixed(Math.max(0, ~~n));
                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
            };</script>
        <header class="header">
            <a href="{{ route('dashboard') }}" class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <div>
                    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                        <div class="responsive_nav"></div>
                    </a>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        @include('admin.layouts._messages')
                        @include('admin.layouts._notifications')
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if(Sentinel::getUser()->pic)
                                <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img"
                                     class="img-circle img-responsive pull-left" height="35px" width="35px"/>
                                @else
                                <img src="{!! asset('assets/img/authors/avatar3.jpg') !!} " width="35"
                                     class="img-circle img-responsive pull-left" height="35" alt="riot">
                                @endif
                                <div class="riot">
                                    <div>
                                        {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                                        <span>
                                            <i class="caret"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    @if(Sentinel::getUser()->pic)
                                    <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img"
                                         class="img-circle img-bor"/>
                                    @else
                                    <img src="{!! asset('assets/img/authors/avatar3.jpg') !!}"
                                         class="img-responsive img-circle" alt="User Image">
                                    @endif
                                    <p class="topprofiletext">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
                                </li>
                                <!-- Menu Body -->
                                <li>
                                    <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                                        <i class="livicon" data-name="user" data-s="18"></i>
                                        My Profile
                                    </a>
                                </li>
                                <li role="presentation"></li>
                                <li>
                                    <a href="{{ route('admin.users.edit', Sentinel::getUser()->id) }}">
                                        <i class="livicon" data-name="gears" data-s="18"></i>
                                        Account Settings
                                    </a>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ URL::to('admin/lockscreen') }}">
                                            <i class="livicon" data-name="lock" data-s="18"></i>
                                            Lock
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ URL::to('admin/logout') }}">
                                            <i class="livicon" data-name="sign-out" data-s="18"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar ">
                    <div class="page-sidebar  sidebar-nav">
                        <div class="nav_icons">
                            <ul class="sidebar_threeicons">
                                <li>
                                    <a href="{{ URL::to('admin/form_builder') }}">
                                        <i class="livicon" data-name="hammer" title="Form Builder 1" data-loop="true"
                                           data-color="#42aaca" data-hc="#42aaca" data-s="25"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/form_builder2') }}">
                                        <i class="livicon" data-name="list-ul" title="Form Builder 2" data-loop="true"
                                           data-color="#e9573f" data-hc="#e9573f" data-s="25"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/form_builder2') }}">
                                        <i class="livicon" data-name="vector-square" title="Button Builder" data-loop="true"
                                           data-color="#f6bb42" data-hc="#f6bb42" data-s="25"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/gridmanager') }}">
                                        <i class="livicon" data-name="new-window" title="Form Builder 1" data-loop="true"
                                           data-color="#37bc9b" data-hc="#37bc9b" data-s="25"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <!-- BEGIN SIDEBAR MENU -->
                        @include('admin.layouts._left_menu')
                        <!-- END SIDEBAR MENU -->
                    </div>
                </section>
            </aside>
            <aside class="right-side">

                <!-- Notifications -->
                @include('notifications')

                <!-- Content -->
                @yield('content')

            </aside>
            <!-- right-side -->
        </div>
        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top"
           data-toggle="tooltip" data-placement="left">
            <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
        </a>
        <!-- global js -->
        <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/ladda/spin.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/ladda/ladda.min.js') }}" type="text/javascript"></script>


        <!-- end of global js -->
        <!-- begin page level js -->
        @yield('footer_scripts')
        <!-- end page level js -->
    </body>
</html>
