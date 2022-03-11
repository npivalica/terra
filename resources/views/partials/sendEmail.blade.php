<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>Sent from: {{ $details['email'] }}</h3>
    <h3>User's rating: <span style="color: red;">{{ $details['rating'] }}</span></h3>
    <p style="font-size: 1.17em"><span style="font-weight: bold">User's content:</span><br>
    {{ $details['content'] }}</p>
</body>
</html>
