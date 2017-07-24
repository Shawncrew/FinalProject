<?php

namespace Project4\Models\Repositories;

interface IRepository {

    public function SelectById(int $id);
    public function SelectAll();
    public function Insert($object);
    public function Delete(int $id);
    public function Update($object);
}