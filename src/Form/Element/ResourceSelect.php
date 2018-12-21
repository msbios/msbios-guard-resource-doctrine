<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Guard\Resource\Doctrine\Form\Element;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use MSBios\Guard\Resource\Doctrine\Entity\Resource;

/**
 * Class ResourceSelect
 * @package MSBios\Guard\Resource\Doctrine\Form\Element
 */
class ResourceSelect extends ObjectSelect implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    /**
     * ResourceSelect constructor.
     *
     * @param ObjectManager $objectManager
     * @param null $name
     * @param array $options
     */
    public function __construct(ObjectManager $objectManager, $name = null, array $options = [])
    {
        parent::__construct($name, $options);
        $this->setObjectManager($objectManager);
        $this->init();
    }

    /**
     * @inheritdoc
     *
     * @return $this|void
     */
    public function init()
    {
        parent::init();

        $this->getProxy()->setOptions([
            'object_manager' => $this->getObjectManager(),
            'target_class' => Resource::class,
            'property' => 'name',
            'display_empty_item' => true,
            'empty_item_label' => '---',
        ]);

        return $this;
    }
}
