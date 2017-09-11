<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Fixture;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineDataFixtureModule\ContainerAwareInterface;
use DoctrineDataFixtureModule\ContainerAwareTrait;
use MSBios\Guard\Resource\Doctrine\Entity\User as UserEntity;

/**
 * Class User
 * @package MSBios\Guard\Resource\Doctrine\Fixture
 */
class User implements FixtureInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /** @var UserEntity $entity */
        $entity = $manager->getRepository(UserEntity::class)
            ->findByUsername('developer');

        if (! $entity) {
            /** @var UserEntity $entity */
            $entity = new UserEntity;
            $entity->setUsername('developer');
            $entity->setFirstname('Judzhin');
            $entity->setLastname('Miles');
            $entity->setEmail('info@msbios.com');
            $entity->setPassword('$2a$04$iGrokx9ytH/WTC6UDHKA5eIx0MQl9CTqUi2Z6LywjhQDfBGIMDmv6');
            $entity->setState('ACTIVE');
            $entity->setRowstatus(1);

            $manager->persist($entity);
            $manager->flush();
        }
    }
}
