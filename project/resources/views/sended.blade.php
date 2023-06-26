<html>




<head>
    <title>Chat Application</title>
</head>
<body>

link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">


<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px" alt=""/> CookIT</h1>
    <a href="/search">Challenge search</a> &emsp;
    <a href="/received">Messages</a> &emsp;
    <a href="/challenge">Add challange</a> &emsp;
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



<h2>Chat Application</h2>

<div>
    <h3>Messages</h3>
    <ul>
        @foreach ($messages as $message)
            <li>{{ $message->sender }} to {{ $message->receiver }}: {{ $message->message }}</li>
        @endforeach
    </ul>
</div>

</body>
</html>
