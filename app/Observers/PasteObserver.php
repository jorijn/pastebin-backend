<?php

namespace App\Observers;

use App\Paste;
use Vinkla\Hashids\Facades\Hashids;

class PasteObserver
{
    /**
     * Listen to the Paste created event.
     *
     * @param  Paste  $paste
     * @return void
     */
    public function created(Paste $paste)
    {
        $paste->hash = Hashids::encode($paste->id);
        $paste->save();
    }
}