<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoş Geldin</title>
</head>
<body>

<p>
    Merhaba {{ $user->name }},
    <br>
    Hoş geldiniz.
</p>


<p>
    Aşağıdaki mailimi doğrula butonuna tıklayarak mailinizi doğrulayabilirsiniz.
</p>

<hr>

<center><a href="{{ route('verify', ['token' => $token]) }}">Mailimi Doğrula</a></center>

</body>
</html>
