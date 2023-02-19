<?php
namespace BookList\Controller;
use BookList\Form\BookForm;
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
        $form = new BookForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {

        }
        return array('form' => $form);
    }
    public function editAction(){
        $form  = new BookForm();
        // $form->bind($book);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {

        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    public function deleteAction(){
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('book');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {

        }

        return array(
            'id'    => $id,
            //'book' =>
        );
    }

}

