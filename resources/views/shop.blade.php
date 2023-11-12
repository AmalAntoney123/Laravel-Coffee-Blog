<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @auth
    <h1>Logged in</h1>
    <form action="/logout" method="post">
        @csrf
        <br><br><button type="submit" style="color:white;">Logout</button>
    </form>
    @else
    <h1>Invalid login</h1>
    @endauth
</body>

</html>