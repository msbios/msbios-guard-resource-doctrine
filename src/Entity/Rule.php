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
 * Class Rule
 * @package MSBios\Guard\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="acl_t_rules")
 * @ORM\MappedSuperclass
 */
class Rule extends Entity implements
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{
    use TimestampableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * Many Rules have Many Roles.
     *
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(
     *     name="acl_t_rules_roles",
     *     joinColumns={@ORM\JoinColumn(name="ruleid", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="roleid", referencedColumnName="id")}
     * )
     */
    private $roles;

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
     * Many Rule Rersource have Many Permissions.
     *
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Permission")
     * @ORM\JoinTable(
     *     name="acl_t_rules_permissions",
     *     joinColumns={@ORM\JoinColumn(name="ruleid", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="permissionid", referencedColumnName="id")}
     * )
     */
    private $permissions;

    /**
     * @var string
     *
     * @ORM\Column(name="access", type="rule_type", nullable=false)
     */
    private $access = \MSBios\Guard\Resource\Record\Rule::ACCESS_ALLOW;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(name="raw", type="json_array", nullable=true)
     */
    private $raw = [];

    /**
     * Rule constructor.
     */
    public function __construct()
    {
        $this->roles = new ArrayCollection;
        $this->permissions = new ArrayCollection;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return Resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param Resource $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param mixed $permissions
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return string
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param string $access
     */
    public function setAccess($access)
    {
        $this->access = $access;
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

    /**
     * @return array
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param array $raw
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }
}
