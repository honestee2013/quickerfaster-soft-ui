<?php

return [
    [
    'title' => 'Manage Roles',
    'icon' => 'fas fa-users-cog',
    'url' => 'Admin/user-role-management',
],
    [
    'title' => 'Assign User Roles',
    'icon' => 'fas fa-user-shield',
    'url' => 'Admin/user-role-assignment',
],
    [
    'title' => 'Manage Permission',
    'icon' => 'fas fa-user-lock',
    'url' => 'Admin/Admin-control-management',
],
    [
    'title' => 'Users',
    'icon' => 'fas fa-user-cog',
    'url' => 'admin/users',
    'permission' => 'view_user',
],
    [
    'title' => 'Roles',
    'icon' => 'fas fa-user-shield',
    'url' => 'admin/roles',
    'permission' => 'view_role',
],
    [
    'title' => 'Permissions',
    'icon' => 'fas fa-user-lock',
    'url' => 'admin/access-control-management',
    'permission' => 'view_permission',
],
];
