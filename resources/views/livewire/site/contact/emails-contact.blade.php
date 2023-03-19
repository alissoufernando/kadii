<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">

        .text-center{
        text-align: center
        }
      </style>
</head>
<body>
<h1 class="text-center">Mobiles Zentrum</h1>
<div>
    <span>$- Informations -$</span>
    <p>Name: {{$name}}</p>
    <p>Telefon: {{$phone}}</p>
</div>
<div>
    Nachricht: <br>
    <pre>
        {{$comment}}
    </pre>
</div>
</body>
</html>

