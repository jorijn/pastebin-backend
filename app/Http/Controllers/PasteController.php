<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasteController extends Controller
{
    public function postPaste(Request $request)
    {
        $this->validate($request, [
            'language' => 'required|exists:languages,language',
            'content'  => 'required|min:1',
            'retention' => 'numeric|min:0|max:10080'
        ]);
    }
}
