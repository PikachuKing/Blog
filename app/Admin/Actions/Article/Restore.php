<?php

namespace App\Admin\Actions\Article;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Restore extends RowAction
{
    public $name = '恢复';

    public function handle(Model $model)
    {
        $model->onlyTrashed()->restore();
        return $this->response()->success('Success message.')->refresh();
    }

}