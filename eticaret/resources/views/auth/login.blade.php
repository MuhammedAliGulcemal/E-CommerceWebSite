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
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group">
                        <span><i class="fa fa-user" aria-hidden="true"></i></span>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="E-mail" />
                    </div>
                    <div class="input-group two-groop">
                        <span><i class="fa fa-key" aria-hidden="true"></i></span>
                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="current-password" placeholder="Şifre" />
                    </div>
                    <div class="form-row bottom">
                        <div class="form-check">
                            <input type="checkbox" id="remenber" name="remenber" value="remenber">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <a href="#url" class="forgot">Şifremi unuttum</a>
                    </div>
                    <x-button class="btn btn-primary btn-block" type="submit">{{ __('Log in') }}</x-button>
                </form>
                <p class="account">Hesabınız yok mu? <a href="{{route("register")}}">Kayıt Ol</a></p>
            </div>
        </div>
        <!-- //main content -->
    </div>
    <!-- //container -->
</div>

</body>

</html>
