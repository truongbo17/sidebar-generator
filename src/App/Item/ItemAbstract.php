<?php

namespace Bo\SideBar\App\Item;

use Bo\SideBar\App\DefaultAbstract;

abstract class ItemAbstract extends DefaultAbstract implements ItemInterface
{
    /**
     * @var string|null $id_item
     * Require and primary key
     * */
    protected ?string $id_item = null;

    /**
     * @var string|null $label
     * Require , label name of sidebar item
     * */
    protected ?string $label = null;

    /**
     * @var string|null $style_css
     * don't require , custom css for item sidebar
     * */
    protected ?string $style_css = null;

    /**
     * @var string|null $class
     * don't require , custom class for item sidebar
     * */
    protected ?string $class = null;

    /**
     * @var int|null $position
     * Require , the display position of the item sidebar (for the whole in group) . It will be sorted from type 0-99
     * */
    protected ?int $position = null;

    /**
     * @var string|null $group_id
     * don't require , if item belongs to group , set group_id for it
     * */
    protected ?string $group_id = null;

    /**
     * @var string|null $route
     * Require , link route (can use external link)
     * */
    protected ?string $route = null;

    /**
     * @var string|null $route
     * Require , Icon for item sidebar
     * */
    protected ?string $icon = null;

    /**
     * Check render
     * */
    private bool $render = false;

    /**
     * @var array $require_types
     * Field type require
     * */
    private array $require_types = [
        'id_item',
        'label',
        'position',
        'route',
        'icon'
    ];

    /**
     * Set label for item sidebar (require)
     *
     * @param string $label
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setLabel(string $label): Item
    {
        $this->label = $this->checkEmptyInput('label', $label);
        return $this;
    }

    /**
     * Set custom style css for item sidebar
     *
     * @param string $style_css
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setStyleCss(string $style_css): Item
    {
        $this->style_css = $this->checkEmptyInput('style_css', $style_css);
        return $this;
    }

    /**
     * Set custom class for item sidebar
     *
     * @param string $class
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setClass(string $class): Item
    {
        $this->class = $this->checkEmptyInput('class', $class);
        return $this;
    }

    /**
     * Set position for item sidebar (require)
     *
     * @param int $position
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setPosition(int $position): Item
    {
        $this->position = $this->checkNumberInput('position', $position);
        return $this;
    }

    /**
     * Set gourp for item sidebar (require)
     *
     * @param string $group_id
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setGroup(string $group_id): Item
    {
        $this->group_id = $this->checkEmptyInput('group_id', $group_id);
        return $this;
    }

    /**
     * Set route link for item sidebar (require)
     *
     * @param string $route
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setRoute(string $route): Item
    {
        $this->route = $this->checkEmptyInput('route', $route);
        return $this;
    }

    /**
     * Set icon for item sidebar (require)
     *
     * @param string $icon
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setIcon(string $icon): Item
    {
        $this->icon = $this->checkEmptyInput('icon', $icon);
        return $this;
    }

    /**
     * Set condition render for item sidebar
     *
     * @param bool $render
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setRender(bool $render): Item
    {
        $this->render = $render;
        return $this;
    }

    /**
     * Get id item sidebar
     *
     * @return string
     * */
    public function getIdItem(): ?string
    {
        return $this->id_item;
    }

    /**
     * Get label item sidebar
     *
     * @return string
     * */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * Get style_css item sidebar
     *
     * @return string
     * */
    public function getStyleCss(): ?string
    {
        return $this->style_css;
    }

    /**
     * Get class item sidebar
     *
     * @return string
     * */
    public function getClass(): ?string
    {
        return $this->class;
    }

    /**
     * Get position item sidebar
     *
     * @return string
     * */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * Get group_id item sidebar
     *
     * @return string
     * */
    public function getGroupId(): ?string
    {
        return $this->group_id;
    }

    /**
     * Get route item sidebar
     *
     * @return string
     * */
    public function getRoute(): ?string
    {
        return $this->route;
    }

    /**
     * Get icon item sidebar
     *
     * @return string
     * */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * Get position item sidebar
     *
     * @return bool
     * */
    public function getRender(): bool
    {
        return $this->render;
    }

    /**
     * Get require field item sidebar
     *
     * @return array
     * */
    public function getRequireField(): array
    {
        return $this->require_types;
    }
}
