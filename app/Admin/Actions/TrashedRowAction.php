<?php
/**
 * 获取软删除数据的Eloquent模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/1 0001
 * Time: 下午 13:11
 */

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Http\Request;

abstract class TrashedRowAction extends RowAction
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function retrieveModel(Request $request)
    {
        if (!$key = $request->get('_key')) {
            return false;
        }

        $modelClass = str_replace('_', '\\', $request->get('_model'));

        return $modelClass::onlyTrashed()->findOrFail($key);
    }
}
