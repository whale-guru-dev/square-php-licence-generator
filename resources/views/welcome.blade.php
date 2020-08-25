<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Licence Generator</title>

    <link rel="shortcut icon" href="{{ asset('assets/favicon.jpg') }}"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <style>
        section {
            padding: 80px;
        }

        #first {
            background: rgba(240, 240, 240, 0);
            min-height: 50px;
        }

        #first h1 {
            font-size: 55px;
            font-weight: bold;
            font-family: Muli Black, sans-serif;
        }

        #first img {
            opacity: 1;
            border-radius: 0px;
            border: 0px none rgb(0, 0, 0);
            box-shadow: rgb(0, 0, 0) 0px 0px 0px 0px;
            width: 448px;
            margin: auto;
        }

        #first .signup-btn {
            height: 64px;
            width: 261px;
            border-radius: 0px;
            cursor: pointer;
            border: 1px none rgba(255, 0, 0, 0.996);
            background: rgba(7, 195, 249, 0.996);
            box-shadow: rgb(166, 218, 255) 0px 0px 0px 0px;
            padding: 18px !important;
            font-family: "Muli Black", sans-serif;
            font-size: 20px;
            text-align: center;
            font-weight: 700;
            font-style: initial;
            color: rgba(248, 248, 248, 0.996);
            text-decoration: none;
        }

        #second {
            border-radius: 0px;
            background: rgba(13, 13, 13, 0.996);
            min-height: 200px;
            border: 0px none rgb(0, 0, 0);
        }

        #second h1 {
            color: rgb(255, 255, 255);
            -webkit-text-fill-color: rgb(255, 255, 255);
            font-size: 45px;
            font-weight: bold;
        }

        #second .video-player {
            padding-top: 100px;
        }

        #third {
            border-radius: 0px;
            background: rgba(6, 81, 173, 0.996);
            height: 835px;
            min-height: 50px;
            border: 0px none rgba(3, 150, 255, 0.996);

            display: flex;
            align-items: center;
        }

        #third h1 {
            font-family: "Muli Black", sans-serif;
            font-size: 80px;
            font-weight: bold;
            display: block;
            line-height: 1.1em;
            color: rgb(255, 255, 255);
            -webkit-text-fill-color: rgb(255, 255, 255);
        }

        .blue-text {
            color: rgb(7, 195, 249);
            -webkit-text-fill-color: rgb(7, 195, 249);
        }

        .purple-text {
            color: rgb(6, 81, 173);
            -webkit-text-fill-color: rgb(6, 81, 173);
        }

        #forth {
            border-radius: 0px;
            background: rgba(13, 13, 13, 0.996);
            height: 380px;
            min-height: 200px;
            border: 0px none rgb(0, 0, 0);

        }

        #forth h1 {
            color: rgb(255, 255, 255);
            -webkit-text-fill-color: rgb(255, 255, 255);
            font-size: 45px;
            font-weight: bold;
        }

        #forth .signup-btn {
            height: 64px;
            width: 261px;
            border-radius: 0px;
            cursor: pointer;
            border: 1px none rgba(255, 0, 0, 0.996);
            background: #0056b3;
            box-shadow: rgb(166, 218, 255) 0px 0px 0px 0px;
            padding: 18px !important;
            font-family: "Muli Black", sans-serif;
            font-size: 20px;
            text-align: center;
            font-weight: 700;
            font-style: initial;
            color: rgba(248, 248, 248, 0.996);
            text-decoration: none;
            margin-top: 40px;
        }

        #fifth {
            border-radius: 0px;
            background: rgba(27, 37, 49, 0.996);
            height: 1155px;
            min-height: 200px;
            border: 0px none rgb(0, 0, 0);
        }

        #fifth .faq {
            font-family: Lato, sans-serif;
            font-size: 45px;
        }

        #fifth .faq-header {
            left: 13.5px;
            padding: 15px;
            margin: 0px auto;
            top: 37.125px;
            transform: rotate(0deg) scale(1);
            z-index: auto;
            max-width: 500px;

            color: white;
        }

        #fifth .faq-header-hr-section {
            width: 134px;
            z-index: auto;
            max-width: 500px;
            transform: rotate(0deg) scale(1);
            left: 12px;
            top: 155.313px;
        }

        #fifth .faq-header-hr {
            border-radius: 0px;
            border-top: none;
            border-bottom: 4px solid rgba(7, 195, 249, 0.996);
            box-shadow: blue 0px 0px 0px 0px;
        }

        #fifth .faq-title {
            left: 19.5px;
            padding: 15px;
            margin: 0px auto;
            top: 1.125px;
            transform: rotate(0deg) scale(1);
            z-index: auto;
            max-width: 500px;
        }

        #fifth .faq-text {
            width: 523px;
            left: 19.5px;
            padding: 15px;
            margin: 0px auto;
            top: 68.125px;
            transform: rotate(0deg) scale(1);
            z-index: auto;
            max-width: 500px;
        }

        #fifth p {
            color: white;
        }

        #fifth .faq-each-section {
            padding-top: 40px;
        }

        #footer {
            border-radius: 0px;
            background: rgba(6, 6, 6, 0.996);
            height: 200px;
            min-height: 50px;
            border: 0px none rgb(0, 0, 0);
        }

        #footer p {
            color: white;
        }

        #footer .footer-contact-info_title {
            font-weight: bold;
            font-size: 15px;
        }

        #footer .footer-contact-info_content {
            font-size: 13px;
        }
    </style>
