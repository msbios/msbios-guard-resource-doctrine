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
use MSBios\Guard\Resource\Doctrine\Entity\Role as RoleEntity;


/**
 * Class Role
 * @package MSBios\Guard\Resource\Doctrine\Fixture
 */
class Role implements FixtureInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /** @var RoleEntity $entity */
        $guest = new RoleEntity;
        $guest->setCode('GUEST');
        $guest->setName('Guest');

        $manager->persist($guest);
        $manager->flush();

        /** @var RoleEntity $entity */
        $user = new RoleEntity;
        $user->setParent($guest);
        $user->setCode('USER');
        $user->setName('User');

        $manager->persist($user);
        $manager->flush();

        /** @var RoleEntity $entity */
        $moderator = new RoleEntity;
        $moderator->setParent($user);
        $moderator->setCode('MODERATOR');
        $moderator->setName('Moderator');

        $manager->persist($moderator);
        $manager->flush();

        /** @var RoleEntity $entity */
        $admin = new RoleEntity;
        $admin->setParent($moderator);
        $admin->setCode('ADMIN');
        $admin->setName('Admin');

        $manager->persist($admin);
        $manager->flush();

        /** @var RoleEntity $entity */
        $superadmin = new RoleEntity;
        $superadmin->setParent($admin);
        $superadmin->setCode('SUPERADMIN');
        $superadmin->setName('Super Admin');

        $manager->persist($superadmin);
        $manager->flush();

        /** @var RoleEntity $entity */
        $developer = new RoleEntity;
        $developer->setParent($superadmin);
        $developer->setCode('DEVELOPER');
        $developer->setName('Developer');

        $manager->persist($developer);
        $manager->flush();

    }
}
