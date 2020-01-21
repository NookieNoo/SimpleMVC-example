<?php
namespace application\controllers;
use \application\models\Article as Article;

/*
 * 
 */
class ArticleController extends \ItForFree\SimpleMVC\mvc\Controller
{
    public $layoutPath = '';
    
    public function indexAction()
    {
        $article = new Article();
        $list = array();
        
        $list = $article->getList();
        $this->view->render('');
    }
}