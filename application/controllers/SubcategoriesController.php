<?php
namespace application\controllers;
use application\models\SubCategory as Subcategory;
use ItForFree\SimpleMVC\Config;
/*
 * 
 */
class SubcategoriesController extends \ItForFree\SimpleMVC\mvc\Controller
{
    public $layoutPath = 'main.php';
    /**
    *   Выводит список всех подкатегорий
    */
    public function indexAction()
    {
        $subCategory = new Subcategory();
        $list = array();
        $list = $subCategory->getList();
        
        $this->view->addVar('subCategories', $list); // передаём переменную по view
        $this->view->addVar('totalRows', $list['totalRows']);
        $this->view->addVar('editListTitle', 'Подкатегории статей');
        $this->view->render('subcategory/editList.php');
    }
    
    /**
    *   Редактирование подкатегории
    */
    public function editAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        
        if(!empty($_POST)) {
            if (!empty($_POST['saveChanges'] )) {
                $newSubCategory = new Subcategory;
                $subCategory = $newSubCategory->loadFromArray($_POST);
                $subCategory->update();
                $this->redirect($Url::link("subcategories/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                
                $this->redirect($Url::link("subcategories/index"));
            }
        }
        else {
            $newSubCategory = new Subcategory();
            $subCategory = $newSubCategory->getById($id);


            $this->view->addVar('subCategory', $subCategory);
            $this->view->addVar('editTitle', 'Редактирование подкатегории');
            $this->view->render('subcategory/edit.php');
        }   
    }
    
    /**
    *   Добавление новой подкатегории
    */
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['saveChanges'])) {

                $subCategory = new Subcategory;

                $newSubCategory = $subCategory->loadFromArray($_POST);
                $newSubCategory->insert(); 
                
                $this->redirect($Url::link("subcategories/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("subcategories/index"));
            }
        } else {
            $subCategory = new Subcategory();

            $this->view->addVar('addTitle', 'Добавление подкатегории');
            $this->view->render('subcategory/add.php'); 
        }
    }
    
    /**
    *   Удаление подкатегории
    */
    public function deleteAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        $subCategory = new Subcategory;
        $subCategory->id = $id;
        $subCategory->delete();
        $this->redirect($Url::link("subcategories/index"));
    }
}