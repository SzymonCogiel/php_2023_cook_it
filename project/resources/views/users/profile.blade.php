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


<h2>Nickname </h2>
<br>
<img src="#" alt="User's photo">
<br>
<br>
<br>
<h3>Description:</h3>
<p><b>Points: </b> .....</p>
<p><b>Cooking skill level: </b> ....</p>
<p><b>City: </b> ....</p>
<p><b>Availability to travel: </b> ....</p>
<p><b>Max price to spend: </b> ....</p>
<p><b>Allergies: </b> ....</p>

<br>
<br>
<br>

<h3>Challenge history</h3>
<table>
    <tr><th>Name</th><th>Autor</th><th>Level</th><th>Status</th><th>Time:</th><th>Review</th><th>Photo</th></tr>
    <tr><td>aaa</td><td>aaa</td><td>aaa</td><td>aaa</td><td>aaa</td><td>aaa</td><td>aaa</td></tr>

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
    <tr><td>aaa</td><td>aaa</td><td>aaa</td><td>aaa</td><td>aaa</td><td>aaa</td><td>aaa</td></tr>

    <!--

Komentarz jak wyżej
   -->

</table>
