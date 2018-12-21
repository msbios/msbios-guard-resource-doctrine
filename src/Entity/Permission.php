<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Guard\Resource\Doctrine\Entity;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Permission
 * @package MSBios\Guard\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="acl_t_permissions")
 * @ORM\MappedSuperclass
 */
class Permission extends Entity implements TimestampableAwareInterface
{
    use TimestampableAwareTrait;

    /**
     * @var Resource
     *
     * @ORM\ManyToOne(targetEntity="Resource")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resourceid", referencedColumnName="id")
     * })
     */
    private $resource;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=200, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @return Resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param $resource
     * @return $this
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
