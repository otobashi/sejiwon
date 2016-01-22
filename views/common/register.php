<!-- 본문start -->
<div class="navbar-inner">
     <h5>
     	<i class="icon-info-sign"></i>&nbsp;<?=$reg_user_info?>
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

    <form name="register" class="form-inline" action="/index.php/common/register" method="post">
        <div class="span6 alert alert-info">
            <h5><?=$use_info?></h5>
            <hr>
				<div data-role="collapsible">
					<pre><?=$use_desc?></pre>
				</div>
            <hr>
			<input type="checkbox" name="agree" id="agree" data-mini="true">
			<label for="agree"><?=$agree_check?></label>	
        </div>
        <div class="span6 alert alert-info">
            <h5><?=$reg_user_info?></h5>
            <hr>

			<table style="font-size:12px;margin:0px;padding:0px;width:400;" class="table table-striped">

				<tr>
					<td style="text-align:right;margin:0px;padding:5px;width:150;"><?=$language_info?></td>
					<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:250;">
						<select style="background-color:#FAF4C0;height:30;width:250;margin:0px;padding:0px;" type="text" id="language_id" name="language_id">
						<?php
						foreach($language_use_list as $language){
						?>
						  <option value="<?=$language->id?>" <?php if($language->id === set_value('language_id') ) echo ' selected="selected"';?>><?=$language->description?></option>
						<?php
						}
						?>
						</select>
					</td>
				</tr>

				<tr>
					<td style="text-align:right;margin:0px;padding:5px;width:150;"><?=$id_info?></td>
					<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:250;">
						<input style="background-color:#FAF4C0;height:30;width:250;margin:0px;padding:0px;" type="text" id="user_id" name="user_id" value="<?php echo set_value('user_id'); ?>">
					</td>
				</tr>

				<tr>
					<td style="text-align:right;margin:0px;padding:5px;width:150;"><?=$email_info?></td>
					<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:250;">
						<input style="background-color:#FAF4C0;height:30;width:250;margin:0px;padding:0px;" type="text" id="email" name="email" value="<?php echo set_value('email'); ?>">
					</td>
				</tr>

				<tr>
					<td style="text-align:right;margin:0px;padding:5px;width:150;"><?=$name_info?></td>
					<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:250;">
						<input style="background-color:#FAF4C0;height:30;width:250;margin:0px;padding:0px;" type="text" id="name" name="name" value="<?php echo set_value('name'); ?>">
					</td>
				</tr>

				<tr>
					<td style="text-align:right;margin:0px;padding:5px;width:150;"><?=$password_info?></td>
					<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:250;">
						<input style="background-color:#FAF4C0;height:30;width:250;margin:0px;padding:0px;" type="password" id="password" name="password" value="<?php echo set_value('password'); ?>">
					</td>
				</tr>

				<tr>
					<td style="text-align:right;margin:0px;padding:5px;width:150;"><?=$re_password_info?></td>
					<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:250;">
						<input style="background-color:#FAF4C0;height:30;width:250;margin:0px;padding:0px;" type="password" id="re_password" name="re_password" value="<?php echo set_value('re_password'); ?>">
					</td>
				</tr>

			</table>

			<hr>

            <input type="submit" class="btn" value="<?=$reg_button?>">
    
        </div>
	</form>


</div>

<!-- 본문 end -->
