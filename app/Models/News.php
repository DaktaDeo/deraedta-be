<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected array $rows = [
        [
            'title' => '31e wintertocht wordt een tijdelijk parkoers',
            'date' => '2022-01-04',
            'created_at' => '2022-01-04 00:00:00',
            'updated_at' => '2022-01-04 00:00:00',
            'path' => 'content/news/2022/wintertocht-wordt-tijdelijk-parkoers',
            'description' => 'Informatie over de 31e wintertocht die een tijdelijk winterparkoers is geworden wegens Covid maatregelen.',
        ],
        [
            'title' => '1e nieuwsbrief editie juli-augustus 2022',
            'date' => '2022-07-07',
            'created_at' => '2022-07-07 00:00:00',
            'updated_at' => '2022-07-07 00:00:00',
            'path' => 'content/news/2022/eerste-nieuwsbrief',
            'description' => 'Belangrijke onderwerpen over uw club en zijn werking.',
        ]
    ];
}
