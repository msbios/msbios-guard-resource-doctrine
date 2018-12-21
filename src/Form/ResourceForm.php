<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Form;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use MSBios\Guard\Resource\Doctrine\Form\Element\ResourceSelect;
use MSBios\Guard\Resource\Form\ResourceForm as DefaultRecourceForm;

/**
 * Class ResourceForm
 * @package MSBios\Guard\Resource\Doctrine\Form
 */
class ResourceForm extends DefaultRecourceForm implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    /**
     * @inheritdoc
     *
     * @return $this|void
     */
    public function init()
    {
        parent::init();

        $this->add([
            'type' => ResourceSelect::class,
            'name' => 'parent',
            'options' => [
                'allow_empty' => true
            ],
        ]);

        return $this;
    }
}
