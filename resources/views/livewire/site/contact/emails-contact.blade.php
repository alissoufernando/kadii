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
<h1 class="text-center">Centrale du mobile</h1>
<div>
    <span>$- Informations -$</span>
    <p>Nom: {{$name}}</p>
    <p>Telephone: {{$phone}}</p>
</div>
<div>
    Message: <br>
    <pre>
        {{$comment}}
    </pre>
</div>
</body>
</html>

