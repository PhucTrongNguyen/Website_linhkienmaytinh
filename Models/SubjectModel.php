<?php

class SubjectModel extends DB
{
    public function getAll() {
        return $this->getTable("monhoc");
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