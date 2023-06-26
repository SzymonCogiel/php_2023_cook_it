
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">


<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px"/> CookIT</h1>
</div>



<div class="card">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form method="POST" action="{{ route('phase3') }}">
    @csrf
    <label for="skills">Your cooking skills (0 - 10):</label><br>
    <input type="text" id="skills" name="skills" value="0"><br>
    <p>This will be the level at which you start. After that, the level will be taken into account based on your points.</p>
    <label for="city">City:</label><br>
    <input type="text" id="city" name="city"><br><br>
    <label for="travel">Do you want meet people only from your town (Y/N):</label><br>
    <input type="text" id="travel" name="travel" value="N"><br><br>
    <label for="cost">Maximum price for one meal:</label><br>
    <input type="cost" id="cost" name="cost" value="0"><br><br>
    <label for="alergie">What triggers your allergies:</label><br>
    <input type="text" id="alergie" name="alergie"><br><br>
    <button type="submit"> Submit </button>
</form>
</div>
