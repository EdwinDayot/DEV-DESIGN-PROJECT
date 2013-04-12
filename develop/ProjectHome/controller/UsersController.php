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

		function register(){

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