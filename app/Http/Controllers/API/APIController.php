<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/12
 * Time: 11:01
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class APIController extends  Controller
{
    /**
     * 请求成功
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data = [], $message = 'ok')
    {
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => $message,
            'data' => $data,
        ]);
    }

    /**
     * 请求错误
     * @param int $code 错误码
     * @param array $data 数据
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function fail($code, $data = [], $message = '')
    {
        return response()->json([
            'status' => false,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function pageSize()
    {
        return 3;
    }
}