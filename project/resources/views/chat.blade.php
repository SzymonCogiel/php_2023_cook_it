<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">


<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px" alt=""/> CookIT</h1>
    <a href="/search">Challenge search</a> &emsp;
    <a href="/received">Messages</a> &emsp;
    <a href="/challenge">Add challange</a> &emsp;
    <a href="#">Update profile</a> &emsp;
    <a href="/logout">Logout</a>
</div>
<br>
<hr>
<br>
<div class="messbar">
    <a href="/message">New</a> &emsp;
    <a href="/received">Received</a> &emsp;
    <a href="/send">Send</a> &emsp;
</div>


<html>
@if($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
@endif
<head>
    <title>Chat Application</title>
</head>
<body>
<h2>Chat Application</h2>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <h3>Messages</h3>
    <ul>
        @foreach ($messages as $message)
            <li>{{ $message->sender }} to {{ $message->receiver }}: {{ $message->message }}</li>
        @endforeach
    </ul>
</div>

<div class="card">
    <div class="card-header"><h2>Send Message</h2></div>
    <form method="POST" action="/send">
        @csrf


        <label for="receiver">Receiver:</label>
        <input type="text" name="receiver" id="receiver" required><br>

        <label for="message">Message:</label>
        <input type="text" name="message" id="message" required><br>

        <button type="submit">Send</button>
    </form>
</div>


{{--<h2>Wiadomości odebrane</h2>--}}

{{--@if ($receivedMessages->count() > 0)--}}
{{--    <ul>--}}
{{--        @foreach ($receivedMessages as $message)--}}
{{--            <li>--}}
{{--                <strong>Od:</strong> {{ $message->sender }}--}}
{{--                <br>--}}
{{--                <strong>Treść:</strong> {{ $message->message }}--}}
{{--                <br>--}}
{{--                <strong>Data utworzenia:</strong> {{ $message->created_at }}--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--@else--}}
{{--    <p>Brak wiadomości.</p>--}}
{{--@endif--}}

</body>
</html>
