<div class="listReplies">

<?php if(empty($replies)): ?>
	no entries yet =(<br/><br/>
<?php else: ?>

	<?php foreach($replies as $reply): ?>
		<div style="width:400px; border: 5px solid black;">
			<strong><?php echo $reply->getCreator() ?></strong> wrote:<br/><br/>
			<?php echo $reply->getText() ?>
		</div><br/>
	<?php endforeach; ?>

<?php endif; ?>

<a class="button pull-right" href="<?php echo ROOT_PATH_ABS ?>/thread/postreply/name/<?php echo $thread->getSeoTitle() ?>">Neue Antwort posten</a><div class="clearfix"></div>

</div>












