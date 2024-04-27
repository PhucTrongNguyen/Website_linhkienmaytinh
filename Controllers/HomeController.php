<?php
class HomeController extends BaseController{
    public  $action;
    public function __construct(){
        $action = getIndex('action', 'index');
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
		
    }
    public function index(){
        return $this->view('homes.index', [
            'pageTitle' => 'Dashboard'
        ]);
    }
}