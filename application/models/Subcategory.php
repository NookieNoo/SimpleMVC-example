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
    * Возвращает все (или диапазон) объекты Article из базы данных
    *
    * @param int Optional Количество возвращаемых строк (по умолчанию = all)
    * @param int Optional Вернуть статьи только из категории с указанным ID
    * @param string Optional Столбц, по которому выполняется сортировка статей (по умолчанию = "publicationDate DESC")
    * @return Array|false Двух элементный массив: results => массив объектов Article; totalRows => общее количество строк
    */
        
    public function getList($where='', $numRows=1000000)  
    {
        if(!empty($where)) {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM $this->tableName"
                    . " WHERE ".$where." ORDER BY  $this->orderBy LIMIT :numRows";
        } else {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM $this->tableName
                ORDER BY  $this->orderBy LIMIT :numRows";
        }
        
        
        $modelClassName = static::class;
      
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":numRows", $numRows, \PDO::PARAM_INT );
        $st->execute();
        $list = array();
        
        while ($row = $st->fetch()) {
            $example = new $modelClassName($row);
            $list[] = $example;
        }

        $sql = "SELECT FOUND_ROWS() AS totalRows"; //  получаем число выбранных строк
        $totalRows = $this->pdo->query($sql)->fetch();
        return (array ("results" => $list, "totalRows" => $totalRows[0]));
    }
    
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