<?php
namespace application\controllers;
use \application\models\Article as Article;
use \application\models\Category as Category;
use \application\models\Subcategory as Subcategory;
use \application\models\Adminusers as Adminusers;
use ItForFree\SimpleMVC\Config;
/*
 * 
 */
class ArticlesController extends \ItForFree\SimpleMVC\mvc\Controller
{
    protected $rules = [ //вариант 2:  здесь всё гибче, проще развивать в дальнешем
         ['allow' => true, 'roles' => ['admin']],
         ['allow' => false, 'roles' => ['?', '@']],
    ];
    
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
        $articles = $article->getList(); //здесь массив объектов статей
        
        foreach ($articles['results'] as $articleItem){
           $listCategoryName[] = $article->getCategoryNameById($articleItem->categoryId);
           $listSubCategoryName[] = $article->getSubCategoryNameById($articleItem->subCategoryId);
        }
        
        
        $editListTitle = "Выбор статьи для редактирования";
        $this->view->addVar('editListTitle', $editListTitle);
        $this->view->addVar('listCategoryName', $listCategoryName);
        $this->view->addVar('listSubCategoryName', $listSubCategoryName);
        $this->view->addVar('totalRows', $articles['totalRows']);
        $this->view->addVar('articles', $articles); // передаём переменную по view
        $this->view->render('article/editList.php');
    }
    
    /**
    *   Редактирование статьи
    */
    public function editAction()
    {
        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        $Url = Config::get('core.url.class');
        
        
        if(!empty($_POST)) {
            if (!empty($_POST['saveChanges'] )) {
                //конвертируем значение чекбокса on в число
                if (isset($_POST['publicationStatus']) && $_POST['publicationStatus'] == "on") {
                    $_POST['publicationStatus'] = 1;
                }
                else $_POST['publicationStatus'] = 0;
                $article = new Article;
                $article = $article->loadFromArray($_POST);
                $article->update();
                $article->deleteAuthors();
                $article->insertAuthors();
                
                $this->redirect($Url::link("articles/editlist&id=$id"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("articles/editlist"));
            }
        }
        else {            
            $article = new Article();
            $article = $article->getById($id);
            
            
            $categories = $article->getAllCategoriesNameAndId();
            $subCategories = $article->getAllSubCategoriesNameAndId(); 
            $article->setAuthors($id);
            $users = new Adminusers;
            $users = $users->getList();
            
            
            $this->view->addVar('users', $users['results']);
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