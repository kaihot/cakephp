<?php
class ImagesController extends AppController {
    public $autoLayout = false;
    public $uses = array('Image','Post');

/*
画像を登録するためのAPI
*/
/*
友人一覧API
同期画面API
*/
    public function add(){
        //$this->autolayout=false;
        $r = $this->request->form;
        $r['img']['name'] = uniqid(rand()).'.jpg';
        $r['img']['path'] = WWW_ROOT.'/img/'.$r['img']['name'];

        $this->Image->save($r['img']);
        move_uploaded_file($r['img']['tmp_name'],WWW_ROOT.'/img/'.$r['img']['name']);


        $this->set('result',$r);


        $this->Render('/Users/json');
    }

    /*
    ユーザーが投稿した画像を登録するAPI
    */
    public function useradd(){
        //$this->autolayout=false;
        #print_r($this->request->data);
        $r = $this->request->form;
        $r['img']['name'] = uniqid(rand()).'.jpg';
        $r['img']['path'] = WWW_ROOT.'/userimg/'.$r['img']['name'];
        $r['img']['user_id'] = $this->request->data['id'];

        $this->Post->save($r['img']);
        move_uploaded_file($r['img']['tmp_name'],WWW_ROOT.'/userimg/'.$r['img']['name']);


        $this->set('result',$r);


        $this->Render('/Users/json');
    }       
/*
画像の一覧取得のためのAPI
*/
    public function index(){
        $options = array(
            'limit'=>10,
            'order'=>array('modified'=>'ASC'),
            );
        $r = $this->Image->find('all',$options);
        $this->set('result',$r);
        $this->Render('/Users/json');

    }
}
