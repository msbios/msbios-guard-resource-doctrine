<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine;

/**
 * Class Module
 * @package MSBios\Guard\Resource\Doctrine
 */
class Module extends \MSBios\Module
{
    /** @const VERSION */
    const VERSION = '1.0.41';

    /**
     * @inheritdoc
     *
     * @return string
     */
    protected function getDir()
    {
        return __DIR__;
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    protected function getNamespace()
    {
        return __NAMESPACE__;
    }
}
