<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('playlist.add')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW PLAYLIST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name playlist</label>
                        <input type="text" class="form-control
                        @if($errors->first('title'))
                            is-invalid
                        @endif
                            " value="{{ old('title') }}" name="title" required minlength="2" maxlength="15">
                        @if($errors->first('title'))
                            <p class="text-danger">{{ $errors->first('title') }}</p>
                        @endif

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
