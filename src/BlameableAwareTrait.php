<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */
namespace MSBios\Guard\Resource\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait BlameableAwareTrait
 * @package MSBios\Guard\Resource\Doctrine
 */
trait BlameableAwareTrait
{
    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="MSBios\Guard\Resource\Doctrine\UserInterface")
     * @ORM\JoinColumn(name="createdby", referencedColumnName="id")
     */
    private $creator;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="MSBios\Guard\Resource\Doctrine\UserInterface")
     * @ORM\JoinColumn(name="modifiedby", referencedColumnName="id")
     */
    private $editor;

    /**
     * @return UserInterface
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param UserInterface $creator
     * @return $this
     */
    public function setCreator(UserInterface $creator)
    {
        $this->creator = $creator;
        return $this;
    }

    /**
     * @return UserInterface
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @param UserInterface $editor
     * @return $this
     */
    public function setEditor(UserInterface $editor)
    {
        $this->editor = $editor;
        return $this;
    }
}
