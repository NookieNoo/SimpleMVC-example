<?php
namespace application\controllers;
use \application\models\Article as Article;
use ItForFree\SimpleMVC\Config;
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
        $this->view->render('homepage/index.php');
    }
    
    /**
    *   Вывод информации о статье
    */
    public function viewItemAction()
    {
        $id = $_GET['id'];
        $article = new Article;
        $viewArticle = $article->getById($id, $article->tableName);
        
        $this->view->addVar('article', $viewArticle); // передаём переменную по view
        $this->view->render('article/view-item.php');
    }
    
    /**
    *   Редирект на список статей для редактирования
    */
    public function editListAction()
    {
        $article = new Article();
        $articles = array();
        $articles = $article->getList();
        
        $editListTitle = "Выбор статьи для редактирования";
        $this->view->addVar('editListTitle', $editListTitle);
        $this->view->addVar('totalRows', $articles['totalRows']);
        $this->view->addVar('articles', $articles); // передаём переменную по view
        $this->view->render('article/editList.php');
    }
    
    /**
    *   Редактирование статьи
    */
    public function editAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        
        if(!empty($_POST)) {
            if (!empty($_POST['saveChanges'] )) {
                //конвертируем значение чекбокса on в число
                if (isset($_POST['publicationStatus']) && $_POST['publicationStatus'] == "on") {
                    $_POST['publicationStatus'] = 1;
                }
                else $_POST['publicationStatus'] = 0;
                $newArticle = new Article;
                $article = $newArticle->loadFromArray($_POST);
                $article->update();
                $this->redirect($Url::link("articles/editlist&id=$id"));
            } 
            elseif (!empty($_POST['cancel'])) {
                
                $this->redirect($Url::link("articles/editlist"));
            }
        }
        else {
            $newArticle = new Article();
            $article = $newArticle->getById($id);

            $categories = $article->getAllCategoriesNameAndId();
            $subCategories = $article->getAllSubCategoriesNameAndId(); 

            $this->view->addVar('categories', $categories);
            $this->view->addVar('subCategories', $subCategories);
            $this->view->addVar('article', $article);
            $this->view->addVar('editArticleTitle', 'Редактирование статьи');
            $this->view->render('article/edit.php');
        }   
    }
    
    /**
    *   Добавление новой статьи
    */
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['saveChanges'])) {
                //конвертируем значение чекбокса on в число
                if (isset($_POST['publicationStatus']) && $_POST['publicationStatus'] == "on") {
                    $_POST['publicationStatus'] = 1;
                }
                else $_POST['publicationStatus'] = 0;
                $article = new Article;

                $newArticle = $article->loadFromArray($_POST);
                $newArticle->insert(); 
                
                $this->redirect($Url::link("articles/editlist"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("articles/editlist"));
            }
        } else {
            $article = new Article();
            $categories = $article->getAllCategoriesNameAndId();
            $subCategories = $article->getAllSubCategoriesNameAndId();
            $addArticleTitle = "Добавление статьи";   
            $this->view->addVar('categories', $categories);
            $this->view->addVar('subCategories', $subCategories);
            $this->view->addVar('addArticleTitle', $addArticleTitle);
            $this->view->render('article/add.php'); 
        }
    }
    
    /**
    *   Удаление статьи
    */
    public function deleteAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        $article = new Article;
        $article->id = $id;
        $article->delete();
        $this->redirect($Url::link("articles/editlist"));
    }
}