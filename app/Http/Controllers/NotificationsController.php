<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Response;

class NotificationsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {

        //$notifications = auth()->user()->notifications;
        $data = [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications'   => auth()->user()->readNotifications
        ];
       
        // dd($data);

        return view('notificaciones.index')->with($data);

    } 

    public function read(string $id)
    {       

        DatabaseNotification::find($id)->markAsRead();

        $data = [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications'   => auth()->user()->readNotifications
        ];
        
        return Response::json(['data' => $data], 201);


    }

    public function unread(string $id)
    {
        DatabaseNotification::find($id)->markAsUnRead();
        
        $data = [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications'   => auth()->user()->readNotifications
        ];
        
        return Response::json(['data' => $data], 201);

    }
    
    
    public function getNotificationsData(Request $request)
    {
    
        $tiene_notificaciones = Auth::user()->unreadNotifications->count();                

        $notifications = [];       
        

        if ($tiene_notificaciones) {

             //si tiene notificaciones, obtengo la ultima recibida, es decir, el ultimo mensaje recibido
            $notification_time = Auth::user()->unreadNotifications->last()->created_at;
            $start_time = Carbon::now();           
        
            $minutesDiff=$start_time->diffInMinutes($notification_time);

            $ultima_notificacion = 'Hace '.$minutesDiff.' minutos';

            if ($minutesDiff > 60 && $minutesDiff<1440) {
                $hrs = round($minutesDiff/60);
                $ultima_notificacion = ($hrs == 1) ? 'Hace '.$hrs.' hora' : 'Hace '.$hrs.' horas' ;                
            }

            if ($minutesDiff > 1440) {
                $hrs = round($minutesDiff/60);
                $days = round($hrs/24);
                $ultima_notificacion = ($days == 1) ? 'Hace '.$days.' día' : 'Hace '.$days.' días';                
            }

            $notifications = [
                [
                    'icon' => 'fas fa-fw fa-envelope',
                    'text' => ($tiene_notificaciones == 1) ? $tiene_notificaciones. ' nuevo mensaje' : $tiene_notificaciones. ' nuevos mensajes' ,
                    'time' => $ultima_notificacion,
                ],           
            ];
        }        

        // Now, we create the notification dropdown main content.

        $dropdownHtml = '';

        foreach ($notifications as $key => $not) {
            $icon = "<i class='mr-2 {$not['icon']}'></i>";

            $time = "<span class='float-right text-muted text-sm'>
                    {$not['time']}
                    </span>";

            $dropdownHtml .= "<a href='#' class='dropdown-item'>
                                {$icon}{$not['text']}{$time}
                            </a>";

            if ($key < count($notifications) - 1) {
                $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }
        }

        // Return the new notification data.

        return [
            'label'       => count($notifications),
            'label_color' => 'danger',
            'icon_color'  => 'dark',
            'dropdown'    => $dropdownHtml,
        ];
    }

}
