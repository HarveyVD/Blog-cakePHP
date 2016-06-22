<?php
class HomesController extends AppController{
    var $uses = array('User');
    public function index(){
        $this->render('home');
    }
}
