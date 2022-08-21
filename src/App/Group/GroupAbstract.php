<?php

namespace Bo\SideBar\App\Group;

use Bo\SideBar\App\DefaultAbstract;
use Bo\SideBar\App\Item\ItemAbstract;

abstract class GroupAbstract extends DefaultAbstract implements GroupInterface
{
    /**
     * @var string|null $group_id
     * Require and primary key
     * */
    protected ?string $group_id = null;

    /**
     * @var string|null $label
     * Require , label name of sidebar group
     * */
    protected ?string $label = null;

    /**
     * @var string|null $style_css
     * don't require , custom css for group sidebar
     * */
    protected ?string $style_css = null;

    /**
     * @var string|null $class
     * don't require , custom class for group sidebar
     * */
    protected ?string $class = null;

    /**
     * @var int|null $position
     * Require , the display position of the group sidebar (for the whole in group) . It will be sorted from type 0-99
     * */
    protected ?int $position = null;

    /**
     * @var string|null $route
     * Require , Icon for group sidebar
     * */
    protected ?string $icon = null;

    /**
     * @var array|null $item_child
     * Item child for group
     * */
    protected ?array $item_child = null;

    /**
     * Check render
     * */
    private bool $render = false;

    /**
     * @var array $require_types
     * Field type require
     * */
    private array $require_types = [
        'group_id',
        'label',
        'position',
        'icon'
    ];

    /**
     * Set label for group sidebar (require)
     *
     * @param string $label
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setLabel(string $label): Group
    {
        $this->label = $this->checkEmptyInput('label', $label);
        return $this;
    }

    /**
     * Set custom style css for group sidebar
     *
     * @param string $style_css
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setStyleCss(string $style_css): Group
    {
        $this->style_css = $this->checkEmptyInput('style_css', $style_css);
        return $this;
    }

    /**
     * Set custom class for group sidebar
     *
     * @param string $class
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setClass(string $class): Group
    {
        $this->class = $this->checkEmptyInput('class', $class);
        return $this;
    }

    /**
     * Set position for group sidebar (require)
     *
     * @param int $position
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setPosition(int $position): Group
    {
        $this->position = $this->checkNumberInput('position', $position);
        return $this;
    }

    /**
     * Set position for group sidebar (require)
     *
     * @param ItemAbstract $item
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setChildItem(ItemAbstract $item): Group
    {
        $this->item_child[] = $item;
        return $this;
    }

    /**
     * Set icon for group sidebar (require)
     *
     * @param string $icon
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setIcon(string $icon): Group
    {
        $this->icon = $this->checkEmptyInput('icon', $icon);
        return $this;
    }

    /**
     * Set condition render for group sidebar
     *
     * @param bool $render
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setRender(bool $render): Group
    {
        $this->render = $render;
        return $this;
    }

    /**
     * Get id group sidebar
     *
     * @return string
     * */
    public function getIdGroup(): ?string
    {
        return $this->group_id;
    }

    /**
     * Get id group sidebar
     *
     * @return array
     * */
    public function getChildItem(): ?array
    {
        return $this->item_child;
    }

    /**
     * Get label group sidebar
     *
     * @return string
     * */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * Get style_css group sidebar
     *
     * @return string
     * */
    public function getStyleCss(): ?string
    {
        return $this->style_css;
    }

    /**
     * Get class group sidebar
     *
     * @return string
     * */
    public function getClass(): ?string
    {
        return $this->class;
    }

    /**
     * Get position group sidebar
     *
     * @return string
     * */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * Get icon group sidebar
     *
     * @return string
     * */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * Get position group sidebar
     *
     * @return bool
     * */
    public function getRender(): bool
    {
        return $this->render;
    }

    /**
     * Get require field group sidebar
     *
     * @return array
     * */
    public function getRequireField(): array
    {
        return $this->require_types;
    }
}
