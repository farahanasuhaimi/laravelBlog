<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ABOUT US</h1>
    <h3>{{ $name }} is located at {{ $place }}</h3>
    <h2>{{ $name }} is selling:</h2>
    <ul>
        @foreach ($products as $item)
        <li>{{ $item }}</li>   
        @endforeach
    </ul>
    <a href="/">HOME</a>
    
    <p>The current date is {{ date('d-M-Y') }}</p>
</body>
</html>