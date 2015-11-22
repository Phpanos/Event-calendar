<?php

use Phpanos\EventCalendar\Calendar;

Route::group(['prefix' => 'event'], function () {
    Route::get('/', function () {
        $calendar = new Calendar(2015, 11);
        return $calendar->display();
    });
});
