
<!DOCTYPE html>
<html>
<head>
    <title>Wiadomości odebrane</title>
</head>
<body>
<h1>Wiadomości odebrane</h1>

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
