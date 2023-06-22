<div class="col-md-6">
    <h3>Find new challange</h3>
    <p>Click on the challenge to take on new culinary challenges and meet other chefs!</p>


    <?php $count=1; ?>


    @foreach($searched_challange as $challange)



        @if(!empty($challange->details) && $challange->details->status == 1)



                    <div class="col-md-4">


                            <p class="left">Name:</p>
                            <p class="right">{{ $challange->name }}</p>
                            <p class="left">Level:</p>
                            <p class="right">{{ $challange->level }}</p>
                            <p class="left">Ingredients:</p>
                            <p class="right">{{ $challange->ingredients }}</p>
                            <p class="left">Allergens:</p>
                            <p class="right">{{ $challange->alergie }}</p>
                            <p class="left">Probably cost:</p>
                            <p class="right">{{ $challange->cost }}</p>
                            <p class="left">City:</p>
                            <p class="right">{{ $challlange->author->details->city }}</p>
                            <p class="left">Author:</p>
                            <p class="right">{{ $challlange->author->details->nickname }}</p>
                            <p class="left">Note:</p>
                            <p class="right">{{ $challlange->note }}</p>



<!--
    CSS: Background kolor diva będzie zależał od poziomu trudności
    author będzie linkiem o profilu autora
-->

                        </div>

                    </div>


                        <?php $count = $count+1; ?>

        @endif

    @endforeach
