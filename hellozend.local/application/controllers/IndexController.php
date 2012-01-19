<?php

class IndexController extends Zend_Controller_Action
{

    public function init() {
		/* Initialize action controller here */
	}

	public function indexAction() {
		// action body
		$albums = new Application_Model_DbTable_Albums();

		// fetch all albums and assign them to view's albums 
		$this->view->albums = $albums->fetchAll();
	}

	public function editAction() {
		// action body

		$editform = new Application_Form_Album();
		$editform->submit->setLabel('Save change');
		$this->view->form = $editform;

		if ($this->getRequest()->isPost()) {
			// POST request
			$formData = $this->getRequest()->getPost();
			
			if ($editform->isValid($formData)) {
				$id = (int) $editform->getValue('id');
				$artist = $editform->getValue('artist');
				$title = $editform->getValue('title');
				
				// update this album
				$albums = new Application_Model_DbTable_Albums();
				$albums->updateAlbum($id, $artist, $title);

				$this->_helper->redirector('index');
			} 
			else {
				$editform->populate($formData);
			}
		} 
		else {
			// GET request, display selected album
			// retrieve GET request parameter 'id'
			$id = $this->_getParam('id', 0);
			
			if ($id > 0) {
				$albums = new Application_Model_DbTable_Albums();
				
				// populate form with retrieved data from album
				// 'id' field is also assigned although it's hidden
				$editform->populate($albums->getAlbum($id));
			}
		}
	}

	public function addAction() {
		// action body
		$albumform = new Application_Form_Album();
		$albumform->submit->setLabel('Add New Album');
		
		$this->view->form = $albumform;
		
		if  ( $this->getRequest()->isPost() ) {
			$formdata = $this->getRequest()->getPost();
			
			if ( $albumform->isValid( $formdata ) ) {
				$artist = $albumform->getValue( 'artist' );
				$title = $albumform->getValue( 'title' );
				
				$albumsWrapper = new Application_Model_DbTable_Albums();
				$albumsWrapper->addAlbum( $artist, $title );
				
				//redirect to index page
				$this->_helper->redirector( 'index' );
			}
			else {
				$albumform->populate($formdata);
			}
		}
		
		
	}

	public function deleteAction() {
		// action body

		if ($this->getRequest()->isPost()) {
			$shouldDel = $this->getRequest()->getPost('del');
			
			if ($shouldDel == 'Yes') {
				$id = $this->getRequest()->getPost('id');
				$albums = new Application_Model_DbTable_Albums();
				$albums->deleteAlbum($id);
			}
			// redirect to index action
			$this->_helper->redirector( 'index' );									
		} 
		else {
			// GET request, display confirmation to delete
			$id = $this->_getParam('id', 0);
			$albums = new Application_Model_DbTable_Albums();
			$this->view->album = $albums->getAlbum($id);
		}
	}

}







