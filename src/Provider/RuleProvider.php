<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\Resource\Doctrine\Provider;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use MSBios\Guard\Provider\ProviderInterface;
use MSBios\Guard\Provider\RuleProviderInterface;
use MSBios\Guard\Resource\Doctrine\Entity\Rule;

/**
 * Class RuleProvider
 * @package MSBios\Guard\Resource\Doctrine\Provider
 */
class RuleProvider implements RuleProviderInterface, ProviderInterface, ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    /** @var array */
    protected $rules = [
        'allow' => [],
        'deny' => [],
    ];

    /**
     * @var bool
     */
    protected $initialized = false;

    /**
     * RuleProvider constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
    }

    /**
     * Initialize the collection
     *
     * @return void
     */
    protected function initialize()
    {
        if (! $this->initialized) {
            $this->doInitialize();
            $this->initialized = true;
        }
    }

    /**
     * @void
     */
    protected function doInitialize()
    {
        /** @var array $results */
        $results = $this->dem
            ->getRepository(Rule::class)
            ->findAll();

        /** @var Rule $entity */
        foreach ($results as $entity) {

            /** @var array $rule */
            $rule = [];

            /** @var array $roles */
            $roles = [];

            /** @var Role $role */
            foreach ($entity->getRoles() as $role) {
                $roles[] = $role->getCode();
            }

            $rule[] = $roles;
            $rule[] = $entity->getResource()
                ->getCode();

            /** @var array $permissions */
            $permissions = [];

            /** @var Permission $permission */
            foreach ($entity->getPermissions() as $permission) {
                $permissions[] = $permission->getCode();
            }

            $rule[] = $permissions;

            $this->rules[mb_strtolower($entity->getAccess())][] = $rule;
        }
    }

    /**
     * @return array|mixed
     */
    public function getRules()
    {
        $this->initialize();
        return $this->rules;
    }
}
