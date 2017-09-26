<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Form\Element;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Form\Doctrine\ObjectManagerAwareTrait;
use MSBios\Guard\Resource\Doctrine\Entity\Resource;

/**
 * Class ResourceSelect
 * @package MSBios\Guard\Resource\Doctrine\Form\Element
 */
class ResourceSelect extends ObjectSelect implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;

    public function init()
    {
        $this->getProxy()->setOptions([
            'object_manager' => $this->getObjectManager(),
            'target_class' => Resource::class,
            'property' => 'name',
            'display_empty_item' => true,
            'empty_item_label' => '---',
        ]);
    }
}