<?php
return [
    'driver' => env('DATABASE_DRIVER', 'sqlite'),
    'sqlite' => [
        'path' => env('SQLITE_PATH', 'db.sqlite')
    ]
];
