<?php echo $users->firstname; ?><br>
<?php echo $users->lastname; ?><br>
<?php echo $users->address; ?>
<?php 
	$announces = $this->request('Announces', 'getAnnounces');
	$user = $this->request('Users','admin_getUsers');
	$comments = $this->request('Comments','getCom');
?>

<?php foreach ($announces as $a): ?>
	<?php if ($a->user_id == $users->id): ?>
		<div class="buble zoombox">
                <div class="arrow"></div>
                 <h3 href="#" class="buble-title"  data-lat="<?php echo $a->lat; ?>" data-lng="<?php echo $a->lng; ?>" >Annonce - <?php echo $a->user_id; ?></h3></a>
                <div class="buble-content">
                       <!-- text annonce -->
                       <p class="bubletxt">
			<b><?php echo $users->firstname.' '.$users->lastname; ?></b><br>
			<?php echo $a->content; ?>
			<?php foreach ($comments as $c): ?>
				<?php if ($c->announce_id == $a->id): ?>
					</p>
					<ul class='buble-info'>
						<li class='icon-with-text-container'>
							<i class='ss-calendar icon-part'></i>
							<div class='text-part'>
								<?php foreach ($user as $u): ?>
									<?php if ($u->id == $a->user_id): ?>
										<b><?php echo $u->firstname.' '.$u->lastname; ?></b>
									<?php endif ?>
								<?php endforeach ?>
								<?php echo $c->content; ?>
							</div>
						</li>
					</ul>
				<?php endif ?>
			<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>
<?php endforeach ?>