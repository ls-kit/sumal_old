<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/authenticate')}}" method="get">
        <h3>Our Sapp</h3>
        <input type="text" name="shop" id="" placeholder="site.myshop.com" required>
        <button type="submit">Login</button>

    </form>
</body>
</html>