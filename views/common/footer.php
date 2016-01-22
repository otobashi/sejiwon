        </div><!--/span-->


        <div class="span2">
          <div class="well sidebar-nav" style="margin:0 0 5 0;padding:0px;">
              <ul class="nav nav-list">              
                <li class="nav-header"><?=$login_info?></li>
                <li class="divider"></li>

                <?php
                    if($user_id){
                ?>
                        <li><a href="#"><?=$name?>&nbsp;<?php if($auth_name){ echo '['.$auth_name.']';}?></li>
                        <li>
                          <a href="/index.php/common/logout" class="btn"><?=$logout_button?></a>
                        </li>
                <?php
                    }
                    else{
                ?>
                        <form name="sign" action="/index.php/common/login" method="post" style="text-align:center">
                        <li>
                            <input name="user_id" type="text" placeholder="<?=$id_info?>" data-mini="true" style="width:150;height:30;margin:0 0 0 20;padding:0px;">
                            <input name="password" type="password" placeholder="<?=$password_info?>" data-mini="true" style="width:150;height:30;margin:0 0 0 20;padding:0px;">
                        </li>
                        <li class="divider"></li>
                        <li>
                            <input type="submit" class="btn btn-info" value="<?=$login_button?>"/>
                            <a href="/index.php/common/register" class="btn btn-primary"><?=$register_button?></a>
                        </li>
                        </form>
                <?php
                    }
                ?>

              </ul>

          </div>

          <!-- Menu -->
          <div class="accordion" id="sejiwon_menu">

              <?php
              foreach($menu1_use_list as $menu1){
              ?>
                  <div class="accordion-group">

                      <div class="accordion-heading">
                          <a class="accordion-toggle btn" data-toggle="collapse" data-parent="#sejiwon_menu" href="#menu_<?=$menu1->menu_id?>">
                            <?=$menu1->menu?>
                          </a>
                      </div>

                      <div id="menu_<?=$menu1->menu_id?>" class="accordion-body collapse in">

                          <div class="accordion-inner">
                              <ul class="nav nav-list">
                                  <?php
                                  foreach($menu2_use_list as $menu2){
                                    if($menu1->menu_id == $menu2->menu_high_id){
                                  ?>
                                      <li class="nav-header" style="margin:0px;padding:0px;"><?=$menu2->menu?></li>
                                      <?php
                                      foreach($menu3_use_list as $menu3){
                                        if($menu2->menu_id == $menu3->menu_high_id){
                                      ?>
                                          <li><a href="#" style="margin:0 0 0 20;padding:0px;"><?=$menu3->menu?></a></li>
                                      <?php
                                        }
                                      }
                                      ?>
                                  <?php                                      
                                    }
                                  }
                                  ?>
                              </ul>
                          </div>

                      </div>

                  </div>
              <?php
              }
              ?>

          </div>

        </div><!--/span-->

      </div><!--/row-->

      <hr>

    <!--div class="well well-small">
        <h5>HOT KEY</h5>

        <ul class="nav nav-pills" style="margin:0 0 0 0">
            <li class="disabled"><a href="#"><small>가계부</small></a></li>
            <li><a href="/index.php/pinky_write/write_cal"><small>달력</small></a></li>
            <li><a href="/index.php/pinky_write/acct_mgr/<?=date('Y-m-d')?>"><small>쓰기</small></a></li>
        </ul>
    </div-->

      <footer>
        <p>&copy; Created by Sejiwon co.,Ltd</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster /static/lib/bootstrap/ -->
    <script src="/static/lib/bootstrap/js/jquery.js"></script>
    <script src="/static/lib/bootstrap/js/transition.js"></script>
    <script src="/static/lib/bootstrap/js/alert.js"></script>
    <script src="/static/lib/bootstrap/js/bootstrap-modal.js"></script>
    <script src="/static/lib/bootstrap/js/dropdown.js"></script>
    <script src="/static/lib/bootstrap/js/scrollspy.js"></script>
    <script src="/static/lib/bootstrap/js/tab.js"></script>
    <script src="/static/lib/bootstrap/js/tooltip.js"></script>
    <script src="/static/lib/bootstrap/js/popover.js"></script>
    <script src="/static/lib/bootstrap/js/button.js"></script>
    <script src="/static/lib/bootstrap/js/collapse.js"></script>
    <script src="/static/lib/bootstrap/js/carousel.js"></script>
    <script src="/static/lib/bootstrap/js/typeahead.js"></script>
<!--
    <script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-transition.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-alert.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-modal.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-scrollspy.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-tab.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-tooltip.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-popover.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-button.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-collapse.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-carousel.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-typeahead.js"></script>
    -->
  </body>
</html>