<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MSBios\Guard\Resource\Doctrine\Entity;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Role
 * @package MSBios\Guard\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="acl_t_roles")
 * @ORM\MappedSuperclass
 */
class Role extends Entity implements
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{

    use TimestampableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var Role
     *
     * @ORM\ManyToOne(targetEntity="MSBios\Guard\Resource\Doctrine\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pid", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Role", mappedBy="parent")
     */
    private $children;

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
     * Role constructor.
     */
    public function __construct()
    {
        $this->children = new ArrayCollection;
    }

    /**
     * @return Role
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Role $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param ArrayCollection $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