</head>
<body>


<section id="first">
    <div class="container-fluid">
        <div class="row text-center">
            <h1 class="text-uppercase">never miss another client again</h1>

            <span><img src="{{ asset('assets/logo.png') }}" class="img-responsive"/></span>

            <h3><strong>Try FREE - No Credit Card Required</strong></h3>

            <a href="{{route('register')}}" class="btn signup-btn text-uppercase">try free download</a>
        </div>
    </div>
</section>

<section id="second">
    <div class="container-fluid">
        <div class="row text-center">
            <h1 class="text-uppercase"><span class="blue-text">WISH CLIENTS WOULD CALL</span>, INSTEAD OF REPLYING IN
                ZILLOW?</h1>
            <h1 class="text-uppercase"><span class="blue-text">THE ZILLOW AR WILL AUTO REPLY TO ALL MESSAGES</span> &
                TELL THEM TO CALL or TEXT YOU</h1>

            <div class="col-md-12 video-player">
                <iframe data-v-48ec9261="" width="871px" height="367px"
                        src="https://www.youtube.com/embed/mX-Kui9RUJE?&start=0&end=0" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen="allowfullscreen" class=" video embed-responsive-item"
                        style="border-radius: 0px; border: 0px none rgb(0, 0, 0);"></iframe>
            </div>
        </div>
    </div>
</section>

<section id="third">
    <div class="container-fluid">
        <div class="row text-center">
            <h1 class="text-uppercase">THE ZILLOW AR HAS ONE JOB!
                <span class="blue-text">MAKE REALTORS</span> "<span class="blue-text">MORE MONEY</span>"</h1>
        </div>
    </div>
</section>

<section id="forth">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="">
                <h1 class="text-uppercase"><span class="purple-text">try free</span> - no credit card required</h1>
                <a href="{{route('register')}}" class="btn signup-btn text-uppercase">try free download</a>
            </div>
        </div>
    </div>
</section>

<section id="fifth">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 faq-header">
                <h1 class="faq">Frequently asked questions</h1>
                <div class="faq-header-hr-section">
                    <hr class="faq-header-hr"/>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row faq-each-section">
                    <p class="faq-title blue-text">Can I download & use it on my phone?</p> <br/>
                    <p class="faq-text">No, the zillow auto responder only works on Desktops or Laptops - Using Windows
                        7-10, 11.</p>
                </div>

                <div class="row faq-each-section">
                    <p class="faq-title blue-text">How much is it after the trial?</p>
                    <p class="faq-text">After the 7 day trial is over, you will be promted to make a payment. You will
                        have 2 choices. Pay as you go, Monthly $19.99 Or get 50% off and pay $119.99 for a year.</p>
                </div>

                <div class="row faq-each-section">
                    <p class="faq-title blue-text">Does the Z.W.A.R check my messages all day?</p>
                    <p class="faq-text">Yes if you want, you can leave it running all day. Every 30 minutes, it will
                        check your Zillow inbox for new messages.</p>
                </div>

                <div class="row faq-each-section">
                    <p class="faq-title blue-text">Can I only use it in the morning to reply to overnight messages &
                        then stop it?</p>
                    <p class="faq-text">Yes, if you choose to use it only in the mornings when you start work, then you
                        would open app -> Press start -> Allow it to reply to all new unread messages -> Then press stop
                        and close the app for the day. </p>
                </div>

                <div class="row faq-each-section">
                    <p class="faq-title blue-text">Can I set it to exclude & not send message to certain
                        leads/clients?</p>
                    <p class="faq-text">Yes, the Z.W.A.R allows up to 5 keywords. Example, if you do not want anyone
                        with pets, you might choose key words, Cats, Dogs, Pets. In this case if anyone messages you and
                        states the word cat, or dog, then you they will not be sent a message,</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3 footer-contact-info">
                <p class="text-uppercase blue-text footer-contact-info_title">contact info</p>

                <p class="footer-contact-info_content">26, Lane Street New York, USA</p>

                <p class="footer-contact-info_content">9AM - 7PM Mon - Sat</p>
            </div>
        </div>
    </div>
</section>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

@yield('js')
</body>
</html>

