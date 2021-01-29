<div class="PageNews">
  <?php if (empty($fields['field_image_thumbnail']->content)): ?>
     <div class="PageNews_img"><?php print $fields['field_image']->content; ?></div>
	 <?php else: ?>
	 <div class="PageNews_img"><?php print $fields['field_image_thumbnail']->content; ?></div>
  <?php endif; ?>
  <div class="newsDate"><?php print $fields['created']->content; ?></div>
  <h3><?php print $fields['title']->content; ?></h3>
</div>
