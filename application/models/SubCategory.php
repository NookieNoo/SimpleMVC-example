<?php

namespace application\models;

/*
 * Класс для обработки подкатегорий
 */
Class SubCategory extends \ItForFree\SimpleMVC\mvc\Model
{
    /**
     * Название таблицы подкатегорий
     */
    public $tableName = 'subCategories';
    
    /**
     * @var string название подкатегории 
     */
    public $name;
    /**
     * @var int внешний ключ, ссылка на категорию, к которой относится эта подкатегория
     */
    public $categoryId;
    
    
    /**
    * Вставляем текущий объект SubCategory в базу данных, устанавливаем его ID.
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