<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://unpkg.com/@northeastern-web/global-elements@^1.0.0/dist/js/index.umd.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/@northeastern-web/global-elements@^1.0.0/dist/css/index.css">
    <script src="https://unpkg.com/@northeastern-web/kernl-ui@^2.0.0-alpha.44/dist/js/index.umd.js" defer></script>


    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo \Roots\view(\Roots\app('sage.view'), \Roots\app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
