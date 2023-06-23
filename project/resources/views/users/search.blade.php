<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<div class="col-md-6">
    <h3>Find new challenge</h3>
    <p>Click on the challenge to take on new culinary challenges and meet other chefs!</p>

    @if($challenges->isEmpty())
        <p>No challenges found.</p>
    @else
        @foreach($challenges as $key => $challenge)
            <div class="challenge-details {{ $key === 0 ? '' : 'hidden' }}">
                <div class="col-md-4">
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
                    <p class="left">Note:</p>
                    <p class="right">{{ $challenge->Note }}</p>
                    <p class="left">Challenger:</p>
                    <p class="right">{{ $challenge->Challenger }}</p>
                    <p class="left">Photo:</p>
                    <p class="right">{{ $challenge->Photo }}</p>
                    <p class="left">Status:</p>
                    <p class="right">{{ $challenge->Status }}</p>
                    <p class="left">Review:</p>
                    <p class="right">{{ $challenge->Review }}</p>
                    <p class="left">StartDate:</p>
                    <p class="right">{{ $challenge->StartDate}}</p>
                    <p class="left">FinalDate:</p>
                    <p class="right">{{ $challenge->FinalDate}}</p>
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
