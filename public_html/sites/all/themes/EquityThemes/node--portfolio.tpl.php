<div id="node-<?php print $node->nid; ?>" class="post <?php print $classes; ?>"<?php print $attributes; ?>>

  <?php if (!$page): ?>
    <?php print $user_picture; ?>

    <?php print render($title_prefix); ?>
    <?php if ($node->type == 'blog' || $node->type == 'article') { ?>
      <h2<?php print $title_attributes; ?> class="blogTitle"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php } else { ?>

      <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?> class="blogTitle"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
    <?php } ?>
    <?php print render($title_suffix); ?>


    <?php if ($display_submitted): ?>
      <div class="submitted post-meta">
        <?php print $submitted; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_image'])): ?>
      <?php
      hide($content['field_image']);
      $field_image = field_get_items('node', $node, 'field_image');
      if (!empty($field_image) && count($field_image) == 1):
        ?>

        <?php $image_view_url = file_create_url($field_image[0]['uri']); ?>
        <div class="post-thumb">
          <a href="<?php print $image_view_url; ?>" rel="imagebox[gallery<?php print $node->nid; ?>]" title="<?php print $node->title; ?>">
            <?php print theme('image_style', array('style_name' => 'blog_teaser', 'path' => $field_image[0]['uri'])); ?>
            <div class="overlay zoom"></div>
          </a>
        </div>
      <?php endif; ?>

      <?php if (!empty($field_image) && count($field_image) > 1): ?>
        <div class="flexslider blog">

          <ul class="slides">
            <?php foreach ($field_image as $img): ?>
              <?php $img_view = file_create_url($img['uri']); ?>
              <li><a href="<?php print $img_view; ?>" rel="imagebox[gallery<? print $node->nid; ?>]" title="<?php print $node->title; ?>"><?php print theme('image_style', array('style_name' => 'blog_teaser', 'path' => $img['uri'])); ?><div class="overlay zoom"></div></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="post-content content"<?php print $content_attributes; ?>>
      <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
      ?>
    </div>
    <?php if ($page): ?>
      <?php print render($content['links']); ?>
    <?php endif; ?>
    <?php if (!$page): ?>
      <a href="<?php print $node_url; ?>" class="post-entry"><?php print t('Continue Reading'); ?></a>
    <?php endif; ?>

    <?php print render($content['comments']); ?>

  <?php endif; ?>

  <?php if ($page): ?>
    <div class="twelve columns">
      <?php if (!empty($content['field_image'])): ?>
        <?php
        hide($content['field_image']);
        $field_image = field_get_items('node', $node, 'field_image');
        if (!empty($field_image) && count($field_image) == 1):
          ?>

          <?php $image_view_url = file_create_url($field_image[0]['uri']); ?>
          <div class="post-thumb">
            <a href="<?php print $image_view_url; ?>" rel="imagebox[gallery<?php print $node->nid; ?>]" title="<?php print $node->title; ?>">
              <?php print theme('image_style', array('style_name' => 'portfolio_view', 'path' => $field_image[0]['uri'])); ?>
              <div class="overlay zoom"></div>
            </a>
          </div>
        <?php endif; ?>

        <?php if (!empty($field_image) && count($field_image) > 1): ?>
          <div class="flexslider blog">

            <ul class="slides">
              <?php foreach ($field_image as $img): ?>
                <?php $img_view = file_create_url($img['uri']); ?>
                <li><a href="<?php print $img_view; ?>" rel="imagebox[gallery<?php print $node->nid; ?>]" title="<?php print $node->title; ?>"><?php print theme('image_style', array('style_name' => 'portfolio_view', 'path' => $img['uri'])); ?><div class="overlay zoom"></div></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="four columns">
      <div class="post-content content"<?php print $content_attributes; ?>>
        <h3><hr></h3>
        <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_portfolio_link']);
        print render($content);
        ?>
        <?php
        $project_link = field_get_items('node', $node, 'field_portfolio_link');
        if (!empty($project_link)):
          ?>
          <br />
          <a class="button gray" href="<?php print url($project_link[0]['value']); ?>"><?php print t('Launch Project'); ?></a>
        <?php endif; ?>

      </div>
    </div>

    <?php print render($content['links']); ?>
    <?php print render($content['comments']); ?>
  <?php endif; ?>
</div>

<?php
$nids = db_query("SELECT n.nid FROM {node} n WHERE n.status = 1 AND n.type = :type AND n.nid <> :nid ORDER BY RAND() LIMIT 0,4", array(':type' => 'portfolio', ':nid' => $node->nid))->fetchCol();

$nodes = node_load_multiple($nids);
?>
<?php if (!empty($nodes)): ?>

  <!-- Portfolio Content -->

  <!-- Related Project -->
  <div class="sixteen columns">
    <h3 class="page_headline"><hr /></h3>
  </div><!-- End Related Project -->

  <?php foreach ($nodes as $node) : ?>
    <!-- 1/4 Column -->
    <div class="four columns portfolio-item architecture real-estate">
      <?php $field_image = field_get_items('node', $node, 'field_image'); ?>
      <?php if (!empty($field_image)) : ?>
        <div class="item-img"><a href="<?php print url('node/' . $node->nid); ?>"><?php print theme('image_style', array('style_name' => 'portfolio_view', 'path' => $field_image[0]['uri'])); ?><div class="overlay link"></div></a></div>
      <?php endif; ?>
      <div class="portfolio-item-meta">
        <h4><?php print l($node->title, 'node/' . $node->nid); ?></h4>

        <?php
        $body = field_get_items('node', $node, 'body');
        if (!empty($body)) {
          print custom_trim_text(array('max_length' => 120), $body[0]['value']);
        }
        ?>
      </div>
    </div>
  <?php endforeach; ?>

<?php endif; ?>

