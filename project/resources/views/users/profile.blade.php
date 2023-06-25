<!-- Navbar finalnie może być sztywny dołączany ten sam do każdego pliku user przy odpalaniu wszystkiego-->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">


<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px"/> CookIT</h1>
    <a href="/search">Challenge search</a> &emsp;
    <a href="/received">Messages</a> &emsp;
    <a href="/challenge">Add challange</a> &emsp;
    <a href="#">Update profile</a> &emsp;
    <a href="/logout">Logout</a>
</div>
<br>
<hr>

<br>
<br>
<br>


<div class="content">
<div class="up">
<div class="left">
<h2 id="Profile-name">{{ $users->username }}</h2>
<br>
<img src="#" alt="User's photo">
</div>
<div class="right">
<h2>Description:</h2>
<p><b>Points: </b> {{ $userDetail->points }}</p>
<p><b>Cooking skill level: </b> {{ $userDetail->skills }}</p>
<p><b>City: </b>{{ $userDetail->city }}</p>
<p><b>Availability to travel: </b> {{ $userDetail->travel }}</p>
<p><b>Max price to spend: </b> {{ $userDetail->cost }}</p>
<p><b>Allergies: </b>{{ $userDetail->alergie }}</p>
</div>
</div>
<br>
<br>
<br>
<div class="down">
<h3>Challenge history</h3>
<table>
    <tr><th>Name</th><th>Autor</th><th>Level</th><th>Status</th><th>Time:</th><th>Review</th><th>Photo</th></tr>
    @foreach ($challangeHistory as $key => $challenge)
    <tr><td>{{ $challenge->Dish }}</td><td>{{ $challenge->Author }}</td><td>{{ $challenge->Level }}</td><td>{{ $challenge->Status }}</td><td>{{ $challenge->FinalDate - $challenge->StartDate }}</td><td>{{ $challenge->Review }}</td><td>{{ $challenge->Photo }}</td></tr>
    @endforeach
    <!--CSS: wiersze kolejnych wyzwań będą miały background kolor zależny od statusu:
     - zielony: po akceptacji autora
     - czerwony: negatywna opinia autora
     - żółty: w trakcie realizacji

     Można zaszaleć, że jak w nie klikniesz to masz jakiś popup z detalami na temat zamówienia a autor to link do profilu autora

      Time: w zależności od tego czy zadanie jest już zakończone pokazuje albo zegarek odliczający czas albo czas final- czas przyjęcia-->

</table>

<br>
<br>

<h3>Author's challenges</h3>
<table>
    <tr><th>Name</th><th>Challanger</th><th>Level</th><th>Status</th><th>Time:</th><th>Review</th><th>Photo</th></tr>
    @foreach ($challangeAuthor as $key => $challenge)
        <tr><td>{{ $challenge->Dish }}</td><td>{{ $challenge->Challenger }}</td><td>{{ $challenge->Level }}</td><td>{{ $challenge->Status }}</td><td>{{ $challenge->FinalDate - $challenge->StartDate }}</td><td>{{ $challenge->Review }}</td><td>{{ $challenge->Photo }}</td></tr>
    @endforeach
    <!--

Komentarz jak wyżej
   -->

</table>
</div>
</div>
