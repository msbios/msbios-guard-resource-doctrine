<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Form;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Form\Doctrine\ObjectManagerAwareTrait;
use MSBios\Guard\Resource\Doctrine\Entity\Role;
use MSBios\Guard\Resource\Form\ResourceForm as DefaultRecourceForm;

/**
 * Class RoleForm
 * @package MSBios\Guard\Resource\Doctrine\Form
 */
class RoleForm extends DefaultRecourceForm implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;

    /**
     *
     */
    public function init()
    {
        parent::init();

        $this->add([
            'type' => ObjectSelect::class,
            'name' => 'parent',
            'options' => [
                'object_manager' => $this->getObjectManager(),
                'target_class' => Role::class,
                'property' => 'name',
                'display_empty_item' => true,
                'empty_item_label' => '---',
                'allow_empty' => true
            ],
        ]);
    }
}
