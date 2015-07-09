<!-- 본문start -->
<div class="navbar-inner">
     <h5>
     	<i class="icon-info-sign"></i>&nbsp;가계부 - 달력
     </h5>
     <h6>
     	<a href="#"><span class="label label-success">수입</span></a>
     	<a href="#"><span class="label label-warning">지출</span></a>
     	<a href="#"><span class="label">합계</span></a>
<!--    
     	<a href="#"><span class="badge badge-info">일계</span></a>
<span class="badge">회색</span>
<span class="badge badge-inverse">검정</span> 	
     	&nbsp;<a href="#" class="btn-danger btn-mini"></a>&nbsp;Reservation Name List
     	&nbsp;<a href="#" class="btn-success btn-mini"></a>&nbsp;Guest Profile Modify
     	&nbsp;<a href="#" class="btn-warning btn-mini"></a>&nbsp;Reservation Modify
     	&nbsp;<a href="#" class="btn-info btn-mini"></a>&nbsp;Reservation Proof
-->     	
     </h6>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Now Status</strong>&nbsp;&nbsp;&nbsp;<?=$status?>&nbsp;<?php echo validation_errors(); ?>
</div>
<hr>

<form name="month_status" class="form-horizontal" action="/index.php/pinky_write/write_cal" method="post">

<div class="alert alert-info" role="alert">

	<!--h5 style="color:#5D5D5D">검색조건</h5-->
	
	<input type="month" name="ymd" style="background-color:#FAF4C0;height:30;width:150" value="<?=$ymd?>">
	<input type="submit" class="btn btn-primary" value="검색">

</div>
</form>

<h6>

<div class="alert alert-success" role="alert">
	<h4>
		<small style=""> <span class="label label-success">총수입</span> <?=number_format($month_total_acct->in_amt)?>원</small>&nbsp;&nbsp;&nbsp;
		<small style=""> <span class="label label-warning">총지출</span> <?=number_format($month_total_acct->out_amt)?>원</small>&nbsp;&nbsp;&nbsp;
		<small style=""> <span class="label">총합계</span> <?=number_format($month_total_acct->mod_amt)?>원</small>
	</h4>	
</div>

