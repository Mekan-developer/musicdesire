<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CreateRequest;
use App\Models\TrackCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $all = TrackCategory::all();
        return view('admin.category.index', ['all' => $all]);
    }

    function new()
    {
        return view('admin.category.new');
    }

    function create(CreateRequest $request)
    {
        $fields = $request->validated();
        $newItem = new TrackCategory;
        $newItem->name_ru = $fields['category_name_ru'];
        $newItem->name_en = $fields['category_name_en'];
        $newItem->save();
        return redirect('/admin/categories')->with('success', 'Категория добавлена');
    }

    function edit($id)
    {
        $item = TrackCategory::find($id);
        return view('admin.category.edit', ['item' => $item]);
    }

    function update($id, CreateRequest $request)
    {
        $fields = $request->validated();
        $newItem = TrackCategory::find($id);
        $newItem->name_ru = $fields['category_name_ru'];
        $newItem->name_en = $fields['category_name_en'];
        $newItem->save();
        return redirect('/admin/categories')->with('success', 'Категория обновлена');
    }

    function delete($id)
    {
        $deleteTrack = TrackCategory::find($id);
        if (count($deleteTrack->tracks) > 0) {
            return redirect('/admin/categories')->with('success', 'Кaтегорию нельзя удалить, так как к ней подвязаны треки');
        }
        TrackCategory::destroy($id);
        return redirect('/admin/categories')->with('success', 'Категория удалена');
    }
}
