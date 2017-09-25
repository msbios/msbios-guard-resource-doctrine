<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Form;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Form\Doctrine\ObjectManagerAwareTrait;
use MSBios\Guard\Resource\Doctrine\Entity\Resource;
use MSBios\Guard\Resource\Form\ResourceForm as DefaultRecourceForm;

/**
 * Class ResourceForm
 * @package MSBios\Guard\Resource\Doctrine\Form
 */
class ResourceForm extends DefaultRecourceForm implements ObjectManagerAwareInterface
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
                'target_class' => Resource::class,
                'property' => 'name',
                'display_empty_item' => true,
                'empty_item_label' => '---',
            ],
        ]);

    }

}