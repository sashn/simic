<div class="listReplies">

<?php if (!empty($replies)): ?>
<ul class="listing">
	<li class="headings">
		<div class="creator">Ersteller</div>
		<div class="title">Text</div>
	</li>
<?php foreach ($replies as $reply): ?>
	<li>
		<div class="creator">
			<?php echo $reply->getCreator() ?>
		</div>
		<div class="text">
			<strong><?php echo $reply->getTitle() ?></strong><br/><br/>
			<?php echo $reply->getText() ?>
		</div>
	</li>
<?php endforeach; ?>
</ul>

<?php else: ?>
<div class="warning">FEHLER! $replies leer!</div>
<?php endif ?>

<a class="button pull-right" href="<?php echo ROOT_PATH_ABS ?>/thread/postreply/name/<?php echo $thread->getSeoTitle() ?>">Neue Antwort posten</a><div class="clearfix"></div>

</div>




