<html>




<head>
    <title>Chat Application</title>
</head>
<body>
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
