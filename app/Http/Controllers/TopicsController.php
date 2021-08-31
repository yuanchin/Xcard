<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

		/**
		 * 顯示話題主頁
		 */
		public function index(Request $request, Topic $topic)
		{
				$topics = $topic->withOrder($request->order)
												->with('user', 'category')
												->paginate(20);

				return view('topics.index', compact('topics'));
		}

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

		/**
		 * 提供創建或修改文章的頁面
		 */
		public function create(Topic $topic, Category $category)
		{
				$categories = $category->all();
				return view('topics.create_and_edit', compact('topic', 'categories'));
		}

		/**
		 * 儲存新建文章
		 */
		public function store(TopicRequest $request, Topic $topic)
		{
				$topic->fill($request->all());
				$topic->user_id = Auth::id();
				$topic->save();

				return redirect()->route('topics.show', $topic->id)->with('success', '文章創建成功！');
		}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
		return view('topics.create_and_edit', compact('topic'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->route('topics.show', $topic->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
	}
}