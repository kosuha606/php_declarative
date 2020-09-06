<?php

return [
    'bid' => [
        'attributes' => [
            'id',
            'lot_id',
            'user_id',
            'created_at',
            'price',
        ]
    ],
    'lot' => [
        'attributes' => [
            'id',
            'name',
            'description',
            'start_price',
        ]
    ],
    'user' => [
        'attributes' => [
            'id',
            'name',
        ]
    ]
];