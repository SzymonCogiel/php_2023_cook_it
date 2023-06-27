<?php
use Carbon\Carbon;
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">


<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px"/> CookIT</h1>
    <a href="/search">Challenge search</a> &emsp;
    <a href="/received">Messages</a> &emsp;
    <a href="/challenge">Add challange</a> &emsp;
    <a href="/profile">My profile</a> &emsp;
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
            <img class="profile" src="{{ Storage::url($userDetail->photo) }}" width="200" height="200" alt="User's photo">
        </div>
        <div class="right info">
            <h2>Description:</h2>
            <p class="pleft">Points: </p> <p class="pright">{{ $userDetail->points }}</p>
            <p class="pleft">Cooking skill level: </p> <p class="pright">{{ $userDetail->skills }}</p>
            <p class="pleft">City: </p> <p class="pright">{{ $userDetail->city }}</p>
            <p class="pleft">Availability to travel: </p> <p class="pright"> {{ $userDetail->travel }}</p>
            <p class="pleft">Max price to spend:  </p> <p class="pright">{{ $userDetail->cost }}</p>
            <p class="pleft">Allergies:  </p> <p class="pright">{{ $userDetail->alergie }}</p>
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
                <tr><td>{{ $challenge->Dish }}</td><td>{{ $challenge->Author }}</td><td>{{ $challenge->Level }}</td><td>{{ $challenge->Status }}</td><td>{{ \Carbon\Carbon::parse($challenge->FinalDate)->diffInDays(\Carbon\Carbon::parse($challenge->StartDate)) }}</td><td>{{ $challenge->Review }}</td><td><img src="{{ Storage::url($challenge->Photo) }}" alt="Zdjęcie" width="200" height="200"></td></tr>
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
                <tr><td>{{ $challenge->Dish }}</td><td>{{ $challenge->Challenger }}</td><td>{{ $challenge->Level }}</td><td>{{ $challenge->Status }}</td><td>{{ Carbon::parse($challenge->FinalDate)->diffInDays(\Carbon\Carbon::parse($challenge->StartDate)) }}</td><td>{{ $challenge->Review }}</td><td><img src="{{ Storage::url($challenge->Photo) }}" alt="Zdjęcie" width="200" height="200">
                    </td></tr>
            @endforeach
            <!--

Komentarz jak wyżej
   -->

        </table>
    </div>
</div>
