<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\InputFilter;

use Zend\InputFilter\InputFilter;

/**
 * Class ResourceInputFilter
 * @package MSBios\Guard\Resource\Doctrine\InputFilter
 */
class ResourceInputFilter extends InputFilter
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
            'name' => 'code',
            'required' => true,
        ])->add([
            'name' => 'name',
            'required' => true,
        ])->add([
            'name' => 'parent',
            'required' => false,
        ]);

        return $this;
    }
}
