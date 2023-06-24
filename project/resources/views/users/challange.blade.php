
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


<h2>Add challange for your friends!</h2>

<h3>Add new challange:</h3>
<form method="POST" action="{{ route('challenge') }}">
    <label for="dish">Dish name:</label><br>
    <input type="text" id="dish" name="dish"><br>
    <label for="skills">Skill level(0 - 10):</label><br>
    <input type="text" id="skills" name="skills" value="0"><br>
    <label for="price">Probably price:</label><br>
    <input type="text" id="price" name="price" value="0"><br><br>
    <label for="ingredients">Ingredients:</label><br>
    <input type="text" id="alergie" name="alergie"><br><br>
    <label for="alergens">Allergens:</label><br>
    <input type="text" id="alergens" name="alergens"><br><br>
    <label for="note">Note from you:</label><br>
    <input type="textbox" id="note" name="note"><br><br>
    <input type="submit" value="Submit_add">
</form>

<br>
<br>

<h3>Review challange</h3>
<form>
<table>
    <tr><th>Name</th><th>Challanger</th><th>Level</th><th>Status</th><th>Time:</th><th>Review</th><th>Photo</th></tr>
    <tr><td>aaa</td><td>aaa</td><td>aaa</td><td><input type="text" id="accept" name="accept" value="N"><br><br></td><td>aaa</td><td><input type="textbox" id="review" name="review"><br><br></td><td>aaa</td></tr>

    <!--
Uwaga na formularze, które updatują rekordy w bazie!!!!
   -->

</table>
<input type="submit" value="Submit_review">
</form>
