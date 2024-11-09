<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Perform\CreateRequest;
use App\Http\Requests\Admin\Perform\UpdateRequest;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerformanceController extends Controller
{
    function index()
    {
        $all = Performance::all();
        return view('admin.perform.index', ['all' => $all]);
    }

    function new()
    {
        return view('admin.perform.new');
    }
    function edit($id)
    {
        $item = Performance::find($id);
        return view('admin.perform.edit', ['item' => $item]);
    }

    function create(CreateRequest $request)
    {
        $fields = $request->validated();
        $newItem = new Performance;
        $newItem->title_ru = $fields['title_ru'];
        $newItem->title_en = $fields['title_en'];
        if ($request->file('video') !== null && $request->file('video') !== '') {
            $video = $request->file('video');
            $path = Storage::putFile('public/perform', $video);
            $explodedPath = explode('/', $path);
            $newItem->video = end($explodedPath);
        }
        $newItem->save();
        return redirect('/admin/performance')->with('success', 'Выступление добавлено');
    }
    function update(UpdateRequest $request)
    {
        $fields = $request->validated();
        $item = Performance::find($fields['id']);
        $item->title_ru = $fields['title_ru'];
        $item->title_en = $fields['title_en'];
        $item->save();
        return redirect('/admin/performance')->with('success', 'Выступление обновлено');
    }




    function delete($id)
    {
        $deletePerform = Performance::find($id);
        $filePath = 'public/perform/' . $deletePerform->video;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        Performance::destroy($id);
        return redirect('/admin/performance')->with('success', 'Выступление удалено');
    }
}
