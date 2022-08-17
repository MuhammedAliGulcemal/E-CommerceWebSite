<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Giriş Ekranı</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="web/css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <link rel="stylesheet" href="web/css/font-awesome.min.css" type="text/css" media="all">

</head>

<body>
<div class="w3l-signinform">
    <!-- container -->
    <div class="wrapper">
        <!-- main content -->
        <div class="w3l-form-info">
            <div class="w3_info">
                <h1>HOŞGELDİNİZ</h1>
                <h2>Giriş Yap</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group">
                        <span><i class="fa fa-user" aria-hidden="true"></i></span>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="İsim"/>
                    </div>
                    <div class="input-group">
                        <span><i class="fa fa-user" aria-hidden="true"></i></span>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="E-mail" />
                    </div>
                    <div class="input-group">
                        <span><i class="fa fa-key" aria-hidden="true"></i></span>
                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="new-password" placeholder="Şifre" />
                    </div>
                    <div class="input-group">
                        <span><i class="fa fa-key" aria-hidden="true"></i></span>
                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation" required  placeholder="Şifreyi Onaylayın" />
                    </div>
                    <x-button class="btn btn-primary btn-block" type="submit">{{ __('Register') }}</x-button>
                </form>
                <p class="account">Zaten üye misiniz? <a href="#login">Giriş Yap</a></p>
            </div>
        </div>
        <!-- //main content -->
    </div>
    <!-- //container -->
</div>

</body>

</html>
