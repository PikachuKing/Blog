<?php

namespace App\Admin\Actions\Article;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class ForceDelete extends RowAction
{
    public $name = '删除';

    public function handle(Model $model)
    {
        $model->onlyTrashed()->forceDelete();
        return $this->response()->success('Success message.')->refresh();
    }

}