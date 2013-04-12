<?php

	class CommentsController extends Controller{
		function answer(){
			$this->loadModel('Comment');
		}

		function getCom(){
			$this->loadModel('Comment');
			return $this->Comment->find();
		}

	}

?>