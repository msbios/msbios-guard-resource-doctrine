<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'types' => [
                    DBAL\Types\RuleType::NAME =>
                        DBAL\Types\RuleType::class
                ],
            ],
        ],
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            Module::class => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ],
            ],

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => [
                'drivers' => [
                    Entity::class => Module::class
                ]
            ],
        ],
        'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    UserInterface::class => Entity\User::class
                ],
            ],
        ],
        'fixture' => [
            Module::class => __DIR__ . '/../src/Fixture',
        ]
    ],

    'service_manager' => [
        'factories' => [
            Provider\ResourceProvider::class =>
                Factory\ResourceProviderFactory::class,
            Provider\RuleProvider::class =>
                Factory\RuleProviderFactory::class,
        ]
    ],

    'input_filters' => [
        'factories' => [
            InputFilter\ResourceInputFilter::class =>
                InvokableFactory::class,
            InputFilter\RoleInputFilter::class =>
                InvokableFactory::class
        ],
        'aliases' => [
            Form\ResourceForm::class =>
                InputFilter\ResourceInputFilter::class,
            Form\RoleForm::class =>
                InputFilter\RoleInputFilter::class,
            Form\UserForm::class =>
                \MSBios\Guard\Resource\InputFilter\UserInputFilter::class
        ]
    ],

    'form_elements' => [
        'factories' => [
            // Forms
            Form\PermissionForm::class =>
                InvokableFactory::class,
            Form\ResourceForm::class =>
                InvokableFactory::class,
            Form\RoleForm::class =>
                InvokableFactory::class,
            Form\RuleForm::class =>
                InvokableFactory::class,
            Form\UserForm::class =>
                InvokableFactory::class,

            // Elements
            Form\Element\ResourceSelect::class =>
                InvokableFactory::class
        ],
        'aliases' => [
            \MSBios\Guard\Resource\Form\PermissionForm::class =>
                Form\PermissionForm::class,
            \MSBios\Guard\Resource\Form\ResourceForm::class =>
                Form\ResourceForm::class,
            \MSBios\Guard\Resource\Form\RoleForm::class =>
                Form\RoleForm::class,
            \MSBios\Guard\Resource\Form\RuleForm::class =>
                Form\RuleForm::class,
            \MSBios\Guard\Resource\Form\UserForm::class =>
                Form\UserForm::class
        ]
    ],

    'hydrators' => [
        'aliases' => [
            \MSBios\Guard\Resource\Form\UserForm::class =>
                \DoctrineModule\Stdlib\Hydrator\DoctrineObject::class
        ]
    ],

    \MSBios\Guard\Module::class => [
        'resource_providers' => [
            Provider\ResourceProvider::class
        ],
        'rule_providers' => [
            Provider\RuleProvider::class
        ],
    ],
];
