<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Form;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Form\Doctrine\ObjectManagerAwareTrait;
use MSBios\Guard\Resource\Doctrine\Form\Element\ResourceSelect;
use MSBios\Guard\Resource\Form\PermissionForm as DefaultPermissionForm;

/**
 * Class PermissionForm
 * @package MSBios\Guard\Resource\Doctrine\Form
 */
class PermissionForm extends DefaultPermissionForm implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;

    public function init()
    {
        parent::init();
        $this->add([
            'type' => ResourceSelect::class,
            'name' => 'resource'
        ]);
    }
}
