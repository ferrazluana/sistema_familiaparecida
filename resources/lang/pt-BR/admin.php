<?php

return [
    'admin-user' => [
        'title' => 'Usuários',

        'actions' => [
            'index' => 'Usuário',
            'create' => 'Novo Usuário',
            'edit' => 'Editar :name',
            'edit_profile' => 'Editar Perfil',
            'edit_password' => 'Editar Senha',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Ultimo login',
            'first_name' => 'Nome',
            'last_name' => 'Sobrenome',
            'email' => 'Email',
            'password' => 'Senha',
            'password_repeat' => 'Confirmar Senha',
            'activated' => 'Ativado',
            'forbidden' => 'Bloqueado',
            'language' => 'Idioma',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'status' => [
        'title' => 'Status',

        'actions' => [
            'index' => 'Status',
            'create' => 'Novo Status',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Nome',
            
        ],
    ],

    'ministerio' => [
        'title' => 'Ministérios',

        'actions' => [
            'index' => 'Ministérios',
            'create' => 'Novo Ministério',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Ministério',
            'description' => 'Descrição',
            
        ],
    ],

    'curso' => [
        'title' => 'Cursos',

        'actions' => [
            'index' => 'Cursos',
            'create' => 'Novo Curso',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Curso',
            
        ],
    ],

    'membro' => [
        'title' => 'Membros',

        'actions' => [
            'index' => 'Membros',
            'create' => 'Novo Membro',
            'edit' => 'Editar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Nome',
            'birth_date' => 'Data de Nascimento',
            'phone' => 'Telefone',
            'address' => 'Endereçi',
            'marital_status' => 'Estado Civil',
            'personality' => 'Personalidade',
            'description' => 'Descrição',
            'isBaptized' => 'Batizado',
            'isLeader' => 'Líder',
            'isPastor' => 'Pastor',
            'status_id' => 'Status',
            'spouse_name' => 'Nome do Conjuge',
            'wedding_date' => 'Aniversário de Casamento',
            'baptized_date' => 'Data de Batismo',
            'discipler' => 'Discipulador',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];