<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Resource\Doctrine\Entity as DefaultEntity;
use MSBios\Resource\Doctrine\IdentifierAwareTrait;

/**
 * Class Entity
 * @package MSBios\Resource\Doctrine
 * @ORM\MappedSuperclass
 */
abstract class Entity extends DefaultEntity
{
    /**
     * Fatal error: Uncaught ReflectionException: Property MSBios\Guard\Resource\Doctrine\Entity::$id does not exist
     */
    use IdentifierAwareTrait;
}
