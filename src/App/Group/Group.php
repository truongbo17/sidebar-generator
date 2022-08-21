<?php

namespace Bo\SideBar\App\Group;

class Group extends GroupAbstract
{
    public function __construct(string $id_group)
    {
        $this->group_id = $id_group;
        $this->type = 'group';
    }

    /**
     * Improve Item and render
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function render(): Group
    {
        $this->setRender(true);
        foreach ($this->getRequireField() as $type) {
            if (is_null($this->{$type})) {
                throw new \Exception("Input type \"{$type}\" for id group sidebar \"{$this->group_id}\" must not empty !");
            }
        }

        return $this;
    }

    /**
     * Remove item in array item_child by key
     *
     * @param int $key
     *
     * @return bool
     * */
    public function removeItemByKey(int $key): bool
    {
        if (!is_null($this->item_child) && array_key_exists($key, $this->item_child)) {
            unset($this->item_child[$key]);
            return true;
        }
        return false;
    }
}
