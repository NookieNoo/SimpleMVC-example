<?php

namespace application\models;

/*
 * Класс для обработки подкатегорий
 */
Class Subcategory extends \ItForFree\SimpleMVC\mvc\Model
{
    /**
     * Название таблицы подкатегорий
     */
    public $tableName = 'subCategories';
    
    /**
     * @var string Критерий сортировки строк таблицы
     */
    public $orderBy = 'name';
    
    
    /**
     * @var string название подкатегории 
     */
    public $name;
    /**
     * @var int внешний ключ, ссылка на категорию, к которой относится эта подкатегория
     */
    public $categoryId;
    /*
     * @var string название категории
     */
    public $categoryName;
    
    
    /**
    * Вставляем текущий объект SubCategory в базу данных, устанавливаем его ID.
    */
    public function insert()
    {
        $sql = "INSERT INTO $this->tableName (name, categoryId) VALUES "
                . "(:name, :categoryId)";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":name", $this->name, \PDO::PARAM_STR );
        $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_INT );
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
    }
    
    
    /**
    * Обновляем текущий объект подкатегории в базе данных
    */
    public function update()
    {
        $sql = "UPDATE $this->tableName SET name=:name, categoryId=:categoryId"
                . " WHERE id = :id";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":name", $this->name, \PDO::PARAM_STR );
        $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_STR );
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
    
    
}