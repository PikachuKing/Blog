<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/21 0021
 * Time: 下午 23:38
 */

namespace App\Http\Controllers\API;


use App\Models\About;

class AboutController extends APIController
{
    /*
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/about
     | Method:         GET
     | Description:    获取关于的内容
     |-------------------------------------------------------------------------------
    */
    public function getAbout()
    {
        $about = About::query()
            ->where('show', 1)
            ->orderBy('created_at', 'DESC')
            ->select('content')
            ->first();
        return $this->success($about);
    }
}
