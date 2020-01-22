<?php
namespace application\controllers;
use \application\models\Article as Article;

/*
 * 
 */
class ArticlesController extends \ItForFree\SimpleMVC\mvc\Controller
{
    public $layoutPath = 'main.php';
    /**
    *   Выводит список всех статей
    */
    public function indexAction()
    {
        $article = new Article();
        $articles = array();
        $articles = $article->getList();
        
        $this->view->addVar('articles', $articles); // передаём переменную по view
        $this->view->render('');
    }
    
    /**
    *   Вывод информации о статье
    */
    public function viewItemAction()
    {
        $id = $_GET['id'];
        $article = new Article;
        $viewArticle = $article->getById($id, $article->tableName);
        
        $this->view->addVar('articles', $viewArticle); // передаём переменную по view
        $this->view->render('article/view-item.php');
        
    }
}