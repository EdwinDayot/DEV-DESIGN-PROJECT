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
		<blockquote>
			<b><?php echo $users->firstname.' '.$users->lastname; ?></b><br>
			<?php echo $a->content; ?>
			<?php foreach ($comments as $c): ?>
				<?php if ($c->announce_id == $a->id): ?>
					<blockquote>
						<?php foreach ($user as $u): ?>
							<?php if ($u->id == $a->user_id): ?>
								<b><?php echo $u->firstname.' '.$u->lastname; ?></b>
							<?php endif ?>
						<?php endforeach ?>
						<?php echo $c->content; ?>
					</blockquote>
				<?php endif ?>
			<?php endforeach ?>
			
		</blockquote>
	<?php endif ?>
<?php endforeach ?>