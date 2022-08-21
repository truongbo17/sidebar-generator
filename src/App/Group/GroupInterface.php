<?php

namespace Bo\SideBar\App\Group;

use Bo\SideBar\App\Item\ItemAbstract;

interface GroupInterface
{
    /**
     * Set label for group sidebar (require)
     *
     * @param string $label
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setLabel(string $label): Group;

    /**
     * Set custom style css for group sidebar
     *
     * @param string $style_css
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setStyleCss(string $style_css): Group;

    /**
     * Set custom class for group sidebar
     *
     * @param string $class
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setClass(string $class): Group;

    /**
     * Set position for group sidebar (require)
     *
     * @param int $position
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setPosition(int $position): Group;

    /**
     * Set icon for group sidebar (require)
     *
     * @param string $icon
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setIcon(string $icon): Group;

    /**
     * Set position for group sidebar (require)
     *
     * @param ItemAbstract $item
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setChildItem(ItemAbstract $item): Group;

    /**
     * Get id group sidebar
     *
     * @return string
     * */
    public function getIdGroup(): ?string;

    /**
     * Get label group sidebar
     *
     * @return string
     * */
    public function getLabel(): ?string;

    /**
     * Get id group sidebar
     *
     * @return array
     * */
    public function getChildItem(): ?array;

    /**
     * Get style_css group sidebar
     *
     * @return string
     * */
    public function getStyleCss(): ?string;

    /**
     * Get class group sidebar
     *
     * @return string
     * */
    public function getClass(): ?string;

    /**
     * Get position group sidebar
     *
     * @return string
     * */
    public function getPosition(): ?string;

    /**
     * Get icon group sidebar
     *
     * @return string
     * */
    public function getIcon(): ?string;

    /**
     * Get position group sidebar
     *
     * @return bool
     * */
    public function getRender(): bool;

    /**
     * Get require field group sidebar
     *
     * @return array
     * */
    public function getRequireField(): array;
}
