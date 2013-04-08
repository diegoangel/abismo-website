<?php
App::uses('AppController', 'Controller');
/**
 * Tenders Controller
 *
 * @property Tender $Tender
 */
class TendersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tender->recursive = 0;
		$this->set('tenders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tender->exists($id)) {
			throw new NotFoundException(__('Invalid tender'));
		}
		$options = array('conditions' => array('Tender.' . $this->Tender->primaryKey => $id));
		$this->set('tender', $this->Tender->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tender->create();
			if ($this->Tender->save($this->request->data)) {
				$this->Session->setFlash(__('The tender has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tender could not be saved. Please, try again.'));
			}
		}
		$images = $this->Tender->Image->find('list');
		$videos = $this->Tender->Video->find('list');
		$this->set(compact('images', 'videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tender->exists($id)) {
			throw new NotFoundException(__('Invalid tender'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tender->save($this->request->data)) {
				$this->Session->setFlash(__('The tender has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tender could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tender.' . $this->Tender->primaryKey => $id));
			$this->request->data = $this->Tender->find('first', $options);
		}
		$images = $this->Tender->Image->find('list');
		$videos = $this->Tender->Video->find('list');
		$this->set(compact('images', 'videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tender->id = $id;
		if (!$this->Tender->exists()) {
			throw new NotFoundException(__('Invalid tender'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tender->delete()) {
			$this->Session->setFlash(__('Tender deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tender was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
