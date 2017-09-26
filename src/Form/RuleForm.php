<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Form;

use MSBios\Guard\Resource\Doctrine\Form\Element\ResourceSelect;
use MSBios\Guard\Resource\Form\RuleForm as DefaultRuleForm;

/**
 * Class RuleForm1
 * @package MSBios\Guard\Resource\Doctrine\Form
 */
class RuleForm1 extends DefaultRuleForm
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