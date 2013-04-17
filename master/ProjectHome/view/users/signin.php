<?php

	$title_for_layout = 'Connexion';

?>

<div class="page-header">
	<h2>Connexion</h2>
</div>

<form action="<?php echo Router::url('users/signin/'); ?>" method="post">

	<label for="inputlogin">Nom d'utilisateur</label>
	<?php echo $this->Form->input('login', 'Nom d\'utilisateur'); ?>

	<label for="inputpassword">Mot de passe</label>
	<?php echo $this->Form->input('password', 'Mot de passe', array(
		'type'	=> 'password'
		)); ?>

	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Envoyer</button>
	</div>

</form>