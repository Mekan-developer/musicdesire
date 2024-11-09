<?php

namespace App\Http\Livewire;

use App\Models\FavoriteTrack;
use App\Models\TrackCategory;
use App\Models\TrackDuration;
use App\Models\TrackItem;
use App\Models\TrackLang;
use App\Models\TrackTempo;
use Carbon\Carbon;
use getID3;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;


class TrackCatalog extends Component
{
    use WithPagination; 
 

    protected $listeners = ['refreshTracks' => '$refresh'];

    //Категории
    public $categories = [];
    public $selectedCategories = [];


    //Языки
    public $trackLangs = [];
    public $selectedLangs = [];


    //Продолжительность
    public $trackDurs = [];
    public $selectedDurs = [];

    //Слова в треке
    public $selectedLyrics = null;
    public $locset = null;

    //Темп
    public $trackTempos = [];
    public $selectedTempos = [];

    public $page_limit = 6;
    public function setPageLimits($count)
    {
        $this->page_limit = $count;
    }

    public function mount()
    {
        $this->categories = TrackCategory::all();
        $this->trackLangs = TrackLang::all();
        $this->trackDurs = TrackDuration::all();
        $this->trackTempos = TrackTempo::all();
    }
    public function paginationView()
    {
        return 'pagination-links';
    }

    public function updateSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $query = TrackItem::query();
        if (!empty($this->selectedCategories)) {
            $query->whereIn('category', $this->selectedCategories);
        }

        $userLocationId = Session::get('user_location_id');
        if ($userLocationId) {
            $query->whereDoesntHave('blocked', function ($query) use ($userLocationId) {
                $query->where('blocked_before', '>', Carbon::now())->where('location_item_id', $userLocationId);
            });
            $this->locset = true;
        }

        if (!empty($this->selectedLangs)) {
            $query->whereIn('lang', $this->selectedLangs)->where('lyrics', 1);
        }

        if ($this->selectedLyrics != null) {
            $query->where('lyrics', $this->selectedLyrics);
        }

        if (!empty($this->selectedTempos)) {
            $query->whereIn('temp', $this->selectedTempos);
        }

        if (!empty($this->selectedDurs)) {
            $dds = TrackDuration::find($this->selectedDurs);
            $secondsArray = array();
            foreach ($dds as $d) {
                if ($d->from != null && $d->to != null) {
                    $secondsArray = array_merge($secondsArray, range($d->from, $d->to, 1));
                }
                
            }
            $query->whereIn('dur_full', $secondsArray);
        }

        
        $results = $query->paginate($this->page_limit);
        
        $getID3 = new getID3;
        $user = Auth::user();
        foreach ($results as $result) {
            $filePath = 'app/public/tracks/' . $result->full;
            $file = $getID3->analyze(storage_path($filePath));
            if ($user) {
                $isFav = FavoriteTrack::where(['user_id' => $user->id, 'track_id' => $result->id])->exists();
                $result->isFav = $isFav;
            } else {
                $result->isFav = false;

            }
            $result->duration = isset($file['playtime_seconds']) ? (float) $file['playtime_seconds'] : 0.0;
        }


        return view('livewire.track-catalog', ['tracks' => $results])
            ->extends('layouts.base')
            ->section('content');
    }



    public function addToCartCatalog($id)
    {
        $this->emit('addToCart', $id);
    }
    function addToFavorite($id)
    {
        $track = TrackItem::find($id);
        $user = Auth::user();

        if (!$user) {
            return;
        }

        $toAdd = FavoriteTrack::where(['user_id' => $user->id, 'track_id' => $id])->doesntExist();
        if ($toAdd) {
            $newFav = new FavoriteTrack;
            $newFav->user_id = $user->id;
            $newFav->track_id = $track->id;
            $newFav->save();
        }
    }
    function removeFavorite($id)
    {
        $user = Auth::user();
        FavoriteTrack::where(['user_id' => $user->id, 'track_id' => $id])->delete();
    }
}