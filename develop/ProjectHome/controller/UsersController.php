<?php

	class UsersController extends Controller{
		function signin(){

		}

		function register(){

		}

		function profile(){

		}

		function getUsers(){
			$this->loadModel('User');
			return $this->User->find();
		}

	}

?>