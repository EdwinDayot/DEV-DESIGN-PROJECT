<html lang="fr">
  <head>
    <meta charset="utf-8">
    <?php $configs = $this->request('Configs','getConfig'); ?>
    <?php foreach ($configs as $configs): ?>
      <?php if ($configs->name == 'title'): ?>
        <title><?php echo isset($title_for_layout)?$title_for_layout:$configs->value; ?></title>
      <?php endif ?>
    <?php endforeach ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo Router::webroot('css/bootstrap.css'); ?>" rel="stylesheet">
    <style>
      html,
      body {
        height: 100%;
      }

      #wrap{
        min-height: 100%;
        height: auto !important;
        height: 100%;
        margin: 0 auto -60px;
      }

      #wrap > .container{
        padding-top: 60px;
      }

      #footer{
        height: 60px;
      }
      #footer{
        background: #f5f5f5;
      }

      .container .credit {
        margin: 20px 0;
      }
    </style>
    <link href="<?php echo Router::webroot('css/bootstrap-responsive.css'); ?>" rel="stylesheet">
  </head>

  <body>
    <div id="wrap">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo Router::url(''); ?>">Project4Home</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="<?php echo Router::url(''); ?>">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="<?php echo Router::url('announces/post'); ?>">Poster une annonce</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>

      <div class="container">

        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>

      </div> <!-- /container -->
    </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Router::webroot('js/bootstrap.js'); ?>"></script>

  </body>
</html>