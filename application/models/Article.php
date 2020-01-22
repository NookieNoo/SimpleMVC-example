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
                . " categoryId, title, summary, content, active,"
                . " subCategory_id) VALUES (:publicationDate, :categoryId,"
                . " :subCategoryId, :title, :summary, :content, :publicationStatus)";
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
                . " categoryId=:categoryId, subCategory_id=:subCategoryId,"
                . " title=:title, summary=:summary, content=:content,"
                . " publicationStatus=:publicationStatus  WHERE id = :id";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":publicationDate", (new \DateTime('NOW'))->format('Y-m-d H:i:s'), \PDO::PARAM_STMT);
        $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_INT );
        $st->bindValue( ":subCategoryId", $this->subCategoryId, \PDO::PARAM_INT );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
        $st->bindValue( ":publicationStatus", $this->publicationStatus, \PDO::PARAM_INT );
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
}

