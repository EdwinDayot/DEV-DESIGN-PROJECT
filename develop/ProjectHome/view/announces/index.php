<div class="hero-unit">

	<h1>Les annonces</h1>
	<p>Voici les dernières annonces, haha ! :D</p>
	<p><a href="#" class="btn btn-primary btn-large">En savoir plus &raquo;</a></p>

</div>
<div class="row">
	<?php foreach ($announces as $k => $v): ?>

	    <div class="span4">
			<h2>
				<u>user_id :</u> <?php echo $v->user_id; ?>
			</h2>
			<u>content :</u> 		
			<p><?php echo $v->content; ?></p>
			<u>address :</u>
			<p><?php echo $v->address; ?></p>
			<p><a href="<?php echo Router::url("announces/view/{$v->id}"); ?>" class="btn">Répondre &raquo;</a></p>
		</div>
		
	<?php endforeach ?>
</div>
<div class="pagination">
    <ul>
    	<?php for($i=1; $i <= $page; $i++): ?>
    		<li <?php if($i==$this->request->page){ echo 'class="active"'; }?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    	<?php endfor; ?>
    </ul>
</div>

<?php require_once(ROOT.DS.'view'.DS.'announces'.DS.'post.php'); ?>