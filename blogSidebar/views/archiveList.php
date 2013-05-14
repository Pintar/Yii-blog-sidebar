<?php echo Yii::getVersion();?>
<ul class="blog-archive">
<?php foreach($data as $key=>$value):?>
		<?php foreach($data[$key] as $key2=>$value2):?>
				<li class="month">
					<span class="make-border"><?php echo $key2."($key)"; ?></span>
					<ul>
						<?php foreach($data[$key][$key2] as $key3=>$value3):?>
							<li class="make-border">
								<a href="<?php echo $value3['url']; ?>"><?php echo $value3['title']; ?></a>
							</li>
						<?php endforeach; ?>	
					</ul>	
				</li>
	<?php endforeach;?>
<?php endforeach;?>
</ul>
