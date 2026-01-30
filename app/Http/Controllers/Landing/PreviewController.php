<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Http\Controllers\Landing\HomeController;

class PreviewController extends Controller
{
    public function preview($class_id)
    {
        $class = Berbinarp_Class::with('sections')->find($class_id);
        if (!$class) {
            abort(404, 'Class not found');
        }

        $userId = auth()->guard('berbinar')->id();
        $homeController = app(HomeController::class);
        $enrolledClasses = $homeController->getEnrolledClassesWithProgress($userId);
        [
            'certificateNotification' => $certificateNotification,
            'materiCompleteNotification' => $materiCompleteNotification,
            'progress50Notification' => $progress50Notification,
            'enrollmentStatusNotification' => $enrollmentStatusNotification,
        ] = $homeController->getHomepageNotifications($userId, $enrolledClasses);

        return view('landing.preview.index', compact(
            'class',
            'certificateNotification',
            'materiCompleteNotification',
            'progress50Notification',
            'enrollmentStatusNotification'
        ));
    }
}