<table style="background-color:#EFEFEF" class="table table-striped">
		<tr>
				<td style="background-color:#EFEFEF;TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">주차</small></td>
				<td style="background-color:#EFEFEF;TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#FF5E00">일</small></td>
				<td style="background-color:#EFEFEF;TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">월</small></td>
				<td style="background-color:#EFEFEF;TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">화</small></td>
				<td style="background-color:#EFEFEF;TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">수</small></td>
				<td style="background-color:#EFEFEF;TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">목</small></td>
				<td style="background-color:#EFEFEF;TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">금</small></td>
				<td style="background-color:#EFEFEF;TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#4374D9">토</small></td>
		</tr>

		<?php
        foreach ($month_status as $cal) {
        	if($cal->byday_sun == 1){ // 달의 맨위를 제외한 밑에 주계
        		echo '<tr>';
        		// Week
        		echo '<td width="16%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:2 2 2 2">';
        		echo '<table class="table table-striped" style="margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="margin:0 0 0 0;padding:0 0 0 0;TEXT-ALIGN:center"><a class="btn btn-info" href="#">'.$cal->week.'</a></td></tr>';
        		foreach ($week_total_acct as $week_list) {
	        		if($cal->week === $week_list->week){
		        		for ($i=0; $i < 3; $i++) { 
		        			switch ($i) {
		        				case 0:
				        			echo '<tr>';
		        					if($week_list->in_amt == 0){
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">&nbsp;</td>';
		        					}
		        					else{
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label label-success">수입</span></a></td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">'.number_format($week_list->in_amt).'</td>';
		        					}
				        			echo '</tr>';
		        					break;
		        				case 1:
				        			echo '<tr>';
		        					if($week_list->out_amt == 0){
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">&nbsp;</td>';
		        					}
		        					else{
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label label-warning">지출</span></a></td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">'.number_format($week_list->out_amt).'</td>';
				        			}
				        			echo '</tr>';
		        					break;
		        				case 2:
				        			echo '<tr>';
	        						if($week_list->mod_amt == 0 || $week_list->in_amt == 0 || $week_list->out_amt == 0){
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">&nbsp;</td>';
		        					}
		        					else{
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label">합계</span></a></td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right"><b>'.number_format($week_list->mod_amt).'</b></td>';
				        			}
				        			echo '</tr>';
		        					break;
		        				default:
		        					# code...
		        					break;
		        			}
		        		}
	        		}
        		}
        		echo '</table>';
        		echo '</td>';
        	}

        	if($cal->day == 1 && $cal->byday_sun > 1){ //달의 맨위 주계

        		// Week
        		echo '<td width="16%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:2 2 2 2">';
        		echo '<table class="table table-striped" style="margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="margin:0 0 0 0;padding:0 0 0 0;TEXT-ALIGN:center"><a class="btn btn-info" href="#">'.$cal->week.'</a></td></tr>';

        		foreach ($week_total_acct as $week_list) {
	        		if($cal->week === $week_list->week){
		        		for ($i=0; $i < 3; $i++) { 
		        			switch ($i) {
		        				case 0:
				        			echo '<tr>';
		        					if($week_list->in_amt == 0){
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">&nbsp;</td>';
		        					}
		        					else{
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label label-success">수입</span></a></td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">'.number_format($week_list->in_amt).'</td>';
				        			}
				        			echo '</tr>';
		        					break;
		        				case 1:
				        			echo '<tr>';
		        					if($week_list->out_amt == 0){
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">&nbsp;</td>';
		        					}
		        					else{
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label label-warning">지출</span></a></td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">'.number_format($week_list->out_amt).'</td>';
				        			}
				        			echo '</tr>';
		        					break;
		        				case 2:
				        			echo '<tr>';
	        						if($week_list->mod_amt == 0 || $week_list->in_amt == 0 || $week_list->out_amt == 0){
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right">&nbsp;</td>';
		        					}
		        					else{
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label">합계</span></a></td>';
					        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 30 0 0;TEXT-ALIGN:right"><b>'.number_format($week_list->mod_amt).'</b></td>';
				        			}
				        			echo '</tr>';
		        					break;
		        				default:
		        					# code...
		        					break;
		        			}
		        		}
	        		}
        		}
        		echo '</table>';
        		echo '</td>';

        		switch ($cal->byday_sun) {
        			case 2:
        				echo '<td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td>';
        				break;
        			case 3:
        				echo '<td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td>';
        				break;
        			case 4:
        				echo '<td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td>';
        				break;
        			case 5:
        				echo '<td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td>';
        				break;
        			case 6:
        				echo '<td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td>';
        				break;
        			case 7:
        				echo '<td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td><td width="12%" style="margin:10 0 0 0;padding:0 0 0 0"></td>';
        				break;
        		}

        	}       	

        	switch ($cal->byday_sun) {
        		case 1:
	        		//일요일
	        		echo '<td width="12%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:2 10 2 2">';
	        		if($ymd == $cal->ymd){
		        		echo '<table class="table table-striped" style="background-color:#FFD9EC;margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="color:#FF5E00;TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a style="color:#FF5E00" role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
	        		}
	        		else{
		        		echo '<table class="table table-striped" style="margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="color:#FF5E00;TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a style="color:#FF5E00" role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
	        		}

        			break;
        		case 7:
    	    		//토요일
	        		echo '<td width="12%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:2 10 2 2">';
	        		if($ymd == $cal->ymd){
		        		if($cal->memo){
			        		echo '<table class="table table-striped" style="background-color:#FFD9EC;margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="color:#FF5E00;TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a style="color:#FF5E00" role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
		        		}
		        		else{
			        		echo '<table class="table table-striped" style="background-color:#FFD9EC;margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="color:#4374D9;TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a style="color:#4374D9" role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
		        		}
	        		}
	        		else{
		        		if($cal->memo){
			        		echo '<table class="table table-striped" style="margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="color:#FF5E00;TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a style="color:#FF5E00" role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
		        		}
		        		else{
			        		echo '<table class="table table-striped" style="margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="color:#4374D9;TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a style="color:#4374D9" role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
		        		}
	        		}

        			break;

        		default :
	        		//평일
	        		echo '<td width="12%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:2 10 2 2">';
	        		if($ymd == $cal->ymd){
		        		if($cal->memo){
			        		echo '<table class="table table-striped" style="background-color:#FFD9EC;margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="color:#FF5E00;TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a style="color:#FF5E00" role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
		        		}
		        		else{
			        		echo '<table class="table table-striped" style="background-color:#FFD9EC;margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
		        		}
	        		}
	        		else{
		        		if($cal->memo){
			        		echo '<table class="table table-striped" style="margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="color:#FF5E00;TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a style="color:#FF5E00" role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
		        		}
		        		else{
			        		echo '<table class="table table-striped" style="margin:10 0 0 0;padding:0 0 0 0"><tr><td colspan="2" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:0 10 0 0">'.$cal->memo.'&nbsp<a role="button" class="btn" href="/index.php/pinky_write/acct_mgr/'.$cal->ymd.'">'.$cal->day.'</a></td></tr>';
		        		}
	        		}

       				break;
        	}

    		foreach ($month_status_acct as $ac_list) {
        		if($cal->ymd === $ac_list->ymd){
	        		for ($i=0; $i < 3; $i++) { 
	        			switch ($i) {
	        				case 0:
			        			echo '<tr>';
	        					if($ac_list->in_amt == 0){
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 10 0 0;TEXT-ALIGN:right">&nbsp;</td>';
	        					}
	        					else{
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label label-success">수입</span></a></td>';
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 10 0 0;TEXT-ALIGN:right">'.number_format($ac_list->in_amt).'</td>';
			        			}
			        			echo '</tr>';
	        					break;
	        				case 1:
			        			echo '<tr>';
	        					if($ac_list->out_amt == 0){
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 10 0 0;TEXT-ALIGN:right">&nbsp;</td>';
	        					}
	        					else{
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label label-warning">지출</span></a></td>';
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 10 0 0;TEXT-ALIGN:right">'.number_format($ac_list->out_amt).'</td>';
			        			}
			        			echo '</tr>';
	        					break;
	        				case 2:
			        			echo '<tr>';
        						if($ac_list->mod_amt == 0 || $ac_list->in_amt == 0 || $ac_list->out_amt == 0){
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left">&nbsp;</td>';
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 10 0 0;TEXT-ALIGN:right">&nbsp;</td>';
	        					}
	        					else{
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 0 0 10;TEXT-ALIGN:left"><a href="#"><span class="label">합계</span></a></td>';
				        			echo '<td style="font-size:11px;margin:0 0 0 0;padding:0 10 0 0;TEXT-ALIGN:right"><b>'.number_format($ac_list->mod_amt).'</b></td>';
			        			}
			        			echo '</tr>';
	        					break;
	        				default:
	        					# code...
	        					break;
	        			}
	        		}
        		}
    		}

    		echo '</table>';
    		echo '</td>';

        	if($cal->byday_sun == 7){
        		echo '</tr>';
        		//echo '<tr><td colspan="8"></td></tr>';
        	}

        }
		?>
