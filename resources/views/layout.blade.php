<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield ('title')</title>
    <script src="/JS/pace.js"></script>
    <link rel="stylesheet" href="/CSS/loader.css">

    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/CSS/login.css">
    <div class="top">
        <header class="header">


            @yield ('stylesheets')


            <div class="header-start">
                <div class="logo"><a href="/"><img src="/Resources/favicon.png"></a></div>
            </div>
            <nav class="nav">

                <a href="/">Home</a>
                <a href="/overons">Over ons</a>
                <a href="/advertenties">Advertenties</a>
                <a href="/activiteiten">Activiteiten</a>
                @if (!Auth::check())
                    <a href="/register">Deelnemer worden</a>
                @endif
                <a href="#">Contact</a>
                <a href="/cms">CMS</a>

            </nav>

            <div class="header-end">
                <a class="biggerfont" href="#"><span style="font-size: small">A</span><span
                        style="font-size: large">A</span></a>

                @if (!Auth::check())
                    <a href="/inbox" class="fa fa-bell"></a>
                    <a id="loginButton" href="/login">Inloggen</a>
                @elseif(Auth::check() && count(Auth::user()->bericht1()->where('gelezen','=',0)->get()) > 0)
                    <a href="/inbox"
                       class="fa fa-bell">{{count(Auth::user()->bericht1()->where('gelezen','=',0)->get())}}</a>
                    <a id="logoutButton" href="/logout">Uitloggen</a>
                @else
                    <a href="/inbox" class="fa fa-bell"></a>
                    <a id="logoutButton" href="/logout">Uitloggen</a>
                @endif
            </div>
            <button id="menu">Menu</button>
        </header>
    </div>
</head>

<body>
<div class="container">
    @yield ('content')
</div>
</body>
<footer>
    <div class="footer">

        <script src="/JS/nav.js"></script>
        <Script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        @yield ('footer')
        <div id="innerfooter">
            <div class="contact">
                <p> CONTACT:</p>
                <p> info@email.nl</p>
                <p> +316123456789</p>
            </div>
            <div class="copyright">
                <p> &#169 2020 Niks voor Niks</p>
            </div>
        </div>
    </div>
</footer>
</html>
