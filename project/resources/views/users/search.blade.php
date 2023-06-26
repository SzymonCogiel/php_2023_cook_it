<!DOCTYPE html>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<html>
<head>
    <title>Search</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">

<body>

<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px"/> CookIT</h1>
    <a href="/search">Challenge search</a> &emsp;
    <a href="/received">Messages</a> &emsp;
    <a href="/challenge">Add challange</a> &emsp;
    <a href="/profile">My profile</a>
    <a href="/logout">Logout</a>
</div>
<br>
<hr>

<div class="col-md-6">

    <h3>Find new challenge</h3>
    <p>Click on the submit button to take on new culinary challenges and meet other chefs!</p>

    @if($challenges->isEmpty())
        <p>No challenges found.</p>
    @else
        @foreach($challenges as $key => $challenge)
            <div class="challenge-details {{ $key === 0 ? '' : 'hidden' }}">
                <div class="col-md-4" >
                    <style>
                        .left {
                            font-weight: bold;
                            float: left;
                            clear: left;
                            width: 120px;
                        }

                        .right {
                            float: left;
                            margin-left: 10px;
                        }
                    </style>

                    <p class="left">Author:</p>
                    <p class="right">{{ $challenge->Author }}</p>

                    <p class="left">Dish:</p>
                    <p class="right">{{ $challenge->Dish }}</p>

                    <p class="left">Price:</p>
                    <p class="right">{{ $challenge->Price }}</p>

                    <p class="left">Ingredients:</p>
                    <p class="right">{{ $challenge->Ingredients }}</p>

                    <p class="left">Allergens:</p>
                    <p class="right">{{ $challenge->Allergens }}</p>

                    <p class="left">Level:</p>
                    <p class="right">{{ $challenge->Level }}</p>

{{--                    <p class="left">Note:</p>--}}
{{--                    <p class="right">{{ $challenge->Note }}</p>--}}

{{--                    <p class="left">Challenger:</p>--}}
{{--                    <p class="right">{{ $challenge->Challenger }}</p>--}}

{{--                    <p class="left">Photo:</p>--}}
{{--                    <p class="right">{{ $challenge->Photo }}</p>--}}

{{--                    <p class="left">Status:</p>--}}
{{--                    <p class="right">{{ $challenge->Status }}</p>--}}

{{--                    <p class="left">Review:</p>--}}
{{--                    <p class="right">{{ $challenge->Review }}</p>--}}

{{--                    <p class="left">StartDate:</p>--}}
{{--                    <p class="right">{{ $challenge->StartDate }}</p>--}}

{{--                    <p class="left">FinalDate:</p>--}}
{{--                    <p class="right">{{ $challenge->FinalDate }}</p>--}}
                    <br>
                    <br>
                    <br><br><br>
                    <br>
                    <form method="POST" action="/sendId">
                        @csrf
                        <label for="id"></label><br>
                        <input type="hidden" id="id" name="id" value="{{ $challenge->id }}">
                        <button type="submit">Submit</button>
                    </form>
                    <br>
                </div>
            </div>
        @endforeach

        <div class="navigation-buttons">
            <button onclick="showPreviousChallenge()">Previous</button>
            <button onclick="showNextChallenge()">Next</button>

        </div>
    @endif

    <script>
        var currentChallengeIndex = 0;
        var challengeDetails = document.querySelectorAll('.challenge-details');

        function showChallenge(index) {
            if (index >= 0 && index < challengeDetails.length) {
                challengeDetails.forEach(function (challenge) {
                    challenge.classList.add('hidden');
                });

                challengeDetails[index].classList.remove('hidden');
                currentChallengeIndex = index;
            }
        }

        function showNextChallenge() {
            var nextIndex = currentChallengeIndex + 1;
            showChallenge(nextIndex);
        }

        function showPreviousChallenge() {
            var previousIndex = currentChallengeIndex - 1;
            showChallenge(previousIndex);
        }



    </script>
</div>
</body>
</html>
