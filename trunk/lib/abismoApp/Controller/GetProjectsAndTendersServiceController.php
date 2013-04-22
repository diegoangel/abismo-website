<?php
App::uses('AppController', 'Controller');
/**
 * Tenders Controller
 * 
 * @package abismo
 * @subpackage Services
 * @property Tender $Tender
 */
class GetProjectsAndTendersServiceController extends AppController {

/**
 * Model
 * 
 * @var array $uses
 */
    public $uses = array(
        'Project', 
        'Tender'
    );
    
    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow('getProjectsAndTenders');
    }
    
    public function getProjectsAndTenders() {        
        $this->Tender->recursive = 0;
        $tenders = $this->Tender->find('all', array(
            'fields' => array(
                'id', 
                'title'
            ),
            'conditions' => array(
                'active' => true
            )
        ));
        $this->Project->recursive = 0;
        $projects = $this->Project->find('all', array(
            'fields' => array(
                'id', 
                'title'
            ),
            'conditions' => array(
                'active' => true
            )
        ));
        $data = array();
        $projectsAndTenders = array_merge($projects, $tenders);
        foreach($projectsAndTenders as $key => $value) {
            if (is_array($value)) {
                foreach($value as $k => $v) {
                    if ($k == 'Project') {
                        $data[] = array(
                            'id' => $v['id'],
                            'title' => 'PROYECTO: ' . $v['title'],
                            'type' => 'project'
                        );
                    } else if ($k == 'Tender') {
                       $data[] = array(
                            'id' => $v['id'],
                            'title' => 'CONCURSO: ' . $v['title'],
                            'type' => 'tender'
                        );                    
                    }
                }
            }
        }
        return new CakeResponse(array('body' => json_encode($data)));
    }    
}
