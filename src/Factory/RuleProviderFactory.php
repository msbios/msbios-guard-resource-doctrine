<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use MSBios\Guard\Resource\Doctrine\Provider\RuleProvider;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class RuleProviderFactory
 * @package MSBios\Guard\Resource\Doctrine\Factory
 */
class RuleProviderFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return RuleProvider
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RuleProvider(
            $container->get(EntityManager::class)
        );
    }
}
