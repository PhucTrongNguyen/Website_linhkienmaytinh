<?php
class SchedulModel extends DB
{
    public function getAll() {
        return $this->getTable("buoihoc");
    }
}