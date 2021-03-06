<?php

return array(
    'router' => array(
        'routes' => array(
            'atendimento' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/atendimento/:action[/:id][/:aux]',
                    'defaults' => array(
                        'controller' => 'atendimento',
                        'action'     => 'index',
                    ),
                ),
            ),
            'atendimento-atendimento' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/atendimento-atendimento/:action[/:id][/:aux]',
                    'defaults' => array(
                        'controller' => 'atendimento-atendimento',
                        'action'     => 'index',
                    ),
                ),

            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'atendimento' => 'Atendimento\Controller\AtendimentoController',
            'atendimento-atendimento' => 'Atendimento\Controller\AtendimentoController',

        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
