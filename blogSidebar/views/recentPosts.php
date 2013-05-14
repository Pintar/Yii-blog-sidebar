<ul>
	<?php foreach($result as $post): ?>
	<li>
		<?php echo CHtml::link(CHtml::encode($post->title), $post->getUrl()); ?>
	</li>
	<?php endforeach; ?>
</ul>