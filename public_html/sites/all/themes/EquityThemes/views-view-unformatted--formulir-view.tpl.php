
<?php drupal_add_js('misc/form.js'); ?>
<?php drupal_add_js('misc/collapse.js'); ?>

<fieldset class="collapsible collapsed">
  <legend><span class="fieldset-legend"><?php if (!empty($title)) : ?><?php print $title; ?><?php endif; ?></span></legend>
<div class="fieldset-wrapper">
<?php if (!empty($title)): ?>
        <?php endif; ?>
    </legend>  
    <?php foreach ($rows as $id => $row): ?>
        <div class="<?php print $classes[$id]; ?>">
        <?php print $row; ?>
        </div>
    <?php endforeach; ?>
</div>
</fieldset>