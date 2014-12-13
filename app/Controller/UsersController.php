<?php
class UsersController extends AppController {
public $autoLayout = false;

    public function add(){
        //$this->autolayout=false;

        
        if($this->User->save($this->request->data)){
            $r = $this->response('success');

        }else{
            $r = $this->response('fail');
        }
        $this->set('result',$r);
        $this->Render('json');
    }

    
}