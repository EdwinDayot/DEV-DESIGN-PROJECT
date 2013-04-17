<form action="<?php echo Router::url('users/register/'); ?>" method="post">

	<?php echo $this->Form->input('id','hidden'); ?>

	<label for="inputlogin">Nom d'utilisateur</label>
	<?php echo $this->Form->input('login', 'Nom d\'utilisateur'); ?>

	<label for="inputpassword">Mot de passe</label>
	<?php echo $this->Form->input('password', 'Mot de passe', array(
		'type'	=> 'password'
		)); ?>

	<label for="inputfirstname">Prénom</label>
	<?php echo $this->Form->input('firstname', 'Prénom'); ?>

	<label for="inputlastname">Nom</label>
	<?php echo $this->Form->input('lastname', 'Nom'); ?>

	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Envoyer</button>
	</div>

</form>