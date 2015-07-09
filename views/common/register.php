<!-- 본문start -->
<div class="navbar-inner">
     <h5>
     	<i class="icon-info-sign"></i>&nbsp;사용자등록
     </h5>
     <!--h6>
     	&nbsp;<a href="#" class="btn-danger btn-mini"></a>&nbsp;Room Delete
     	&nbsp;<a href="#" class="btn-success btn-mini"></a>&nbsp;Room Modify
     	&nbsp;<a href="#" class="btn-warning btn-mini"></a>&nbsp;Amenity
     	&nbsp;<a href="#" class="btn-info btn-mini"></a>&nbsp;Description
     </h6-->
</div>

<div class="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Now Status</strong>&nbsp;&nbsp;&nbsp;<?=$status?>&nbsp;<?php echo validation_errors(); ?>
</div>

<hr>

<div class="row-fluid">

    <form class="form-inline" action="/index.php/common/register" method="post">
        <div class="span6 alert alert-info">

                <h5>Pinky 이용동의</h5>
                <hr>

									<div data-role="collapsible">
											&nbsp;&nbsp;본 Pinky Household ledger(가계부)를 이용하면서 취득한 정보는 개인적인 영리목적으로 이용하지 않음을 원칙으로 합니다.
											이를 위반하여 생긴 문제는 사용자 개개인에게 법적 민,형사상의 책임을 묻겠습니다.
											<br><br>시스템에 사용자 등록 업무를 맡고 계신 담당자는 이 사실을 사용자에게 공지 및 동의 후 사용자 등록을 하시기 바랍니다.
                </div>
                <hr>
									<input type="checkbox" name="agree" id="agree" data-mini="true">
							    <label for="agree">동의합니다.</label>	
        </div>
        <div class="span6 alert alert-info">
                <h5>사용자 등록</h5>
                <hr>

				<dl class="dl-horizontal">

				  <dt>User ID</dt>
				  <dd><input type="text" id="user_id" name="user_id" value="<?php echo set_value('user_id'); ?>" placeholder="User ID"></dd>
				  <br>

				  <dt>e-Mail</dt>
				  <dd><input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="e-Mail"></dd>
				  <br>

				  <dt>Name</dt>
				  <dd><input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>"  placeholder="Name"></dd>
				  <br>

				  <dt>Password</dt>
				  <dd><input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>"   placeholder="Password"></dd>
				  <br>

				  <dt>Re-Password</dt>
				  <dd><input type="password" id="re_password" name="re_password" value="<?php echo set_value('re_password'); ?>"   placeholder="Password Confirm"></dd>
				  <br>

				  <dt>Authority</dt>
				  <dd>
					  <input type="radio" name="auth" id="optionsRadios1" value="20">관리자 &nbsp;&nbsp;&nbsp;
					  <input type="radio" name="auth" id="optionsRadios2" value="10" checked>사용자
				  </dd>

				</dl>
				<hr>

                <input type="submit" class="btn" value="등록">
        
        </div>
	</form>


</div>

<!-- 본문 end -->
