<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $albums = new Application_Model_DbTable_Albums();        
        $this->view->albums = $albums->fetchAll();
    }

    public function editAction()
    {
        // action body
    }

    public function addAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}







