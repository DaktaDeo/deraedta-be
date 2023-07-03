<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', static function ($query) {
            $query->orderBy('start_at', 'desc');
        });
    }

    protected array $rows = [
        [
            'title' => '47e Voettocht der vlasstreek',
            'date' => '2022-06-26',
            'created_at' => '2022-06-01 00:00:00',
            'updated_at' => '2021-04-08 00:00:00',
            'start_at' => '2022-06-26 07:30:00',
            'end_at' => '2022-06-26 18:00:00',
            'path' => 'calendar/eigentochten/vlastocht.jpg',
            'venue' => 'OC Ter Streye, Rodewilgenstraat 6, 8554 Sint-Denijs',
            'distance' => '6-12-18-25-30 km',
            'entrance' => '€3.00 voor niet-leden. <br />€1.50 voor leden mits voorlegging lidkaart erkende wandelfederatie',
            'cooperation' => 'Leie-Scheldevriendentrofee',
            'info' => '0486/750471',
            'more' => 'drive/calendar/2022/2022vlastocht.pdf',
            'description' => 'W.S.K Marke organiseert deze wandeltocht te Sint-Denijs. Afstanden tussen 6 en 30 km.',
        ],
        [
            'title' => '31e Wintertocht wordt een tijdelijk parkoers',
            'date' => '2022-01-29',
            'created_at' => '2022-01-01 00:00:00',
            'updated_at' => '2022-02-01 00:00:00',
            'start_at' => '2022-01-29 00:00:00',
            'end_at' => '2022-02-13 00:00:00',
            'path' => 'calendar/eigentochten/wintertocht.jpg',
            'venue' => 'OC Marke, Hellestraat 6, 8510 Marke',
            'distance' => '6-12-18 km',
            'entrance' => 'gratis',
            'info' => '0486/750471',
            'more' => 'drive/calendar/2022/2022wintertocht.pdf',
            'environment' => 'landelijk en heuvelachtig',
            'description' => "W.S.K Marke organiseert dit tijdelijk parkors vanuit Marke ipv Moen. Informatie over de 31e wintertocht die een tijdelijk winterparkoers is geworden wegens Covid maatregelen.",
        ]
    ];
}
