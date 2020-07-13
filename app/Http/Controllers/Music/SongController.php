<?php

namespace App\Http\Controllers\Music;

use App\Artist;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\SongRequest;
use App\Http\Requests\UpdateSong;
use App\Http\Services\ArtistService;
use App\Http\Services\DetailPlaylistService;
use App\Http\Services\LikeService;
use App\Http\Services\CommentService;
use App\Http\Services\PlaylistService;
use App\Http\Services\SongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Composer\Autoload\includeFile;


class SongController extends Controller
{
    protected $songService;
    protected $playlistService;
    protected $artistService;
    protected $likeService;
    protected $commentsService;
    protected $detailPlaylistService;

    public function __construct(SongService $songService, PlaylistService $playlistService, ArtistService $artistService, LikeService $likeService, CommentService $commentService, DetailPlaylistService $detailPlaylistService)
    {
        $this->songService = $songService;
        $this->playlistService = $playlistService;
        $this->artistService = $artistService;
        $this->likeService = $likeService;
        $this->commentsService = $commentService;
        $this->detailPlaylistService = $detailPlaylistService;
    }

    public function index()
    {
        $songs = $this->songService->getAll();
        return view('song.song', compact('songs'));
    }

    public function indexDashboard()
    {
        $songs = $this->songService->getAll();
        return view('song.dashboard.list', compact('songs'));
    }

    public function create()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('song.upload', compact('categories', 'artists'));
    }

    public function createDashboard()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('song.dashboard.create', compact('categories', 'artists'));
    }

    public function store(SongRequest $request)
    {
        $this->songService->create($request);
        \alert("Add Completed !", '', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->route('music.upload');
    }

    public function storeDashboard(SongRequest $request)
    {
        $this->songService->create($request);
        \alert("Add Completed !", '', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->route('song.dashboard.list');
    }

    public function show($id)
    {
        $likes = count($this->likeService->getAll($id));
        $comments = $this->commentsService->getCommentOfSong($id);
        $song = $this->songService->find($id);
        Session::put('idCurrentSong', "$song->id");
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $check = count($this->likeService->find($song->id, $user_id));
        } else {
            $check = 0;
        }
        // dem luot nghe bai hat
        $viewNumber = Session::get('viewKey' . $id);
        if (!Session::get('viewKey' . $id)) {
            Session::put('viewKey' . $id, 1);
            $this->songService->view($id);
        }
        // lay ra bai hat tiep theo
        $songs = $this->songService->getAll();
        for ($i = 0; $i < count($songs); $i++) {
            if ($i + 1 == count($songs)) {
                $nextSong = $songs[0]->id;
                return view('song.play', compact('song', 'nextSong', 'comments', 'likes','check'));
            } elseif ($songs[$i]->id == Session::get('idCurrentSong')) {
                $nextSong = $songs[$i + 1]->id;
                return view('song.play', compact('song', 'nextSong', 'comments', 'likes','check'));
            }
        }
    }

    public function listSongUser($id)
    {
        $songs = $this->songService->getSongUser($id);
        return view('song.songuser', compact('songs'));
    }

    public function edit($id)
    {
        $song = $this->songService->find($id);
        $categories = Category::all();
        $artists = Artist::all();
        return view('song.edit', compact('song', 'categories', 'artists'));
    }


    public function update(UpdateSong $request, $id)
    {
        $song = $this->songService->find($id);
        $this->songService->update($song, $request);
        \alert("Update Completed !", '', 'success')->autoClose(2000)->timerProgressBar();
        $user = Auth::user();
        return redirect()->route('music.list.user', ['id' => $user->id]);
    }


    public function destroy($id)
    {
        $status = $this->songService->delete($id);
        if ($status) {
            $user = Auth::user();
            return response()->json(
                [
                    'status' => 'success'
                ]
            );
        } else {
            return abort(403);
        }
    }

    public function destroyDashboard($id)
    {
        $song = $this->songService->find($id);
        $song->delete();
        notify("Deleted Completed !", 'success');
        return redirect()->route('song.dashboard.list');
    }

    public function setView($id)
    {
        $song = $this->songService->find($id);
        $viewNumber = Session::get('viewKey');
        if (!Session::get('viewKey')) {
            Session::put('viewKey', 1);
            $song->increment('view');
        }
    }

    function search(Request $request) //dashboard
    {
        if ($this->songService->searchByKeyword($request)) {
            $songs = $this->songService->searchByKeyword($request);
            return view('song.dashboard.list', compact('songs'));
        }
        return redirect()->route('song.dashboard.list');
    }

    public function searchHome(Request $request) //home
    {
        switch ($request->select) {
            case 'song':
                if ($this->songService->searchHome($request->keyword)) {
                    $songs = $this->songService->searchHome($request->keyword);
                    return view('song.song', compact('songs'));
                }
                return redirect()->route('music.index');
            case 'playlist':
                if ($this->playlistService->searchByKeyword($request->keyword)) {
                    $playlists = $this->playlistService->searchByKeyword($request->keyword);
                    return view('home.playlist.list', compact('playlists'));
                }
                return redirect()->route('playlist.index');
            case 'artist':
                if ($this->artistService->searchByKeyword($request->keyword)) {
                    $artists = $this->artistService->searchByKeyword($request->keyword);
                    return view('home.singer.singer', compact('artists'));
                }
                return redirect()->route('artist.index');
            default:
                abort(404);
                break;
        }
    }

    public function addSongToPlaylists($song_id)
    {
        $playlists = $this->detailPlaylistService->getPlaylistNotExitSong($song_id);

        return view('song.add-playlist', compact('playlists', 'song_id'));
    }

    public function storeSongToPlaylists($song_id, Request $request)
    {
        $song = $this->songService->find($song_id);
        $status = $this->detailPlaylistService->addSongToPlaylists($request, $song);

        if ($status) {
            \alert("Add Song Completed !", '', 'success')->autoClose(2000)->timerProgressBar();

            return redirect(route('music.index'));
        } else {
            return back();
        }
    }
}
