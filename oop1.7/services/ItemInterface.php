<?php

interface ItemInterface
{
    public function __construct(PDO $pdo);

    public function getItems();

    public function findOneById($id);

    public function createItemFromData($data);

    public function queryForItems();
}