<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DatabaseNotification $notification)
    {
        $model = (new $notification->data['referensi_type'])->find($notification->data['referensi_id']);
        return redirect($model->routeNotification());
    }
}
