<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Mensagens\\V1\\Rest\\Comentarios\\ComentariosResource' => 'Mensagens\\V1\\Rest\\Comentarios\\ComentariosResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'mensagens.rest.comentarios' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/comentarios[/:comentarios_id]',
                    'defaults' => array(
                        'controller' => 'Mensagens\\V1\\Rest\\Comentarios\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'mensagens.rest.comentarios',
        ),
    ),
    'zf-rest' => array(
        'Mensagens\\V1\\Rest\\Comentarios\\Controller' => array(
            'listener' => 'Mensagens\\V1\\Rest\\Comentarios\\ComentariosResource',
            'route_name' => 'mensagens.rest.comentarios',
            'route_identifier_name' => 'comentarios_id',
            'collection_name' => 'comentarios',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Mensagens\\V1\\Rest\\Comentarios\\ComentariosEntity',
            'collection_class' => 'Mensagens\\V1\\Rest\\Comentarios\\ComentariosCollection',
            'service_name' => 'comentarios',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Mensagens\\V1\\Rest\\Comentarios\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Mensagens\\V1\\Rest\\Comentarios\\Controller' => array(
                0 => 'application/vnd.mensagens.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Mensagens\\V1\\Rest\\Comentarios\\Controller' => array(
                0 => 'application/vnd.mensagens.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Mensagens\\V1\\Rest\\Comentarios\\ComentariosEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'mensagens.rest.comentarios',
                'route_identifier_name' => 'comentarios_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Mensagens\\V1\\Rest\\Comentarios\\ComentariosCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'mensagens.rest.comentarios',
                'route_identifier_name' => 'comentarios_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Mensagens\\V1\\Rest\\Comentarios\\Controller' => array(
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Mensagens\\V1\\Rest\\Comentarios\\Controller' => array(
            'input_filter' => 'Mensagens\\V1\\Rest\\Comentarios\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Mensagens\\V1\\Rest\\Comentarios\\Validator' => array(
            0 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'id',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'obraid',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'obra',
            ),
            3 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'userid',
            ),
            4 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'mensagem',
            ),
            5 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'user',
            ),
        ),
    ),
);
