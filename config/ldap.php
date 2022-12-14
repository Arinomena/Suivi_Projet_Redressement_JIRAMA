<?php

return [
    'logging' => env('LDAP_LOGGING', false),
    'connections' => [
        'default' => [
            'auto_connect' => env('LDAP_AUTO_CONNECT', true),
            'connection' => Adldap\Connections\Ldap::class,
            'settings' => [
                'schema' => Adldap\Schemas\ActiveDirectory::class,
                'account_prefix' => env('LDAP_ACCOUNT_PREFIX', ''),
                'account_suffix' => env('LDAP_ACCOUNT_SUFFIX', ''),
                'hosts' => explode(' ', env('LDAP_HOSTS', '192.168.222.59')),
                'port' => env('LDAP_PORT', 3268),
                'timeout' => env('LDAP_TIMEOUT', 5),
                'base_dn' => env('LDAP_BASE_DN', 'dc=jirama,dc=mg'),
                'username' => env('LDAP_USERNAME'),
                'password' => env('LDAP_PASSWORD'),
                'follow_referrals' => false,
                'use_ssl' => env('LDAP_USE_SSL', false),
                'use_tls' => env('LDAP_USE_TLS', false),
            ],
        ],
    ],
];