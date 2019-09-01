<?php

namespace App\Observers;

use App\Models\About;

class AboutObserver
{
    /**
     * Handle the about "created" event.
     *
     * @param  \App\Models\About $about
     * @return void
     */
    public function created(About $about)
    {
        if ($about->show) {
            $this->changeShowFalse($about->id);
        }
    }

    /**
     * Handle the about "updated" event.
     *
     * @param  \App\Models\About $about
     * @return void
     */
    public function updated(About $about)
    {
        if ($about->show) {
            $this->changeShowFalse($about->id);
        }
    }

    public function changeShowFalse($id)
    {
        About::query()->where('id', '!=', $id)->update([
            'show' => 0
        ]);
    }

}
