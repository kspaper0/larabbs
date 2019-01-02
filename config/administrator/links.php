<?php

use App\Models\Link;

return [
    'title'   => 'Advertisements',
    'single'  => 'Advertisement',

    'model'   => Link::class,

    // 访问权限判断
    'permission'=> function()
    {
        // 只允许站长管理资源推荐链接
        return Auth::user()->hasRole('Founder');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'Name',
            'sortable' => false,
        ],
        'link' => [
            'title'    => 'Hyperlink',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'Manage',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => 'Name',
        ],
        'link' => [
            'title'    => 'Hyperlink',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title' => 'Name',
        ],
    ],
];