
  <?php
  require_once 'portfolio_filter.tpl.php';
  ?>

  <?php if (!empty($nodes)): ?>
    <div id="portfolio-wrapper">
      <?php
      foreach ($nodes as $node) :
        ?>
        <?php
        $image_full = '';
        $image_field = field_get_items('node', $node, 'field_image');
        if (!empty($image_field)) {
          $image_full = file_create_url($image_field[0]['uri']);
        }
        /* if (!empty($node->field_portfolio_image[LANGUAGE_NONE][0]['uri'])) {
          $image_full = file_create_url($node->field_portfolio_image[LANGUAGE_NONE][0]['uri']);
          } */
        ?>
        <!-- 1/2 Column -->
        <div class="four columns portfolio-item <?php print portfolio_format_terms('field_portfolio_category', $node); ?>">
          <?php if (!empty($image_field)): ?>
            <div class="item-img">
              <?php
              $image_uri = $image_field[0]['uri'];
              //$image_url = file_create_url($image_uri);
              $style_name = 'portfolio_item';
              $node_url = url('node/' . $node->nid);
              $node_title = $node->title;
              ?>
              <a href="<?php print $image_full; ?>" rel="imagebox" title="<?php print $node->title; ?>">
                <?php print theme('image_style', array('style_name' => $style_name, 'path' => $image_uri,)); ?>
                <div class="overlay zoom"></div></a>

            </div>
          <?php endif; ?>
          <div class="portfolio-item-meta">
            <h4><?php print l($node->title, 'node/' . $node->nid); ?></h4>
            <?php
            $body = field_get_items('node', $node, 'body');
            if (!empty($body)) {
              
            }
            ?>
          </div>
        </div>

      <?php endforeach; ?>

    </div>
  <?php endif; ?>
