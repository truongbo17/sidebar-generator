<?php

namespace Bo\SideBar\App;

abstract class DefaultAbstract
{
    /**
     * Type of sidebar (item or group)
     * */
    public ?string $type;

    /**
     * Check empty input
     *
     * @param string $type
     * @param string $input
     *
     * @return string
     * @throws \Exception
     */
    public function checkEmptyInput(string $type, string $input): string
    {
        if (mb_strlen($input) < 1) {
            throw new \Exception("Input type \"{$type}\" for id item sidebar \"{$this->id_item}\" must not empty !");
        } else {
            return $input;
        }
    }

    /**
     * Check empty input
     *
     * @param string $type
     * @param int $input
     *
     * @return int
     * @throws \Exception
     */
    public function checkNumberInput(string $type, int $input): int
    {
        if ($input < 0) {
            throw new \Exception("Input type \"{$type}\" for id item sidebar \"{$this->id_item}\" must not negative !");
        } else {
            return $input;
        }
    }

    /**
     * Add class active when condition is true
     *
     * @param bool $condition
     * @return $this
     * */
    public function isActiveWhen(bool $condition)
    {
        if ($condition && !str_contains($this->class, 'active')) $this->class .= ' active';
        return $this;
    }
}
