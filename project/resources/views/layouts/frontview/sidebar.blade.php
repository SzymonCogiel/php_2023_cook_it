<h2>Side bar</h2>

<?php
use App\User;
use App\Country;
use App\Reply;
$filloutformCount = User::filloutformProfileExists(Auth::User()['id']);
if($filloutformCount==1){
    $filloutformCountContent = "My Dating Profile";
} else {
    $filloutformCountContent = "Add Dating Profile";
}
?>




<div class="col-md-4">


    @if(empty(Auth::check()))
        <div class="card bg-primary text-center card-form">
            <div class="card-body">
                <h3 class="text-white">Sign In</h3>


                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif


                <form action="{{ url('signin' )}}" method="post">{{ csrf_field() }}
                    <fieldset>
                        <div class="form-group">
                            <input id="username" name="username" type="text" class="form-control form-control-lg" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input id="password" name="password" type="password" class="form-control form-control-lg" placeholder="Password" required="">
                        </div>


                        <input type="submit" value="Login" class="btn btn-dark"/>


                    </fieldset>
                </form>
            </div>
        </div>

    @else


        <h1>Welcome <?php echo Auth::User()['name']; ?> | <a href="{{ url('/logout') }}">Logout</a></h1>


        <p class="link"><a href="{{ url('/phase/2') }}">{{ $filloutformCountContent }}</a></p>


        @if($filloutformCount==1)

            <p class="link"><a href="{{ url('/phase/3') }}">My Photos</a></p>


        @endif


        <p><a href="{{ url('/replies') }}">Replies</a></p>


        <p><a href="{{ url('/shooted-messages') }}">Sent Messages</a></p>



    @endif


    <p><a href="{{ url('/replies') }}">Replies (<span class="newReplyCount">{{ Reply::newReplyCount() }}</span>)</a></p>


    <form action="{{ url('/search') }}" method="post">{{ csrf_field() }}

        <fieldset>

            <!-- TEXT FIELD GROUPS -->
            <div class="form-group">
                <label for="name">Looking For</label>



            </div>
            <!-- TEXT FIELD GROUPS -->
            <div class="form-group">
                <label for="name">Name</label>

                <br>
                <select class="gender" name="gender">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>


            <div class="form-group">
                <label for="name">Age</label>



            </div>


            <div class="form-group">
                <select class="date" name="minimumyears">


                    <?php
                    $minimumCount = 16;
                    while($minimumCount <= 99){
                        ?>



                    <option value="{{ $minimumCount }}">from {{ $minimumCount }} yrs</option>


                        <?php $minimumCount = $minimumCount + 1; } ?>
                </select>
                <br>
                <select class="date" name="maximumyears">

                    <?php
                    $maximumCount = 32;
                    while($maximumCount <= 99){
                        ?>


                    <option value="{{ $maximumCount }}" @if($maximumCount=="32") selected="" @endif>from {{ $maximumCount }} yrs</option>
                        <?php $maximumCount = $maximumCount + 1; } ?>

                </select>
            </div>



            <div class="form-group">
                <label for="name">Location</label>



            </div>



            <div class="form-group">
                <?php $getCountries = Country::get(); ?>
                <select class="gender" name="country">
                    <option value="">Anywhere</option>
                    @foreach($getCountries as $country)
                        <option value="{{ $country->name }}" @if($country->name=="India") selected @endif>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <div class="search_column_1">&nbsp;</div>
                <div class="search_column_2">
                    <input type="image" src="{{ asset('images/frontend_images/search_btn.gif') }}" class="search_btn"/>
                </div>
            </div>


            <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control form-control-lg" type="email" id="email" placeholder="Enter email">
                <small class="form-text text-muted">Your email will not ever be shared</small>
            </div>


            <button class="btn btn-primary btn-block" type="submit">Submit</button>


        </fieldset>
    </form>


</div>
