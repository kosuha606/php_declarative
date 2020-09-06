<?php

return [
    'maps' => [
        1 => [
            'fields' => [
                'grid_size' => [10, 10],
                'map_image' => '',
            ]
        ]
    ],
    'users' => [
        1 => [
            'fields' => [
                'id' => 1,
                'login' => 'evgen',
                'password' => '111',
                'name' => 'Евгеий',
                'map_id' => 1,
                'map_position' => [0, 1],
            ]
        ],
        2 => [
            'fields' => [
                'id' => 2,
                'login' => 'dmitr',
                'password' => '222',
                'name' => 'Дмитрий',
                'map_id' => 1,
                'map_position' => [0, 1],
            ]
        ],
    ]
];