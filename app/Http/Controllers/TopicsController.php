<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
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

    /**
		 * 顯示文章
		 */
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

		/**
		 * 編輯文章
		 */
		public function edit(Topic $topic, Category $category)
		{
				$this->authorize('update', $topic);
				$categories = $category->all();

				return view('topics.create_and_edit', compact('topic', 'categories'));
		}

		/**
		 * 更新文章
		 */
		public function update(TopicRequest $request, Topic $topic)
		{
			$this->authorize('update', $topic);
			$topic->update($request->all());

			return redirect()->route('topics.show', $topic->id)->with('success', '更新成功！');
		}

		/**
		 * 刪除文章
		 */
		public function destroy(Topic $topic)
		{
				$this->authorize('destroy', $topic);
				$topic->delete();

				return redirect()->route('topics.index')->with('success', '刪除成功！');
		}
		public function uploadImage(Request $request, ImageUploadHandler $uploader)
		{
				// 初始化返回資料，默認為失敗的
				$data = [
						"success"   => false,
						"msg"       => '上傳失敗！',
						"file_path" => ''
				];

				// 判斷是否有圖片上傳，並且賦值給 $file
				if ($file = $request->upload_file) {
						// 保存圖片到本地
						$result = $uploader->save($file, 'topics', Auth::id(), 1024);

						if ($result) {
								$data['file_path'] = $result['path'];
								$data['msg'] = "上傳成功！";
								$data['success'] = true;
						}
				}

				return $data;
		}
}