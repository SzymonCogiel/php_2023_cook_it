<html>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

<div class="up">
<div class="left">
    <div class="card">
<h2>Add challange for your friends!</h2>
<div>
<h3>Add new challange:</h3>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="/sendChallange">
        @csrf
        <label for="Dish">Dish name:</label><br>
        <input type="text" id="Dish" name="Dish"><br>
        <label for="Level">Skill level(0 - 10):</label><br>
        <input type="text" id="Level" name="Level" value="0"><br>
        <label for="Price">Probably price:</label><br>
        <input type="text" id="Price" name="Price" value="0"><br><br>
        <label for="Ingredients">Ingredients:</label><br>
        <input type="text" id="Ingredients" name="Ingredients"><br><br>
        <label for="Allergens">Allergens:</label><br>
        <input type="text" id="Allergens" name="Allergens"><br><br>
        <label for="Note">Note from you:</label><br>
        <input type="text" id="Note" name="Note"><br><br>

         <button type="submit">Send</button>
    </form>
</div>
</div>
</div>

<div class="right">
    <br>
    <br>
<h3>Review challange</h3>
<form>
@csrf
<table>
<tr><th>Name</th><th>Challanger</th><th>Level</th><th>Status</th><th>Time:</th><th>Review</th><th>Photo</th></tr>
<tr><td>aaa</td><td>aaa</td><td>aaa</td><td><input type="text" id="accept" name="accept" value="N"><br><br></td><td>aaa</td><td><input type="textbox" id="review" name="review"><br><br></td><td><div class="form-group">
            {{ Form::file('image',array('class' => 'form-control')) }}
        </div></td></tr>

 <!--
Uwaga na formularze, które updatują rekordy w bazie!!!! Dodać add photo do kolumny jeszcze!!!!!
-->

</table>
    <br>
    <button type="submit"> Submit review</button>
</form>
</div>

</div>
</html>
