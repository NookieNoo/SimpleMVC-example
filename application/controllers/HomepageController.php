<?php
namespace application\controllers;
use \application\models\Article as Article;
use \application\models\Category as Category;
use \application\models\Subcategory as Subcategory;
class HomepageController extends \ItForFree\SimpleMVC\mvc\Controller
{
    /**
     * @var string Название страницы
     */
    public $homepageTitle = "Домашняя страница";
    
    public $layoutPath = 'main.php';
    
        
    /**
     * Выводит на экран страницу "Домашняя страница"
     */
    public function indexAction()
    {
        $article = new Article();
        $articles = array();
        $listCategoryName = array();
        $articles = $article->getList();
        foreach ($articles['results'] as $article2){
           $listCategoryName[] = $article->getCategoryNameById($article2->categoryId);
           $listSubCategoryName[] = $article->getSubCategoryNameById($article2->subCategoryId);
        }
        
        
        $this->view->addVar('homepageTitle', $this->homepageTitle); // передаём переменную по view
        $this->view->addVar('articles', $articles); // передаём переменную по view
        $this->view->addVar('listCategoryName', $listCategoryName);
        $this->view->addVar('listSubCategoryName', $listSubCategoryName);
        $this->view->render('homepage/index.php');
    }
    
    public function loginAction()
    {
        if (!empty($_POST)) {
            $login = $_POST['userName'];
            $pass = $_POST['password'];
            $User = Config::getObject('core.user.class');
            if($User->login($login, $pass)) {
                $this->redirect(Url::link("homepage/index"));
            }
            else {
                $this->redirect(Url::link("login/login&auth=deny"));
            }
        }
        else {
            $this->view->addVar('loginTitle', $this->loginTitle);
            $this->view->render('login/index.php');
        }
    }
    /**
     * Обработка ajax запросов с главной страницы
     */
    public function showmoreAction()
    {
        if (isset($_GET['articleId'])) {
            $id = $_GET['articleId'];
            $article = new Article;
            $newArticle = $article->getById($id);
            echo $newArticle->content;
        }
        if (isset($_POST['articleId'])) {
            $id = $_POST['articleId'];
            $article = new Article;
            $newArticle = $article->getById($id);
            echo json_encode($newArticle);
        }
    }
    
    /*
     * 
     */
    public function archiveAction() {
        if (isset($_GET['categoryId'])) {
            $categoryId = $_GET['categoryId'];
            $category = new Category;
            $category = $category->getById($categoryId);

            $article = new Article;
            $articleList = $article->getList("categoryId=$categoryId");
            $this->view->addVar('category', $category);
            $this->view->addVar('articles', $articleList['results']);
            $this->view->addVar('totalRows', $articleList['totalRows']);
            $this->view->render('homepage/categoryArchive.php');
        }
        elseif (isset($_GET['subCategoryId'])) {
            $subCategoryId = $_GET['subCategoryId'];
            $subCategory = new Subcategory;
            $subCategory = $subCategory->getById($subCategoryId);

            $article = new Article;
            $articleList = $article->getList("subCategoryId=$subCategoryId");
            $this->view->addVar('subCategory', $subCategory);
            $this->view->addVar('articles', $articleList['results']);
            $this->view->addVar('totalRows', $articleList['totalRows']);
            $this->view->render('homepage/subcategoryArchive.php');
        }
        
    }
}

