<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Form;

use MSBios\Resource\Initializer\LazyFormAwareInterface;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Form;

/**
 * Class UserForm
 * @package MSBios\Guard\Resource\Form
 */
class UserForm extends Form implements LazyFormAwareInterface
{
    /**
     * UserForm constructor.
     * @param int|null|string $name
     * @param array $options
     */
    public function __construct($name = __CLASS__, array $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'type' => Text::class,
            'name' => 'username'
        ])->add([
            'type' => Text::class,
            'name' => 'firstname'
        ])->add([
            'type' => Text::class,
            'name' => 'lastname'
        ])->add([
            'type' => Text::class,
            'name' => 'email'
        ])->add([
            'type' => Password::class,
            'name' => 'password'
        ])->add([
            'type' => Password::class,
            'name' => 'confirm'
        ])->add([
            'type' => Text::class,
            'name' => 'state'
        ]);
    }
}
