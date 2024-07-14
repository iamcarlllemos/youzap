<?php

use Carbon\Carbon;

function UserState($last_seen) {
    $current_timestamp = Carbon::now()->timestamp;
    if($current_timestamp > ($last_seen + 10 )) {
        echo '
            <div class="alert alert-danger">
                Offline
            </div>
        ';
    } else {
        echo '
            <div class="alert alert-success">
                Online
            </div>
        ';
    }
}

function saveLastSeen() {
    $current_timestamp = Carbon::now()->timestamp;
    $user = Auth::user();
    $user->last_seen = $current_timestamp;
    $user->save();
}