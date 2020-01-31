<?php
namespace application\controllers;
use application\models\Category as Category;
use ItForFree\SimpleMVC\Config;
/*
 * 
 */
class CategoriesController extends \ItForFree\SimpleMVC\mvc\Controller
{
    protected $rules = [ //вариант 2:  здесь всё гибче, проще развивать в дальнешем
         ['allow' => true, 'roles' => ['admin']],
         ['allow' => false, 'roles' => ['?', '@']],
    ];
    
    public $layoutPath = 'main.php';
    /**
    *   Выводит список всех категорий
    */
    public function indexAction()
    {
        $category = new Category();
        $list = array();
        $list = $category->getList();
        
        $this->view->addVar('categories', $list); // передаём переменную по view
        $this->view->addVar('totalRows', $list['totalRows']);
        $this->view->addVar('editListTitle', 'Категории статей');
        $this->view->render('category/editList.php');
    }
    
    /**
    *   Редактирование категории
    */
    public function editAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        
        if(!empty($_POST)) {
            if (!empty($_POST['saveChanges'] )) {
                $newCategory = new Category;
                $category = $newCategory->loadFromArray($_POST);
                $category->update();
                $this->redirect($Url::link("categories/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                
                $this->redirect($Url::link("categories/index"));
            }
        }
        else {
            $newCategory = new Category();
            $category = $newCategory->getById($id);


            $this->view->addVar('category', $category);
            $this->view->addVar('editArticleTitle', 'Редактирование категории');
            $this->view->render('category/edit.php');
        }   
    }
    
    /**
    *   Добавление новой категории
    */
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['saveChanges'])) {

                $category = new Category;

                $newCategory = $category->loadFromArray($_POST);
                $newCategory->insert(); 
                
                $this->redirect($Url::link("categories/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("categories/index"));
            }
        } else {
            $category = new Category();

            $this->view->addVar('addArticleTitle', 'Добавление категории');
            $this->view->render('category/add.php'); 
        }
    }
    
    /**
    *   Удаление категории
    */
    public function deleteAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        $category = new Category;
        $category->id = $id;
        $category->delete();
        $this->redirect($Url::link("categories/index"));
    }
}