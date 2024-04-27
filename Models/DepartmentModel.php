<?php
class DepartmentModel extends DB
{
    public function getAll() {
        return $this->getTable("phonghoc");
    }
}