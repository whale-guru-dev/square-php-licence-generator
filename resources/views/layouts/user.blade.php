<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Licence Generator</title>

    <link rel="shortcut icon" href="{{ asset('assets/favicon.jpg') }}" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <style media="screen">
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
        .row-for-cards {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            background-color: rgba(250, 250, 250, 1); /* off-white */
            border-style: solid;
            border-width: 1px;
            border-color: rgba(0, 0, 0, .3);
            border-radius: 4px;
            height: auto;
            margin-top: 3rem;

        }


        .card span {
            font-size: 18px;
            font-weight: 700;
            text-align: center;
        }

        hr {
            height: 1px;
            background-color: rgba(0, 0, 0, .2);
        }

        .card-footer {
            position: relative;
            bottom: 0px;
            margin: 5px;
        }

        .card-header{
            height: 40px;
            padding-top: 20px;
        }

        .navbar {
            min-height: 80px;
            display: flex;
            align-items: center;
        }

        .navbar-brand {
            padding: 0;
            display: flex;
            align-items: center;
        }


        @media (min-width: 768px) {
            #loginModal {
                top: 15%;
            }

            #registerModal {
                top: 15%;
            }

            .modal-sm {
                width: 50%;
            }
        }

    </style>
</head>
<body>

@yield('content')

@if(Auth::user())
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('user.home')}}">
                    <img src="{{ asset('assets/logo.png') }}" style="max-height: 160px; max-width: 100px;" class="img-responsive">
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
@endif


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

@yield('js')
</body>
</html>

