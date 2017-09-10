<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MSBios\Guard\Resource\Doctrine\Entity;

/**
 * Class Resource
 * @package MSBios\Guard\Resource\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="acl_t_resources")
 * @ORM\MappedSuperclass
 */
class Resource extends Entity
{
    /**
     * @var Resource
     *
     * @ORM\ManyToOne(targetEntity="Resource")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pid", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Resource", mappedBy="parent")
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
     * Resource constructor.
     */
    public function __construct()
    {
        $this->children = new ArrayCollection;
    }

    /**
     * @return Resource
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Resource $parent
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