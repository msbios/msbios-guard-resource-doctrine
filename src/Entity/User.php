<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use MSBios\Authentication\IdentityInterface;
use MSBios\Guard\Resource\Doctrine\Entity;
use MSBios\Guard\Resource\Doctrine\UserInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class User
 * @package MSBios\Guard\Resource\Doctrine\Entity
 *
 * @ORM\Table(name="acl_t_users")
 * @ORM\MappedSuperclass
 */
class User extends Entity implements
    UserInterface,
    IdentityInterface,
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{

    use TimestampableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=200, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=200, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=200, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email;

    /**
     * @var string
     * @todo BCrypt === 60 letters
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true)
     */
    private $password;

    /** @const */
    const STATE_ACTIVE = 'ACTIVE';
    const STATE_INACTIVE = 'INACTIVE';

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=8, nullable=false)
     */
    private $state = 'ACTIVE';

    /** @const */
    const TYPE_REGULAR = 'REGULAR';
    const TYPE_SYSTEM = 'SYSTEM';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=8, nullable=false)
     */
    private $type = self::TYPE_REGULAR;

    /**
     * @var string
     *
     * @ORM\Column(name="options", type="json_array", nullable=true)
     */
    private $options = [];

    /**
     * Many Users have Many Roles.
     *
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(
     *     name="acl_t_users_roles",
     *     joinColumns={@ORM\JoinColumn(name="userid", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="roleid", referencedColumnName="id")}
     * )
     */
    private $roles;

    public function init()
    {
        parent::init();
        $this->roles = new ArrayCollection;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param string $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param Collection $roles
     * @return $this
     */
    public function addRoles(Collection $roles)
    {
        /** @var Role $role */
        foreach ($roles as $role) {
            $this->addRole($role);
        }
        return $this;
    }

    /**
     * @param Role $role
     * @return $this
     */
    public function addRole(Role $role)
    {
        $this->roles->add($role);
        return $this;
    }

    /**
     * @param Collection $roles
     * @return $this
     */
    public function removeRoles(Collection $roles)
    {
        foreach ($roles as $role) {
            $this->removeRole($role);
        }
        return $this;
    }

    /**
     * @param Role $role
     * @return $this
     */
    public function removeRole(Role $role)
    {
        $this->roles->removeElement($role);
        return $this;
    }
}
