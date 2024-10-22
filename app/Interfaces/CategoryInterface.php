<?php

namespace App\Interfaces;

interface CategoryInterface
{

    public function all();
    public function store(array $data);
    public function update(array $data, $id);
}
