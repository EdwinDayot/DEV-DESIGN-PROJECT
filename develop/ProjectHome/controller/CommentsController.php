<?php

	class CommentsController extends Controller{
		function answer($id = null){
			$this->loadModel('Comment');
			$condition = array('type' => 'answer');
			$c = $this->Post->findCount($condition);
			$count = $c + 1;
			if($id === null){
				$post = $this->Post->findFirst(array(
					'conditions'	=> array('announce_id' => $id)
					));
				if(!empty($post)){
					$id = $post->id;
				}
				else{
					$this->Post->save(array(
						'online' => -1
						));
					$id = $this->Post->id;
				}
			}
			$d['id'] = $id;
			if($this->request->data){
				if($this->Post->validates($this->request->data)){
					$this->request->data->type = 'post';
					$this->request->data->created = date('Y-m-d H:i:s');
					if($this->request->data->position == null){
						$this->request->data->position = $count;
					}
					$this->Post->save($this->request->data);
					$id = $this->Post->id;
					$this->redirect('admin/posts/index');
					$this->Session->setFlash('Le contenu a bien été mis à jour');
				}
				else{
					$this->Session->setFlash('Certaines informations ne sont pas valides, merci de les corriger.','error');
				}
			}
			else{
					$this->request->data = $this->Post->findFirst(array(
						'conditions'	=> array(
						'id' => $id
						)
					));
			}
			$this->set($d);
		}

		function getCom(){
			$this->loadModel('Comment');
			return $this->Comment->find();
		}

	}

?>