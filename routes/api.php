<?php

Route::post('/store', 'PasteController@postPaste');
Route::get('/{hash}', 'PasteController@getPaste');
