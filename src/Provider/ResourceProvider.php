<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Provider;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\PersistentCollection;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use MSBios\Guard\Provider\ProviderInterface;
use MSBios\Guard\Provider\ResourceProviderInterface;
use MSBios\Guard\Resource\Doctrine\Entity\Resource as ResourceEntity;
use MSBios\Permissions\Acl\Resource\Resource;
use Zend\Stdlib\ArrayUtils;

/**
 * Class ResourceProvider
 * @package MSBios\Guard\Resource\Doctrine\Provider
 */
class ResourceProvider implements ResourceProviderInterface, ProviderInterface, ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    /** @var Resource[] */
    protected $resources;

    /**
     * ResourceProvider constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
    }

    /**
     * @param ResourceEntity $entity
     * @param PersistentCollection $children
     * @param Resource|null $parent
     * @return array
     */
    protected function loadResource(ResourceEntity $entity, PersistentCollection $children, Resource $parent = null)
    {
        /** @var array $resources */
        $resources = [];

        /** @var Resource $resource */
        $resource = new Resource($entity->getCode(), $parent);
        $resources[] = $resource;

        if ($children->count()) {
            /** @var ResourceEntity $child */
            foreach ($children as $child) {
                $resources = ArrayUtils::merge(
                    $resources,
                    $this->loadResource($child, $child->getChildren(), $resource)
                );
            }
        }

        return $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        if (is_null($this->resources)) {

            /** @var array $results */
            $results = $this->dem
                ->getRepository(ResourceEntity::class)
                ->findByParent(null);

            /** @var array $resources */
            $resources = [];

            /** @var ResourceEntity $entity */
            foreach ($results as $entity) {
                $resources = ArrayUtils::merge($resources, $this->loadResource(
                    $entity,
                    $entity->getChildren()
                ));
            }

            $this->resources = $resources;
        }

        return $this->resources;
    }
}
