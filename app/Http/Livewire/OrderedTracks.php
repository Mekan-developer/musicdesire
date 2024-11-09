<?php

namespace App\Http\Livewire;

use App\Models\UserOrder;
use getID3;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderedTracks extends Component
{
    public function render()
    {
        $user = Auth::user();

        $orders = [];
        if ($user) {
            $orders = UserOrder::where('user_id', $user->id)->where('status',1)->get();
        }
        $getID3 = new getID3;
        
        foreach ($orders as $order) {
            foreach ($order->tracks as $track) {
                $tr = $track->trackObj;
                $filePath = 'app/public/tracks/' . $tr->full;
                $file = $getID3->analyze(storage_path($filePath));
                $tr->duration = isset($file['playtime_seconds']) ? (float) $file['playtime_seconds'] : 0.0;
            }
        }
        return view('livewire.ordered-tracks', ['orders' => $orders]);
    }
}
