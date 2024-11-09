<?php

namespace App\Http\Controllers;

use App\Models\TrackItem;
use getID3;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog() {
        return view('catalog');
    }
    public function refresh_durations() {
        $tracks = TrackItem::all();
        
        $getID3 = new getID3;
        $updated = 0;
        foreach ($tracks as $track) {
            $filePath = 'app/public/tracks/' . $track->full;
            $file = $getID3->analyze(storage_path($filePath));
            $duration = isset($file['playtime_seconds']) ? (float) $file['playtime_seconds'] : 0.0;
            $track->dur_full = intval($duration);
            $track->save();
            $updated++;
        }
        return response()->json(array('updated' => $updated));
    }

    

   
}
