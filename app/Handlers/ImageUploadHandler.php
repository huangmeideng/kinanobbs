<?php
/**
 * Created by PhpStorm.
 * User: Huangmeidneg
 * Date: 2018-1-15
 * Time: 17:36
 */

namespace App\Handlers;

use Image;


class ImageUploadHandler
{
    //只允许以下缀名的图片文件上传
    protected $allowed_ext = ['png','jpg','gif','jpeg'];

    public function save($file,$folder,$file_prefix,$max_width = false)
    {
        //构建存储文件的文件夹
        //文件夹切割
        $folder_name = "uploads/images/$folder/".date("Ym",time()).'/'.date("d",time()).'/';

        //文件具体存储的物理路径
        $upload_path = public_path().'/'.$folder_name;
        //获取图片后缀名，如果不存在，默认为空
        $extension = strtolower($file->getClientOriginalExtension())?:'png';
        //拼接文件名，添加前缀名，增加辨识度
        $filename = $file_prefix.'_'.time().'_'.str_random(10).'.'.$extension;
        //如果上传的不是图片终止操作
        if (!in_array($extension,$this->allowed_ext)){
            return false;
        }
        //将图片移动到我们的目标存储路径中
        $file->move($upload_path,$filename);
        //如果限制图片宽度就进行裁剪
        if ($max_width && $extension != 'gif'){
            //此类中封装的函数用于裁剪图片
            $this->reduceSize($upload_path.'/'.$filename,$max_width);
        }
        return [
            'path' => config('app.url')."/$folder_name/$filename"
        ];
    }

    public function reduceSize($file_path,$max_width)
    {
        //先实例化，传参是文件的磁盘物理路径
        $image = Image::make($file_path);

        //进行大小调整操作
        $image->resize($max_width,null,function ($constraint){
            //设定宽度是$max_width，高度等比例缩放
            $constraint->aspectRatio();
            //防止裁图时图片尺寸变大
            $constraint->upsize();
        });
        //对图片修改后进行保存
        $image->save();
    }

}