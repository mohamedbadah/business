<?php
return [
    [
        'icon'=>'nav-icon fas fa-th',
        'route'=>'admin.dashboard',
        'title'=>'Dashboard',
        'badge'=>'New',
        'active'=>'admin.dashboard'
    ],
    [
        'icon'=>'far fa-circle nav-icon',
        'route'=>'admin.service.index',
        'title'=>'services',
        'active'=>'admin.service.*',
    ],
    [
        'icon'=>'far fa-circle nav-icon',
        'route'=>'admin.blog.index',
        'title'=>'blogs',
        'active'=>'admin.blog.*'
    ],
    [
        'icon'=>'far fa-circle nav-icon',
        'route'=>'admin.section.index',
        'title'=>'section',
        'active'=>'admin.section.*'
    ]
]

?>