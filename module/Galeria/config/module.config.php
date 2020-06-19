<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Galeria\\V1\\Rest\\Obras\\ObrasResource' => 'Galeria\\V1\\Rest\\Obras\\ObrasResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'galeria.rest.obras' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/obras[/:obras_id]',
                    'defaults' => array(
                        'controller' => 'Galeria\\V1\\Rest\\Obras\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'galeria.rest.obras',
        ),
    ),
    'zf-rest' => array(
        'Galeria\\V1\\Rest\\Obras\\Controller' => array(
            'listener' => 'Galeria\\V1\\Rest\\Obras\\ObrasResource',
            'route_name' => 'galeria.rest.obras',
            'route_identifier_name' => 'obras_id',
            'collection_name' => 'obras',
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
            'entity_class' => 'Galeria\\V1\\Rest\\Obras\\ObrasEntity',
            'collection_class' => 'Galeria\\V1\\Rest\\Obras\\ObrasCollection',
            'service_name' => 'obras',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Galeria\\V1\\Rest\\Obras\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Galeria\\V1\\Rest\\Obras\\Controller' => array(
                0 => 'application/vnd.galeria.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Galeria\\V1\\Rest\\Obras\\Controller' => array(
                0 => 'application/vnd.galeria.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Galeria\\V1\\Rest\\Obras\\ObrasEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'galeria.rest.obras',
                'route_identifier_name' => 'obras_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Galeria\\V1\\Rest\\Obras\\ObrasCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'galeria.rest.obras',
                'route_identifier_name' => 'obras_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Galeria\\V1\\Rest\\Obras\\Controller' => array(
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
        'Galeria\\V1\\Rest\\Obras\\Controller' => array(
            'input_filter' => 'Galeria\\V1\\Rest\\Obras\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Galeria\\V1\\Rest\\Obras\\Validator' => array(
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
                'name' => 'img',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nome',
            ),
            3 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'artista',
            ),
            4 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'descricao',
            ),
            5 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'likes',
            ),
            6 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'iduser',
            ),
        ),
    ),
);
