<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Form;

use MSBios\Guard\Resource\Doctrine\Form\Element\ResourceSelect;
use MSBios\Guard\Resource\Form\RuleForm as DefaultRuleForm;

/**
 * Class RuleForm
 * @package MSBios\Guard\Resource\Doctrine\Form
 */
class RuleForm extends DefaultRuleForm
{
    /**
     *
     */
    public function init()
    {
        parent::init();

        $this->add([
            'type' => ResourceSelect::class,
            'name' => 'resource'
        ]);
    }
}
