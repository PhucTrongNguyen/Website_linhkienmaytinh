<?php
class TeacherModel extends DB
{
    public function getAll() {
        return $this->getTable("giaovien");
    }
}