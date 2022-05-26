<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'status' => [
        'title' => 'Status',

        'actions' => [
            'index' => 'Status',
            'create' => 'New Status',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'ministerio' => [
        'title' => 'Ministerios',

        'actions' => [
            'index' => 'Ministerios',
            'create' => 'New Ministerio',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            
        ],
    ],

    'curso' => [
        'title' => 'Cursos',

        'actions' => [
            'index' => 'Cursos',
            'create' => 'New Curso',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'membro' => [
        'title' => 'Membros',

        'actions' => [
            'index' => 'Membros',
            'create' => 'New Membro',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'birth_date' => 'Birth date',
            'phone' => 'Phone',
            'address' => 'Address',
            'marital_status' => 'Marital status',
            'personality' => 'Personality',
            'description' => 'Description',
            'isBaptized' => 'IsBaptized',
            'isLeader' => 'IsLeader',
            'isPastor' => 'IsPastor',
            'status_id' => 'Status',
            'spouse_name' => 'Spouse name',
            'wedding_date' => 'Wedding date',
            'baptized_date' => 'Baptized date',
            'discipler' => 'Discipler',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];