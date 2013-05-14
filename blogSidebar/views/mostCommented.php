<ul>
	
	<?php foreach($result as $comment): ?>
	<li><?php echo $comment->content;?>
		<?php echo CHtml::link(CHtml::encode($comment->post->title), $comment->getUrl()); ?>
	</li>
	<?php endforeach; ?>
</ul>