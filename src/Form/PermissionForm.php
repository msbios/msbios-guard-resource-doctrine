<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Form;

use MSBios\Guard\Resource\Doctrine\Form\Element\ResourceSelect;
use MSBios\Guard\Resource\Form\PermissionForm as DefaultPermissionForm;

/**
 * Class PermissionForm
 * @package MSBios\Guard\Resource\Doctrine\Form
 */
class PermissionForm extends DefaultPermissionForm
{
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
            'name' => 'resource'
        ]);

        return $this;
    }
}
