<div class="listThreads">

<?php if (!empty($threads)): ?>
<ul class="listing">
	<li class="headings">
		<div class="creator">Ersteller</div>
		<div class="title">Titel</div>
	</li>
<?php foreach ($threads as $thread): ?>
	<li>
		<a class="creator" href="<?php echo ROOT_PATH_ABS ?>/thread/show/name/<?php echo $thread->getSeoTitle() ?>">
			<?php echo $thread->getCreator() ?>
		</a>
		<a class="title" href="<?php echo ROOT_PATH_ABS ?>/thread/show/name/<?php echo $thread->getSeoTitle() ?>">
			<?php echo $thread->getTitle() ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>

<?php else: ?>
<div class="warning">keine Threads vorhanden.</div>
<?php endif ?>

<a class="button pull-right" href="<?php echo ROOT_PATH_ABS ?>/board/postthread">Neuen Thread posten</a><div class="clearfix"></div>

</div>





