<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pinky - Household Ledger</title>
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
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--a class="brand" href="/"><?=$logo?></a-->
          <a class="brand" href="/">Pinky</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">가계부 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="nav-header">쓰기</li>
                  <li><a href="/index.php/pinky_write/write_cal" data-ajax="false">&nbsp;&nbsp;달력</a></li>
                  <li><a href="/index.php/pinky_write/acct_mgr/<?=date('Y-m-d')?>" data-ajax="false">&nbsp;&nbsp;쓰기</a></li>
                  <!--li class="divider"></li>
                  <li><a href="/index.php/pinky_write/write_cal" data-ajax="false">&nbsp;&nbsp;수입</a></li>
                  <li><a href="/index.php/acct/acct_mgr" data-ajax="false">&nbsp;&nbsp;지출</a></li>
                  <li><a href="/index.php/acct/plan_mgr" data-ajax="false">&nbsp;&nbsp;예산</a></li-->
                </ul>
              </li>

              <!--li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">보고서 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="nav-header">결산</li>
                  <li><a href="/index.php/report/set_year" data-ajax="false">&nbsp;&nbsp;년결산</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">캘린더</li>
                  <li><a href="/index.php/report/zero_cal" data-ajax="false">&nbsp;&nbsp;무지출캘린더</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">그래프</li>
                  <li><a href="/index.php/report/grp_year" data-ajax="false">&nbsp;&nbsp;월별비중</a></li>
                </ul>
              </li-->

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">환경설정 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="nav-header">기본코드</li>
                  <li><a href="/index.php/pinky_config/acct_code" data-ajax="false">&nbsp;&nbsp;분류</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">현금관리</li>
                  <li><a href="/index.php/pinky_config/cash_code" data-ajax="false">&nbsp;&nbsp;통장/지갑</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">사용자관리</li>
                  <li><a href="/index.php/common/register" data-ajax="false">&nbsp;&nbsp;사용자등록</a></li>
                </ul>
              </li>

            </ul>

            <ul class="nav pull-right">
              <li class="divider-vertical" data-ajax="false"></li>
              <?php
                  if($user_id){
              ?>
                    <li><a href="#"><?=$name?>&nbsp;</li>
                    <a href="/index.php/common/logout" class="btn">Logout</a>
              <?php
                  }
                  else{
              ?>
              <li>
                    <!--?php echo validation_errors(); ?-->
                    <form class="navbar-form pull-right" action="/index.php/common/login" method="post">
                      <input class="span1" name="user_id" type="text" placeholder="ID" data-mini="true">
                      <input class="span1" name="password" type="password" placeholder="PW" data-mini="true">
                      <input type="submit" class="btn" value="Login"/>
                    </form>
              </li>

              <?php
                  }
              ?>

            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
