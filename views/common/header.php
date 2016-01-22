<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=$logo?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/static/lib/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="/static/lib/bootstrap-calendar-master/css/calendar.min.css">
    <link rel="stylesheet" href="/static/lib/bootstrap-calendar-master/css/calendar.css">

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>

    <script src="//code.jquery.com/jquery-1.11.0.js"></script>
    <script>
      $( document ).ready( function() {
        $( '.check-all' ).click( function() {
          $( '.ab' ).prop( 'checked', this.checked );
        } );
      } );
    </script>
    <link href="/static/lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><?=$logo?></a>
          <div class="nav-collapse collapse">

            <ul class="nav">
              <?php
              foreach($project_use_list as $project){
              ?>
                <li><a href="<?=$project->link?>"><?=$project->project?></a></li>
              <?php
              }
              ?>
            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span10">