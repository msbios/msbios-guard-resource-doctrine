<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use MSBios\Guard\Resource\Provider\ResourceProvider;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ResourceProviderFactory
 * @package MSBios\Guard\Resource\Doctrine\Factory
 */
class ResourceProviderFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ResourceProvider
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ResourceProvider(
            $container->get(EntityManager::class)
        );
    }
}
