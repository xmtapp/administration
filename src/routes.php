<?php

Route::get('home', 'HomeController@home')->middleware(['auth']);