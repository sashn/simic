
<?php if(empty($replies)): ?>
	no entries yet =(<br/><br/>
<?php else: ?>

	<?php foreach($replies as $reply): ?>
		<div style="width:400px; border: 5px solid black;">
			<strong><?php echo $reply->getName() ?></strong> wrote:<br/><br/>
			<?php echo $reply->getText() ?>
		</div><br/>
	<?php endforeach; ?>

<?php endif; ?>

<a href="post">post Reply</a>














