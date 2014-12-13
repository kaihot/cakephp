<?php
class FriendsController extends AppController {
public $autoLayout = false;

    public function myfriends(){
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