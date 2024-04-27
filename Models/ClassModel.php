<?php
class ClassModel extends DB
{
    public function getAll() {
        return $this->getTableClass("lophocphan");
    }
    function getSubject() {
        return $this->getTable("monhoc");
    }
    function getDepartment() {
        return $this->getTable("phonghoc");
    }
    function getTeacher() {
        return $this->getTable("giaovien");
    }

    public function findById($id) {
        return [
            'id' => 1,
            'name' => 'Iphon12'
        ];
    }

    public function delete() {
        return __METHOD__;
    }
}