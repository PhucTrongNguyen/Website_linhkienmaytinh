<?php
class StudentModel extends DB
{
    function getAll() {
        return $this->getTable("sinhvien");
    }

    function getClass() {
        return $this->getTable("lophocphan");
    }
}