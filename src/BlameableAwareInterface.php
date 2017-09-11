<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */
namespace MSBios\Guard\Resource\Doctrine;

/**
 * Interface BlameableAwareInterface
 * @package MSBios\Guard\Resource\Doctrine
 */
interface BlameableAwareInterface
{
    /**
     * @return UserInterface
     */
    public function getCreator();

    /**
     * @param UserInterface $creator
     * @return $this
     */
    public function setCreator(UserInterface $creator);

    /**
     * @return UserInterface
     */
    public function getEditor();

    /**
     * @param UserInterface $editor
     * @return $this
     */
    public function setEditor(UserInterface $editor);
}
