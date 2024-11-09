<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Track\CreateRequest;
use App\Http\Requests\Admin\Track\UpdateRequest;
use App\Models\TrackCategory;
use App\Models\TrackItem;
use App\Models\TrackLang;
use App\Models\TrackBlock;
use App\Models\TrackTempo;
use App\Models\LocationItem;
use getID3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    function index()
    {
        $all = TrackItem::all();
        return view('admin.track.index', ['all' => $all]);
    }

    function new()
    {
        $categories = TrackCategory::all();
        $langs = TrackLang::all();
        $tempos = TrackTempo::all();
        $newId = TrackItem::max('id') + 1;
        return view('admin.track.new', ['newId' => $newId, 'categories' => $categories, 'langs' => $langs, 'tempos' => $tempos]);
    }

    function create(CreateRequest $request)
    {
        $fields = $request->validated();
        $newItem = new TrackItem;
        if ($request->file('file') !== null && $request->file('file') !== '') {
            $audio = $request->file('file');
            $path = Storage::putFile('public/tracks', $audio);
            $explodedPath = explode('/', $path);
            $newItem->file = end($explodedPath);
        }
        if ($request->file('file_full') !== null && $request->file('file_full') !== '') {
            $audio = $request->file('file_full');
            $path = Storage::putFile('public/tracks', $audio);
            $explodedPath = explode('/', $path);
            $newItem->full = end($explodedPath);
        }
        $newItem->name_ru = $fields['track_name_ru'];
        $newItem->name_en = $fields['track_name_en'];
        $newItem->category = $fields['track_category'];
        $newItem->lang = $fields['track_lang'];
        $newItem->lyrics = $fields['lyrics'] == 'lyrics_yes' ? 1 : 0;
        $newItem->price = $fields['track_price'];
        $newItem->price_usd = $fields['track_price_usd'];
        $newItem->temp = $fields['track_tempo'];
        $newItem->save();


        $getID3 = new getID3;

        $filePath = 'app/public/tracks/' . $newItem->full;
        $file = $getID3->analyze(storage_path($filePath));
        $duration = isset($file['playtime_seconds']) ? (float) $file['playtime_seconds'] : 0.0;
        $newItem->dur_full = intval($duration);
        $newItem->save();

        return redirect('/admin/tracks')->with('success', 'Трек добавлен');
    }

    function edit($id)
    {
        $item = TrackItem::find($id);
        $categories = TrackCategory::all();
        $langs = TrackLang::all();
        $tempos = TrackTempo::all();
        return view('admin.track.edit', ['item' => $item, 'categories' => $categories, 'langs' => $langs, 'tempos' => $tempos]);
    }

    function update($id, UpdateRequest $request)
    {
        $fields = $request->validated();
        $item = TrackItem::find($id);
        if ($request->file('file') !== null && $request->file('file') !== '') {
            $oldFile = $item->file;
            $audio = $request->file('file');
            $path = Storage::putFile('public/tracks', $audio);
            $explodedPath = explode('/', $path);
            $item->file = end($explodedPath);
            if ($oldFile != null) {
                $oldFilePath = 'public/tracks/' . $oldFile;
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
        }
        if ($request->file('file_full') !== null && $request->file('file_full') !== '') {
            $oldFileFull = $item->full;
            $audio = $request->file('file_full');
            $path = Storage::putFile('public/tracks', $audio);
            $explodedPath = explode('/', $path);
            $item->full = end($explodedPath);
            if ($oldFileFull != null) {
                $oldFilePath = 'public/tracks/' . $oldFileFull;
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
        }
        $item->name_ru = $fields['track_name_ru'];
        $item->name_en = $fields['track_name_en'];
        $item->category = $fields['track_category'];
        $item->lang = $fields['track_lang'];
        $item->lyrics = $fields['lyrics'] == 'lyrics_yes' ? 1 : 0;
        $item->price = $fields['track_price'];
        $item->price_usd = $fields['track_price_usd'];
        $item->temp = $fields['track_tempo'];
        $item->save();

        $locations = LocationItem::orderBy('id','asc')->get();
        foreach( $locations as $location ) {
            if ( $request->has('location' . $location->id ) ) {
                //echo  '<br>' . $location->id;
                $block = TrackBlock::where('track_item_id',$id)->where('location_item_id',$location->id)->where('blocked_before','>',now())->first();
                if ( ! $block ) { echo('No');
                    $newBlockTrack = new TrackBlock;
                    $newBlockTrack->track_item_id = $id;
                    $newBlockTrack->location_item_id = $location->id;
                    $newBlockTrack->blocked_before = date('Y-m-d', strtotime('+1 year'));
                    $newBlockTrack->save();
                } else {
                    //echo('Yes');
                }
            } else {
                TrackBlock::where('track_item_id',$id)->where('location_item_id',$location->id)->delete();
            }
        }
        //exit();




        $getID3 = new getID3;

        $filePath = 'app/public/tracks/' . $item->full;
        $file = $getID3->analyze(storage_path($filePath));
        $duration = isset($file['playtime_seconds']) ? (float) $file['playtime_seconds'] : 0.0;
        $item->dur_full = intval($duration);
        $item->save();

        return redirect('/admin/tracks')->with('success', 'Трек обновлен');
    }

    function delete($id)
    {
        $item = TrackItem::find($id);
        if (count($item->orders) > 0) {
            return redirect('/admin/tracks')->with('success', 'Трек невозможно удалить так как он был куплен');
        }

        $filePath = 'public/tracks/' . $item->file;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        $item->delete();
        return redirect('/admin/tracks')->with('success', 'Трек удален');
    }
}
