<?php

	$title_for_layout = $announce->user_id;

?>
<h2>user_id de l'annonce : <?php echo $announce->user_id; ?></h2>
	
<p><?php echo $announce->content; ?></p>

<p><?php echo $announce->address; ?></p>

<?php $comments = $this->request('Comments','getCom'); ?>

<?php foreach ($comments as $c): ?>

	<?php if ($c->announce_id == $announce->id): ?>
		<h3>user_id du commentaire : <?php echo $c->user_id; ?></h3>
		<?php echo $c->content; ?>
	<?php endif ?>

<?php endforeach ?>

<?php require_once(ROOT.DS.'view'.DS.'comments'.DS.'answer.php'); ?>