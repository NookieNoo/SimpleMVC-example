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
    public $orderBy = 'timestamp DESC';
    
    /**
     * @var int ID статьи 
     */
    public $id = null;
    
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
        $st->execute();
    }
    
    /**
    * Возвращаем объект статьи соответствующий заданному ID статьи
    *
    * @param int ID статьи
    * @return Article|false Объект статьи или false, если запись не найдена или возникли проблемы
    */
    public function getById($id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE id = :id";
        $st = $this->pdo->prepare($sql);
        $st->bindValue(":id", $this->id, \PDO::PARAM_INT);
        $st->execute();
    }
    
    /**
    * Возвращает все (или диапазон) объекты Article из базы данных
    *
    * @param int $numRows Количество возвращаемых строк (по умолчанию = 1000000)
    * @param int $categoryId Вернуть статьи только из категории с указанным ID
    * @param string $order Столбец, по которому выполняется сортировка статей (по умолчанию = "publicationDate DESC")
    * @param string $publicationFilter Столбец со статусом видимости статьи (по умолчанию = не используется)
    * @param int $subCategoryId Вернуть статьи только из подкатегории с указанным ID 
    * @return Array|false Двух элементный массив: results => массив объектов Article; totalRows => общее количество строк
    */
    public static function getList($numRows=1000000, $categoryId=null,
            $order="publicationDate DESC", $publicationFilter = "",
            $subCategoryId=null) 
    {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $categoryClause = $categoryId ? "WHERE categoryId = :categoryId" : "";
        $subCategoryClause = $subCategory_id ? "WHERE subCategory_id = :subCategoryId" : "";
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS * 
                FROM $this->tableName $categoryClause"."$subCategoryClause".$publicationFilter."
                ORDER BY  $order  LIMIT :numRows";

        $st = $conn->prepare($sql);
        
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        
        if (isset($categoryId)) {
            $st->bindValue( ":categoryId", $categoryId, PDO::PARAM_INT);
        }
        
        if (isset($subCategory_id)) {
            $st->bindValue( ":subCategoryId", $subCategory_id, PDO::PARAM_INT);
        }
        $st->execute(); 
        
        
        $list = array();
        
        while ($row = $st->fetch()) {
            $article = new Article($row);
            // Вырезаем 50 символов и добавляем ...
            $article->newSummary = mb_substr($article->summary, 0, 50)."...";
            $list[] = $article;
        }

        // Получаем общее количество статей, которые соответствуют критерию
        $sql = "SELECT FOUND_ROWS() AS totalRows";
        $totalRows = $conn->query($sql)->fetch();
        $conn = null;
        
        return (array(
            "results" => $list, 
            "totalRows" => $totalRows[0]
            ) 
        );
    }
    
    /**
    * Удаляем текущий объект статьи из базы данных
    */
    public function delete()
    {
        $sql = "DELETE FROM $this->tableName WHERE id = :id LIMIT 1";
        $st = $this->pdo->prepare($sql);
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
}

