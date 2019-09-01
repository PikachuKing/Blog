<?php

namespace App\Admin\Actions\Article;

use App\Admin\Actions\TrashedRowAction;
use Illuminate\Database\Eloquent\Model;

class ForceDelete extends TrashedRowAction
{
    public $name = '删除';

    public function handle(Model $model)
    {
        $model->forceDelete();
        return $this->response()->success('Success message.')->refresh();
    }

}
