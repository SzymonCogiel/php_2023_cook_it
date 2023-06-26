<?php use App\User;
use App\Reply;
?>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balthazar&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/main.css')}}">


<div class="menubar">
    <h1> <img src="{{asset('img/cookit2.png')}}" height="180px"/> CookIT</h1>
    <a href="/search">Challenge search</a> &emsp;
    <a href="/replies">Messages</a> &emsp;
    <a href="/challange">Add challange</a> &emsp;
    <a href="/profile">My profile</a>
    <a href="/logout">Logout</a>
</div>


    <div class="col-md-8">



        <h1>Replies</h1>


        <h1>Replies (<span class="newResponsesCount">{{ Reply::newReplyCount() }}</span>)</h1>


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
        <table id="replies" class="table table-dark">

            <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Response</th>
                <th>Date/Time</th>
                <th>Actions</th>
            </tr>


            </thead>

            <tbody>


            @foreach($replies as $reply)


                    <?php
                    $nameofsender = User::getNameofsender($reply->sender_id);
                    $cityofsender = User::getCityofsender($reply->sender_id);
                    $usernameofsender = User::getUsernameofuser($reply->sender_id);
                    $encoded_message = encrypt($reply->message);
                    ?>




                <tr>
                    <th class="rel1-{{ $reply->id }}" @if($reply->viewed==0) style="font-weight:bold; color: #9FC3FF;" @endif>{{ $nameofsender }}</th>

                    <th class="rel1-{{ $reply->id }}" @if($reply->viewed==0) style="font-weight:bold; color: #9FC3FF;" @endif>{{ $cityofsender }}</th>

                    <th class="rel1-{{ $reply->id }}" @if($reply->viewed==0) style="font-weight:bold; color: #9FC3FF;" @endif>{{ substr($reply->message,0,10) }}<a title="View Details of Reply" data-toggle="modal" data-target="#myReplies{{ $reply->id }}">...</a></th>


                    <th class="rel1-{{ $reply->id }}" @if($reply->viewed==0) style="font-weight:bold; color: #9FC3FF;" @endif>{{ $reply->created_at }}</th>

                    <th>

                        <a class="updateReply" rel="{{ $reply->id }}" title="View Details" href="#myReplies{{ $reply->id }}"><i class="fa fa-file-text" aria-hidden="true"></i></a>

                        &nbsp;




                        <a rel="{{ $reply->id }}" rel1="delete-reply" class="deleteReply" href="javascript:"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;</a>

                        <a href="{{ url('contact/'.$usernameofsender.'?encoded_message='.$encoded_message)}}" target="_blank">
                            <i class="fa fa-reply" aria-hidden="true"></i>&nbsp;

                        </a>


                        <button class="btn btn-primary updateReply" rel="{{ $reply->id }}" data-toggle="modal" data-target="#myReplies{{ $reply->id }}">View Details</button>

                        <!-- CONTACT MODAL -->
                        <div class="modal fade text-dark" id="myReplies{{ $reply->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Replies Details</h5>
                                        <button class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="name">{{ $reply->message }}</label>
                                                <input type="text" class="form-control">
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

