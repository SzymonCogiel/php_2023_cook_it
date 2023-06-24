

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
<h1>Chat Application</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <h2>Messages</h2>
    <ul>
        @foreach ($messages as $message)
            <li>{{ $message->sender }} to {{ $message->receiver }}: {{ $message->message }}</li>
        @endforeach
    </ul>
</div>

<div>
    <h2>Send Message</h2>
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
