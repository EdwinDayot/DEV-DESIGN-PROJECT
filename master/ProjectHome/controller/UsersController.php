<?php

	class UsersController extends Controller{
		function signin(){
			if($this->request->data){
				$data = $this->request->data;
				$data->password = sha1($data->password);
				$this->loadModel('User');
				$user = $this->User->findFirst(array(
						'conditions' => array(
							'login'		=> $data->login,
							'password'	=> $data->password
							)
					));
				if(!empty($user)){
					$this->Session->write('User',$user);
					$this->Session->setFlash('Vous êtes maintenant connecté.','success');
				}
				else{
					$this->Session->setFlash('Nom d\'utilisateur ou mot de passe incorrect.','error');
				}
				$this->request->data->password = '';
			}
			if($this->Session->isLogged()){
				if($this->Session->user('rank') == 'admin'){
					$this->redirect('');
				}
				else{
					$this->redirect('');
				}
			}
		}

		function register($id = null){
			$this->loadModel('User');
			if($this->Session->isLogged()){
				$this->redirect('');
				$this->Session->setFlash('Vous êtes déjà inscrit','error');
			}
			else{
				if($id === null){
					$user = $this->User->findFirst(array(
						'conditions'	=> array('rank' => -1)
						));
					if(!empty($user)){
						$id = $user->id;
					}
					else{
						$this->User->save(array(
							'rank' => -1
							));
						$id = $this->User->id;
					}
				}
				$d['id'] = $id;
				if($this->request->data){
					if($this->User->validates($this->request->data)){
						$this->request->data->rank = 'normal';
						$this->request->data->password = sha1($this->request->data->password);
						$this->User->save($this->request->data);
						$id = $this->User->id;
						$this->redirect('users/signin');
						$this->Session->setFlash('Vous vous êtes bien enregistré.');
					}
					else{
						$this->Session->setFlash('Certaines informations ne sont pas valides, merci de les corriger.','error');
					}
				}
				else{
						$this->request->data = $this->User->findFirst(array(
							'conditions'	=> array(
							'id' => $id
							)
						));
				}
				$this->set($d);
			}
			
		}

		function profile(){
			
		}

		function signout(){
			unset($_SESSION['User']);
			$this->Session->setFlash('Vous êtes maintenant déconnecté');
			$this->redirect('');
		}

		function getUsers(){
			$this->loadModel('User');
			return $this->User->find();
		}

	}

?>