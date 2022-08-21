<?php

namespace Bo\SideBar\App\Item;

interface ItemInterface
{
    /**
     * Set label for item sidebar (require)
     *
     * @param string $label
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setLabel(string $label): Item;

    /**
     * Set custom style css for item sidebar
     *
     * @param string $style_css
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setStyleCss(string $style_css): Item;

    /**
     * Set custom class for item sidebar
     *
     * @param string $class
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setClass(string $class): Item;

    /**
     * Set position for item sidebar (require)
     *
     * @param int $position
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setPosition(int $position): Item;

    /**
     * Set position for item sidebar (require)
     *
     * @param string $group_id
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setGroup(string $group_id): Item;

    /**
     * Set route link for item sidebar (require)
     *
     * @param string $route
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setRoute(string $route): Item;

    /**
     * Set icon for item sidebar (require)
     *
     * @param string $icon
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setIcon(string $icon): Item;

    /**
     * Get id item sidebar
     *
     * @return string
     * */
    public function getIdItem(): ?string;

    /**
     * Get label item sidebar
     *
     * @return string
     * */
    public function getLabel(): ?string;

    /**
     * Get style_css item sidebar
     *
     * @return string
     * */
    public function getStyleCss(): ?string;

    /**
     * Get class item sidebar
     *
     * @return string
     * */
    public function getClass(): ?string;

    /**
     * Get position item sidebar
     *
     * @return string
     * */
    public function getPosition(): ?string;

    /**
     * Get group_id item sidebar
     *
     * @return string
     * */
    public function getGroupId(): ?string;

    /**
     * Get route item sidebar
     *
     * @return string
     * */
    public function getRoute(): ?string;

    /**
     * Get icon item sidebar
     *
     * @return string
     * */
    public function getIcon(): ?string;

    /**
     * Get position item sidebar
     *
     * @return bool
     * */
    public function getRender(): bool;

    /**
     * Get require field item sidebar
     *
     * @return array
     * */
    public function getRequireField(): array;
}
