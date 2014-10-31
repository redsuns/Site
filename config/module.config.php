<?php

namespace Site;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'index',
                        'action' => 'index'
                    ),
                ),
            ),
            // config de uma rota para uma página estática (para sobre nós, quem somos, perguntas e etc)
            'front-about-us' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/about-us', // acesso na url
                    'defaults' => array(
                        'controller' => 'pages',
                        'action'     => 'about-us',
                    ),
                ),
            ),            
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/layout'        => __DIR__ . '/../view/layout/layout.phtml',
            'front/index/index'    => __DIR__ . '/../view/front/index/index.phtml',
            'error/404'            => __DIR__ . '/../view/error/404.phtml',
            'error/index'          => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);