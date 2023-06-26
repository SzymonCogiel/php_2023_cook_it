<?php
use Carbon\Carbon;
?>
<html>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">


<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px" alt=""/> CookIT</h1>
    <a href="/search">Challenge search</a> &emsp;
    <a href="/received">Messages</a> &emsp;
    <a href="/challenge">Add challange</a> &emsp;
    <a href="/profile">My profile</a>
    <a href="/logout">Logout</a>
</div>
<br>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
                    <style>
                        .form-group {
                            margin-bottom: 10px;
                        }

                        label {
                            font-weight: bold;
                        }

                        input[type="text"] {
                            width: 100%;
                            padding: 8px;
                            border-radius: 4px;
                            border: 1px solid #ccc;
                        }
                    </style>

                    <div class="form-group">
                        <label for="Dish">Dish name:</label>
                        <input type="text" id="Dish" name="Dish">
                    </div>

                    <div class="form-group">
                        <label for="Level">Skill level (0 - 10):</label>
                        <input type="text" id="Level" name="Level" value="0">
                    </div>

                    <div class="form-group">
                        <label for="Price">Probably price:</label>
                        <input type="text" id="Price" name="Price" value="0">
                    </div>

                    <div class="form-group">
                        <label for="Ingredients">Ingredients:</label>
                        <input type="text" id="Ingredients" name="Ingredients">
                    </div>

                    <div class="form-group">
                        <label for="Allergens">Allergens:</label>
                        <input type="text" id="Allergens" name="Allergens">
                    </div>

                    <div class="form-group">
                        <label for="Note">Note from you:</label>
                        <input type="text" id="Note" name="Note">
                    </div>

                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>

    <div class="right">
        <br>
        <br>
        <h3>Review challange</h3>
        <form method="POST" action="/sendReview" enctype="multipart/form-data">
            @csrf
            <table>
                <tr><th>Name</th><th>Challanger</th><th>Level</th><th>Status</th><th>Time:</th><th>Review</th><th>Photo</th></tr>
                @foreach ($challangeAuthor as $key => $challenge)
                    <tr>
                        <td>{{ $challenge->Dish }}</td>
                        <td>{{ $challenge->Challenger }}</td>
                        <td>{{ $challenge->Level }}</td>
                        <td>
                            <label for="Status"></label>
                            <input type="text" id="Status" name="Status" value="N"><br><br></td>
                        <td>{{ \Carbon\Carbon::parse($challenge->FinalDate)->diffInDays(\Carbon\Carbon::parse($challenge->StartDate)) }}</td>
                        <td>
                            <label for="Review"></label>
                            <input type="textbox" id="Review" name="Review"><br><br></td>
                        <td>
                            <label for="Photo"></label>
                            <input type="file" name="Photo" id="Photo">
                        </td>
                        <label for="id"></label>
                        <input type="hidden" id="id" name="id" value="{{ $challenge->id }}"><br><br>
                    </tr>
                @endforeach

            </table>
            <br>
            <button type="submit"> Submit review</button>
        </form>
    </div>

</div>
</html>
