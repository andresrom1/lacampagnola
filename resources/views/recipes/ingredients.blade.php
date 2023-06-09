<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h3 style="width: 130px; height: 53px; margin: 10px auto 50px auto; display: block;"><img src="https://dev-lacampagnola.avatarla.xyz/assets/images/logo-la-campagnola.png" style="width: 100%; height: auto; display: block;"></h3>
    
    <h1 style="text-align:center; font-family: Arial, sans-serif !important; font-weight: bold; font-style: normal; text-transform: uppercase; font-size: 22px; color: #bf0724;">{{ $recipe->title }}</h1>

    <div style="width: 480px; margin: 0 auto 40px auto; text-align: center; display: block;">
        <span style="background: #ececec; width: 140px; height: 2px; display: inline-block;"></span>
        <h2 style="width: 200px; height: 25px; font-size: 18px; color: #bf0724; letter-spacing: 1px; font-family: Arial, sans-serif !important; font-weight: bold; font-style: normal; text-transform: uppercase; display: inline-block;">Ingredientes</h2>
        <span style="background: #ececec; width: 140px; height: 2px; display: inline-block;"></span>
    </div>

    <div style="padding: 0 0 0 0; margin-bottom: 20px; text-transform: none; font-family: Arial, sans-serif !important; font-size: 15px; line-height: 2; font-weight: 300; color: #888888; clear: both;" class="ingredients-content">
        {!! $recipe->ingredients !!}
    </div>
</body>
</html>
