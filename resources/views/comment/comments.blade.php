<div class="col-md-12">
    <form method="post" action="{{route('comments.song', ['song_id' => $song->id])}}">
        @csrf
        <div class="form-group" style="color: white">
            <textarea class="form-control" rows="2" name="comment"></textarea>
        </div>
        <div class="form-group text-right">
            <button class="btn btn-primary" id="comment-submit" type="submit">Post</button>
        </div>
    </form>
</div>