</table>
</h6>

<?php
/*    foreach ($month_status as $cal) {
?>
		<!-- Reservation Name List -->
		<form name="room_request_cleaning" class="form-horizontal" action="/index.php/pms_room/room_request_cleaning" method="post">
		<div id="acct<?=$cal->ymd?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeAddLabel" aria-hidden="true">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 id="myModalLabel"><?=$cal->ymd.'의 수입/지출 현황'?></h5>
			</div>

			<div class="modal-body">
				<p>

					<div class="control-group info">
						<label class="control-label" for="inputInfo">일자</label>
						<div class="controls">
							<input type="text" id="inputInfo" name="ymd" style="background-color:#FAF4C0;" value="" disabled="true">
						</div>
					</div>

					<div class="control-group info">
						<label class="control-label" for="inputInfo">요청</label>
						<div class="controls">
							<label class="radio">
								<input type="radio" name="request_type" id="optionsRadios1" value="S" checked>
								Staff Request
							</label>
							<label class="radio">
								<input type="radio" name="request_type" id="optionsRadios2" value="G">
								Guest Request
							</label>
						</div>
					</div>

					<div class="control-group info">
					  <label class="control-label" for="inputInfo">비고(특이사항)</label>
					  <div class="controls">
					    <textarea name="description" style="height:200;width:300"><?=$r_list->description?></textarea>
					  </div>
					</div>

				    <input type="hidden" name="room_condition" value="1">
				</p>
			</div>
			<div class="modal-footer">
				<input type="submit" value="Request Cleaning" class="btn btn-success">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>

		</form>

<?php
	}*/
?>

<!-- 본문 end -->
