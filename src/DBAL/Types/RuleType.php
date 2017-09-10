<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */

namespace MSBios\Guard\Resource\Doctrine\DBAL\Types;

use MSBios\Doctrine\DBAL\Types\EnumType;
use MSBios\Guard\Resource\Record\Rule;

/**
 * Class RuleType
 * @package MSBios\Guard\Resource\Doctrine\DBAL\Types
 */
class RuleType extends EnumType
{
    /** @const NAME */
    const NAME = 'rule_type';

    /**
     * @return array
     */
    public function getValues()
    {
        return [
            Rule::ACCESS_ALLOW,
            Rule::ACCESS_DENY
        ];
    }

    /**
     * Gets the name of this type.
     *
     * @return string
     *
     * @todo Needed?
     */
    public function getName()
    {
        return self::NAME;
    }
}
