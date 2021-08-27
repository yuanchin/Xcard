<?php

namespace App\Handlers;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageUploadHandler
{
    /**
     * 允許的副檔名
     * 
     * @var array
     */
    protected $allowed_ext = ["png", "jpg", "gif", "jpeg"];

    /**
     * 將上傳的圖片保存至指定路徑
     * 
     * @return mixed
     */
    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        // 構建文件夾規則，例如：uploads/images/avatars/202108/26/
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());

        // 文件上傳儲存路徑
        $upload_path = public_path() . '/' .$folder_name;

        // 獲取文件副檔名
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 拼接文件名，前最可以是相關數據模型的 ID，例如：1_1493521050_7BVc9v9ujP.png
        $fileName = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;

        // 檢測是否為圖片，如果不是圖片將終止操作
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        $file->move($upload_path, $fileName);

        // 如果限制了圖片寬度，就進行裁剪
        if ($max_width && $extension != 'gif') {
            $this->reduceSize($upload_path . '/' . $fileName, $max_width);
        }

        return [
          'path' => config('app.url') . "/$folder_name/$fileName"
        ];

    }

    /**
     * 進行圖片縮放
     * 
     * @return void
     */
    protected function reduceSize($file_path, $max_width)
    {
        // 實例化 Image 類
        $image = Image::make($file_path);

        // 進行調整大小操作
        $image->resize($max_width, null, function ($constraint) {
            // 設定寬度是 $max_width, 高度等比例縮放
            $constraint->aspectRatio();

            // 防止截圖時圖片尺寸變大
            $constraint->upsize();
        });

        // 將修改後的圖片保存
        $image->save();
    }
  
    
}