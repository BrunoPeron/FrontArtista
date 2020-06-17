<?php
return [
    'doctrine' => [
        'driver' => [
            'user_entity' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/orm']
            ],
            'orm_default' => [
                'drivers' => [
                    'Aqilix\OAuth2\Entity' => 'aqilix_oauth2_entity',
                    'User\Entity' => 'user_entity',
                    'Core\Entity\Acl' => 'core_acl',
                    'Core\Entity\Gearman' => 'core_gearman',
                    'Core\Entity\Logs' => 'core_logs',
                    'Core\Entity\Mail' => 'core_mail',
                    'Core\Entity\Oauth' => 'core_oauth',
                    'Core\Entity\Endereco' => 'core_endereco',
                    'Core\Entity\Projeto' => 'core_projeto',
                    'Core\Entity\Pessoa' => 'core_pessoa',
                    'Core\Entity\Servicos' => 'core_servicos',
                    'Core\Entity\Transacao' => 'core_transacao',
                    'Core\Entity\BatePapo' => 'core_batepapo',
                    'Core\Entity\Galeria' => 'core_galeria',
                ]
            ]
        ],
    ],
    'data-fixture' => [
        'fixtures' => __DIR__ . '/../src/V1/Fixture'
    ],
];
