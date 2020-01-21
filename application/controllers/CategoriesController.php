<?php
namespace application\controllers;
use application\models\Category as Category;

/*
 * 
 */
class CategoryController extends \ItForFree\SimpleMVC\mvc\Controller
{
    public $layoutPath = '';
    
    public function indexAction()
    {
        $category = new Category();
        $list = array();
        
        $list = $category->getList();
        $this->view->render('');
    }
}