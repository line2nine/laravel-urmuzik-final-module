<div class="col-md-12" style="color: white">
    <div class="page-header">
        <h1 style="color: white"><small class="pull-right">{{count($comments)}} comments</small> Comments </h1>
    </div>
    <div class="comments-list">
        @foreach($comments as $comment)
            <div class="media">
                &emsp;&emsp;&emsp;
                @if($comment->user->google_id)
                    <a class="media-left">
                        <img src="{{ $comment->user->avatar}}" class="rounded-circle" alt="Cinque Terre" width="70px">
                    </a>
                @else
                    <a class="media-left">
                        <img src="{{asset('storage/'. $comment->user->avatar)}}" class="rounded-circle"
                             alt="Cinque Terre" width="70px">
                    </a>
                    @endif
                    &emsp;&emsp;&emsp;&emsp;&emsp;
                    <div class="media-body">
                        <h4 class="media-heading user_name" style="color: red">{{$comment->user->name}}</h4>
                        {{$comment->desc}}
                        <p class="pull-right" style="color: white"><small>{{$comment->created_at}}</small></p>
                        <p><small><a href="">Reply</a></small></p>
                    </div>
            </div>
        @endforeach
    </div>
</div>

