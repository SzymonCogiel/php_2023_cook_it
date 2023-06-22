<div class="col-md-8 showcase">

    <h1>Photos</h1>


    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif



    <h1><strong>You can upload your pictures here</strong></h1>

    <form method ="POST" action = "/action">
    <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
    <div class="form-group">
        {{ Form::label('image', 'Image') }}
        {{ Form::file('image',array('class' => 'form-control')) }}
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">


                @foreach($user_photos as $photo)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">


                            @if($photo->status==1)
                                <img class="card-img-top img-fluid" src="{{url('images',$photo->image)}}" width="50px" alt="Card image cap">

                            @else

                                Not active

                                <img class="card-img-top img-fluid" src="{{asset('images/fontimg/photos/notactive.png')}}" />

                            @endif


                            @if($photo->default_image == "Yes")

                                Default
                            @endif


                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>


                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        <a class="btn btn-primary" style="backgroundcolor: red;" href="{{url('/delete-photo')}}/{{ $photo->image }}"><i class="fa fa-times"></i>Delete</a>


                                        <button type="button" class="btn btn-sm btn-outline-danger">
                                            <a style="background-color:red"
                                               href="/default-photo/{{ $photo->image }}"><i class="fa fa-times"></i></a>
                                            Default</button>



                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach



                    </div>
            </div>
        </div>
    </div>
</div>
