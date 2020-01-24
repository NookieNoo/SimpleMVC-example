<?php

namespace application\models;

/**
 * Класс для обработки статей
 */
class Article extends \ItForFree\SimpleMVC\mvc\Model
{
    /**
     * Название таблицы статей
     */
    public $tableName = 'articles';
    
    /**
     * @var string Критерий сортировки строк таблицы
     */
    public $orderBy = 'publicationDate DESC';
    
    /**
     * @var int дата публикации
     */
    public $publicationDate = null;
    
    /**
     * @var int ID категории
     */
    public $categoryId = null;
    
    /**
    * @var int ID подкатегории
    */
    public $subCategoryId = null;
    
    /**
    * @var string Заголовок статьи
    */
    public $title = null;
    
    /**
    * @var string Краткое содержание статьи
    */
    public $summary = null;
    
    /**
    * @var string Полное содержание статьи
    */
    public $content = null;
    
    /**
    * @var int статус публикации статьи.
     * По умолчанию, =0, статья не видима/опубликована.
    */
    public $publicationStatus = null;
    
    
    /**
    * Вставляем текущий объект Article в базу данных, устанавливаем его ID.
    */
    public function insert() 
    {
        $sql = "INSERT INTO $this->tableName (publicationDate,"
                . " categoryId, title, summary, content, publicationStatus,"
                . " subCategoryId) VALUES (:publicationDate, :categoryId,"
                . " :title, :summary, :content, :publicationStatus, :subCategoryId)";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":publicationDate", (new \DateTime('NOW'))->format('Y-m-d H:i:s'), \PDO::PARAM_STMT);
        $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_INT );
        $st->bindValue( ":subCategoryId", $this->subCategoryId, \PDO::PARAM_INT );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
        $st->bindValue( ":publicationStatus", $this->publicationStatus, \PDO::PARAM_INT );
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
    }
    
    /**
    * Обновляем текущий объект статьи в базе данных
    */
    public function update()
    {
        $sql = "UPDATE $this->tableName SET publicationDate=:publicationDate,"
                . " categoryId=:categoryId, subCategoryId=:subCategoryId,"
                . " title=:title, summary=:summary, content=:content,"
                . " publicationStatus=:publicationStatus  WHERE id = :id";
        $st = $this->pdo->prepare($sql);
        //$st->bindValue( ":publicationDate", (new \DateTime('NOW'))->format('Y-m-d H:i:s'), \PDO::PARAM_STMT);
        $st->bindValue( ":publicationDate", $this->publicationDate);
        $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_INT );
        $st->bindValue( ":subCategoryId", $this->subCategoryId, \PDO::PARAM_INT );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
        $st->bindValue( ":publicationStatus", $this->publicationStatus, \PDO::PARAM_INT );
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
    /**
    * Возвращает название категории статьи, по id этой категории
    */
    public function getCategoryNameById($id)
    {
        $sql = "SELECT name FROM categories WHERE id=:id";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":id", $id, \PDO::PARAM_INT );
        $st->execute();
        $row = $st->fetch(\PDO::FETCH_NUM);
        
        if ($row) { 
            $categoryName = $row[0];
            return $categoryName;
        } else {
            return null;
        }
    }
    /**
    * Возвращает название подкатегории статьи, по id этой подкатегории
    */
    public function getSubCategoryNameById($id)
    {
        $sql = "SELECT name FROM subCategories WHERE id=:id";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":id", $id, \PDO::PARAM_INT );
        $st->execute();
        $row = $st->fetch(\PDO::FETCH_NUM); 
        
        
        
        if ($row) { 
            $subCategoryName = $row[0];
            return $subCategoryName;
        } else {
            return null;
        }
    }
    
    /**
    * Возвращает название всех категорий статей, и соответствующие им id
    */
    public function getAllCategoriesNameAndId()
    {
        $sql = "SELECT id, name FROM categories";
        $st = $this->pdo->prepare($sql);
        $st->execute();
        $list = $st->fetchAll(\PDO::FETCH_ASSOC);

        if (isset($list)) {
            return $list;
        }
        return null;
    }
    
    /**
    * Возвращает название всех подкатегорий статей, и соответствующие им id
    */
    public function getAllSubCategoriesNameAndId()
    {
        $sql = "SELECT id, name FROM subCategories";
        $st = $this->pdo->prepare($sql);
        $st->execute();
        $list = $st->fetchAll(\PDO::FETCH_ASSOC);

        if (isset($list)) {
            return $list;
        }
        return null;
    }
}

