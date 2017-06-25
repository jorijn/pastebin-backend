<?php

namespace App\Http\Controllers;

use App\Paste;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PasteController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postPaste(Request $request): JsonResponse
    {
        $this->validate($request, [
            'language'  => 'required|exists:languages,language',
            'content'   => 'required|min:1',
            'retention' => 'numeric|min:0|max:10080',
        ]);

        $paste = Paste::createFromRequest($request);

        return response()->json($paste);
    }

    /**
     * Finds a Paste by its hash and returns it. Will
     * return 404 otherwise.
     *
     * @param string $hash
     *
     * @return JsonResponse
     */
    public function getPaste(string $hash): JsonResponse
    {
        $paste = Paste::where(['hash' => $hash])->first();
        abort_if(is_null($paste) === true, 404, 'Paste not found');

        return response()->json($paste);
    }
}
