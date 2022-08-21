<?php

namespace Bo\SideBar\App;

use Bo\SideBar\App\Group\Group;
use Bo\SideBar\App\Item\Item;
use Exception;

class SideBar
{
    public static array $list_item_sidebar;

    public static array $list_group_sidebar;

    public function __construct(array $list_item_sidebar = [], array $list_group_sidebar = [])
    {
        self::$list_item_sidebar = $list_item_sidebar;
        self::$list_group_sidebar = $list_group_sidebar;
    }

    /**
     * Function register item sidebar with option
     *
     * @param string $id_item
     * @return Item
     * @throws Exception
     */
    public function registerItem(string $id_item): Item
    {
        if (!$this->checkExist($id_item, 'item') && mb_strlen($id_item) > 0) {
            $item_sidebar = new Item($id_item);
            self::$list_item_sidebar[] = $item_sidebar;
            return $item_sidebar;
        } else {
            throw new Exception("Id item '{$id_item}' in Sidebar dashboard is exist or empty !");
        }
    }

    /**
     * Function register group sidebar with option
     *
     * @param string $id_group
     * @return Group
     * @throws Exception
     */
    public function registerGroup(string $id_group): Group
    {
        if (!$this->checkExist($id_group, 'group') && mb_strlen($id_group) > 0) {
            $group_sidebar = new Group($id_group);
            self::$list_group_sidebar[] = $group_sidebar;
            return $group_sidebar;
        } else {
            throw new Exception("Id group '{$id_group}' in Sidebar dashboard is exist or empty !");
        }
    }

    /**
     * Get list item has group
     *
     * @return array
     * */
    public function getListItemHasGroup(): array
    {
        $sidebar_has_group = [];
        $sidebar_no_has_group = [];
        foreach (self::$list_item_sidebar as $item_sidebar) {
            // Remove item sidebar don't render
            if ($item_sidebar->getRender()) {
                if (!is_null($item_sidebar->getGroupId())) {
                    $sidebar_has_group[] = $item_sidebar;
                } else {
                    $sidebar_no_has_group[] = $item_sidebar;
                }
            }
        }
        return [
            'sidebar_has_group'    => $sidebar_has_group,
            'sidebar_no_has_group' => $sidebar_no_has_group,
        ];
    }

    /**
     * Get list group including item
     *
     * @param array $item_has_group
     *
     * @return array
     *
     * @throws Exception
     */
    public function getListGroup(array $item_has_group): array
    {
        $array_group = array_filter(array_map(function ($value) {
            if ($value->getRender()) return $value->getIdGroup();
        }, self::$list_group_sidebar));

        foreach ($item_has_group as $item_sidebar) {
            if (!in_array($item_sidebar->getGroupId(), $array_group)) {
                throw new \Exception("Id item \"{$item_sidebar->getIdItem()}\" no matching group id \"{$item_sidebar->getGroupId()}\" Or This group \"{$item_sidebar->getGroupId()}\" hasn't been rendered yet");
            }
            foreach (self::$list_group_sidebar as $group_sidebar) {
                if ($item_sidebar->getGroupId() === $group_sidebar->getIdGroup()) {
                    if (is_null($group_sidebar->getChildItem())) {
                        $group_sidebar->setChildItem($item_sidebar);
                    } else {
                        // Get position last_item
                        $key_last_item = array_key_last($group_sidebar->getChildItem());
                        $last_item = $group_sidebar->getChildItem()[$key_last_item];
                        $position_last_item = $last_item->getPosition();

                        // Get position item_current
                        $position_item_current = $item_sidebar->getPosition();

                        // If position item_current less position last_item then swap positions item
                        if ($position_item_current < $position_last_item) {
                            // remove element last item
                            $group_sidebar->removeItemByKey($key_last_item);
                            // set new item
                            $group_sidebar->setChildItem($item_sidebar);
                            $group_sidebar->setChildItem($last_item);
                        } else {
                            $group_sidebar->setChildItem($item_sidebar);
                        }
                    }
                }
            }
        }
        return self::$list_group_sidebar;
    }

    /**
     * Render item and group sidebar with condition render equal true
     *
     * @return array
     * @throws Exception
     */
    public function getAll(): array
    {
        $sidebar_item = $this->getListItemHasGroup();
        $group_sidebar = $this->getListGroup($sidebar_item['sidebar_has_group']);

        $sidebar = array_merge($sidebar_item['sidebar_no_has_group'], $group_sidebar);
        usort($sidebar, function ($a, $b) {
            return $a->getPosition() - $b->getPosition();
        });

        return $sidebar;
    }

    /**
     * Check exist item and group in sidebar
     *
     * @param string $id
     * @param string $type (item | group)
     *
     * @return bool
     *
     * @throws Exception
     */
    public function checkExist(string $id, string $type): bool
    {
        if ($type == 'item') {
            foreach (self::$list_item_sidebar as $item_sidebar) {
                if ($item_sidebar->getIdItem() === $id) return true;
            }
            return false;
        } elseif ($type == 'group') {
            foreach (self::$list_group_sidebar as $group_sidebar) {
                if ($group_sidebar->getIdGroup() === $id) return true;
            }
            return false;
        } else {
            throw new Exception("Type of sidebar must item or group !");
        }
    }
}
