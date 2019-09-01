<?php

namespace App\Admin\Actions\Article;

use App\Admin\Actions\TrashedRowAction;
use Illuminate\Database\Eloquent\Model;

class Restore extends TrashedRowAction
{
    public $name = '恢复';

    public function handle(Model $model)
    {
        $model->restore();
        return $this->response()->success('Success message.')->refresh();
    }

}
