<div class="hero-unit">

	<h1>Les annonces</h1>
	<p>Voici les dernières annonces, haha ! :D</p>
	<p><a href="#" class="btn btn-primary btn-large">En savoir plus &raquo;</a></p>

</div>
<div class="row">
	<?php $users = $this->request('Users','getUsers'); ?>
	<?php foreach ($announces as $k => $v): ?>

	    <div class="span4">
	    	<blockquote>
	    		<small><?php echo $v->address; ?></small><br>
				<?php foreach ($users as $u): ?>
					<?php if ($u->id == $v->user_id): ?>
						<b><?php echo $u->firstname.' '.$u->lastname ?></b>.
					<?php endif ?>
				<?php endforeach ?>	
				<p><?php echo $v->content; ?></p>
	    	</blockquote>
			<p><a href="<?php echo Router::url("announces/view/{$v->id}"); ?>" class="btn">Répondre &raquo;</a></p>
		</div>
		
	<?php endforeach ?>
</div>

<?php require_once(ROOT.DS.'view'.DS.'announces'.DS.'post.php'); ?>