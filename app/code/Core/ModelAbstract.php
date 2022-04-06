<?php
namespace Core;
use Aura\SqlQuery\QueryFactory;

class ModelAbstract
{
    protected QueryFactory $queryFactory;

    protected DB $db;

    protected array $data;

    public function __construct()
    {
        $this->queryFactory = new QueryFactory('mysql');
        $this->db = new DB();
    }

    protected function select()
    {
        return  $this->queryFactory->newSelect();
    }

    protected function insert()
    {
        return  $this->queryFactory->newInsert();
    }

    protected function update()
    {
        return $this->queryFactory->newUpdate();
    }

    protected function delete()
    {
        return $this->queryFactory->newDelete();
    }

    protected function assignData(): void
    {
        $this->data = [];
    }

    public function save(): void
    {
        $this->assignData();
        $this->create();
    }

}