<?php
namespace BookList\Controller;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class BookController extends AbstractActionController{
    public function indexAction()
    {
        return new ViewModel(array(
            'books' => []
        ));
    }
    public function addAction(){

    }
    public function editAction(){

    }
    public function deleteAction(){

    }

}

