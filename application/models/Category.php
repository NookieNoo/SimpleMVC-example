<?php

namespace application\models;

/*
 * Класс для обработки категорий
 */
Class Category extends \ItForFree\SimpleMVC\mvc\Model
{
    /**
     * Название таблицы категорий
     */
    public $tableName = 'categories';
    
    /**
     * @var string название категории 
     */
    public $name;
    /**
     * @var string описание категории 
     */
    public $description;
    
    
    /**
    * Вставляем текущий объект Category в базу данных, устанавливаем его ID.
    */
    public function insert()
    {
        $sql = "INSERT INTO $this->tableName (name, description) VALUES "
                . "(:name, :description)";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":name", $this->name, \PDO::PARAM_STR );
        $st->bindValue( ":description", $this->description, \PDO::PARAM_STR );
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
    }
    
    
    /**
    * Обновляем текущий объект категории в базе данных
    */
    public function update()
    {
        $sql = "UPDATE $this->tableName SET name=:name, description=:description"
                . " WHERE id = :id";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":name", $this->name, \PDO::PARAM_STR );
        $st->bindValue( ":description", $this->description, \PDO::PARAM_STR );
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
}