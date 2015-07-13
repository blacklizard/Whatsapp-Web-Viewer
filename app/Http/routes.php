<?php

Route::get('/', ['uses' => 'WhatsappController@getChat']);
Route::get('/chat/{chat}', ['uses' => 'WhatsappController@getMessage']);
