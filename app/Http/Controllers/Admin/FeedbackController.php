<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feedback\CreateRequest;
use App\Http\Requests\Admin\Feedback\UpdateRequest;
use App\Models\FeedbackItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    function index() {
        $all = FeedbackItem::all();
        return view('admin.feedback.index', ['all' => $all]);
    }

    function new() {
        return view('admin.feedback.new');
    }
    
    function create(CreateRequest $request) {
        $fields = $request->validated();
        $newItem = new FeedbackItem;
        $newItem->name = $fields['name'];
        $newItem->content = $fields['content'];
        $newItem->link = $fields['link'];
        $image = $request->file('image');
        $path = Storage::putFile('public/feedback', $image);
        $explodedPath = explode('/', $path);
        $newItem->image = end($explodedPath);
        $newItem->save();
        return redirect('/admin/feedback')->with('success', 'Отзыв добавлен');
    }

    function edit($id) {
        $item = FeedbackItem::find($id);
        return view('admin.feedback.edit', ['item' => $item]);
    }

    function update($id, UpdateRequest $request) {
        $fields = $request->validated();
        $newItem = FeedbackItem::find($id);
        $newItem->name = $fields['name'];
        $newItem->content = $fields['content'];
        $newItem->link = $fields['link'];
        $newItem->save();
        return redirect('/admin/feedback')->with('success', 'Отзыв обновлен');
    }
    function delete($id) {
        FeedbackItem::destroy($id);
        return redirect('/admin/feedback')->with('success', 'Отзыв удален');
    }
}
