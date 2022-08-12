<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminNotification;

class AdminNotificationCtrl extends Controller
{
    public function show(AdminNotification $id)
    {
        $id->status = '1';
        $id->save();
    }
}
