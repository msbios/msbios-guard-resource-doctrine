<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Form;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Doctrine\ObjectManagerAwareTrait;
use MSBios\Guard\Resource\Doctrine\Entity\Role;
use MSBios\Guard\Resource\Form\UserForm as DefaultUserForm;
use MSBios\Guard\Resource\InputFilter\UserInputFilter;
use Zend\InputFilter\InputFilterInterface;

/**
 * Class UserForm
 * @package MSBios\Guard\Resource\Doctrine\Form
 */
class UserForm extends DefaultUserForm implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;

    /**
     * @return $this
     */
    public function init()
    {
        parent::init();

        $this->add([
            'type' => ObjectSelect::class,
            'name' => 'roles',
            'options' => [
                'object_manager' => $this->getObjectManager(),
                'target_class' => Role::class,
                'property' => 'name',
                'empty_item_label' => '---',
                'allow_empty' => true,
                'required' => false
            ],
            'attributes' => [
                'multiple' => 'multiple',
            ],
        ]);

        /** @TODO: Need call from InputFilterManager */
        /** @var InputFilterInterface $inputFilter */
        $inputFilter = new UserInputFilter;
        $inputFilter->init();
        $this->setInputFilter($inputFilter);

        return $this;
    }
}
