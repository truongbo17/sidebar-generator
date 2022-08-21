<?php

namespace Bo\SideBar\App\Item;

class Item extends ItemAbstract
{
    public function __construct(string $id_item)
    {
        $this->id_item = $id_item;
        $this->type = 'item';
    }

    /**
     * Improve Item and render
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function render(): Item
    {
        $this->setRender(true);
        foreach ($this->getRequireField() as $type) {
            if (is_null($this->{$type})) {
                throw new \Exception("Input type \"{$type}\" for id item sidebar \"{$this->id_item}\" must not empty !");
            }
        }

        return $this;
    }
}
