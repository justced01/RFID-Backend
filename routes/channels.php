<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('toaster-notification', function () {
    return true;
});
Broadcast::channel('count-notification', function () {
    return true;
});
Broadcast::channel('update-student-card', function () {
    return true;
});
