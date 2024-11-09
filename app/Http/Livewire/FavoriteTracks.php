<?php

namespace App\Http\Livewire;

use App\Models\FavoriteTrack;
use App\Models\TrackItem;
use App\Models\User;
use Carbon\Carbon;
use getID3;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class FavoriteTracks extends Component
{



    function removeFavorite($id)
    {
        $user = Auth::user();
        FavoriteTrack::where(['user_id' => $user->id, 'track_id' => $id])->delete();
    }
    public function addToCartFav($id)
    {
        $this->emit('addToCart', $id);
    }
    public function render()
    {
        $user = Auth::user();

        $userLocationId = Session::get('user_location_id');

        $favorites = User::find($user->id)->favorites()->where(function ($query) use ($userLocationId) {
            if ($userLocationId != null) {
                $query->whereDoesntHave('blocked', function ($query) use ($userLocationId) {
                    $query->where('blocked_before', '>', Carbon::now())
                        ->where('location_item_id', $userLocationId);
                });
            }
        })->get();
        $getID3 = new getID3;

        foreach ($favorites as $result) {
            $filePath = 'app/public/tracks/' . $result->file;
            $file = $getID3->analyze(storage_path($filePath));
            $result->duration = isset($file['playtime_seconds']) ? (float) $file['playtime_seconds'] : 0.0;

        }

        return view('livewire.favorite-tracks', ['favorites' => $favorites]);
    }
}
