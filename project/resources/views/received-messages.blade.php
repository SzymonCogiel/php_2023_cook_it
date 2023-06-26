
<!DOCTYPE html>
<html>
<head>
    <title>Wiadomości odebrane</title>
</head>
<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">


<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px" alt=""/> CookIT</h1>
    <a href="/search">Challenge search</a> &emsp;
    <a href="/received">Messages</a> &emsp;
    <a href="/challenge">Add challange</a> &emsp;
    <a href="#">Update profile</a>
    <a href="/profile">My profile</a> &emsp;
    <a href="/logout">Logout</a>
</div>
<br>
<hr>
<br>
<div class="messbar">
    <a href="/message">New</a> &emsp;
    <a href="/received">Received</a> &emsp;
    <a href="/sended">Send</a> &emsp;
</div>


<h2>Wiadomości odebrane</h2>

@if ($receivedMessages->count() > 0)
    <ul>
        @foreach ($receivedMessages as $message)
            <li>
                <strong>Od:</strong> {{ $message->sender }}
                <br>
                <strong>Treść:</strong> {{ $message->message }}
                <br>
                <strong>Data utworzenia:</strong> {{ $message->created_at }}
            </li>
        @endforeach
    </ul>
@else
    <p>Brak wiadomości.</p>
@endif
</body>
</html>
