<div class="col-md-12" style="color: white">
    <div class="page-header">
        <h1 style="color: white"><small class="pull-right total-cmt">{{count($comments)}} comments</small> Comments </h1>
    </div>
    @if(\Illuminate\Support\Facades\Auth::user())
    @include('comment.comments')
    @else
        <div class="container" style="text-align: center; font-size: 20px">
            <span>Please <a href="{{route('login')}}" style="color: blue; text-decoration: underline">login</a> to comment</span>
        </div>
        <br>
    @endif
    <div class="comments-list">
        @foreach($comments as $comment)
            <div class="media mb-3" style="background-color: #383838; border-radius: 20px;">
                &emsp;&emsp;&emsp;
                @if($comment->user->google_id)
                    <a class="media-left mt-2">
                        <img src="{{ $comment->user->avatar}}" class="rounded-circle" alt="Cinque Terre" width="70px">
                    </a>
                @else
                    <a class="media-left mt-2">
                        <img src="{{asset('storage/'. $comment->user->avatar)}}" class="rounded-circle"
                             alt="Cinque Terre" width="70px">
                    </a>
                    @endif
                    &emsp;&emsp;&emsp;&emsp;&emsp;
                    <div class="media-body">
                        <h4 class="media-heading user_name" style="color: red">{{$comment->user->name}}</h4>
                        <span style="font-size: 20px; color: white">{{$comment->desc}}</span>

                        <p class="pull-right mr-2" style="color: white"><small>{{date($comment->created_at)}}</small></p>
                    </div>
            </div>
        @endforeach
    </div>
</div>

