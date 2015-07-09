<!-- 본문start -->
<div class="navbar-inner">
     <h5>
     	<i class="icon-info-sign"></i>&nbsp;가계부 - 쓰기
     </h5>
     <h6>
<!--    
     	<a href="#"><span class="label label-success">수입</span></a>
     	<a href="#"><span class="label label-warning">지출</span></a>
     	<a href="#"><span class="label">합계</span></a>
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

<div class="alert alert-info" role="alert">
	<form name="acct_mgr" class="form-horizontal" action="/index.php/pinky_write/acct_mgr/<?=$ymd?>" method="post" style="margin:0px;padding:0px;">
		<p style="margin:0px;padding:0px;">일자
			<input type="date" name="ymd" data-role="date" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" value="<?=$ymd?>">
			<input type="submit" class="btn btn-primary" value="검색">
		</p>
	</form>
</div>

<div>
	<form name="acct_mgr_add" class="form-horizontal" action="/index.php/pinky_write/acct_mgr_add" method="post">

		<table style="font-size:11px;background-color:#FFFFFF" class="table table-bordered table-striped">
			<tr>
				<td style="text-align:center;height:30px;width:130px;margin:0px;padding:10px 0px 10px 0;">일자</td>
				<td style="text-align:center;height:30px;width:200px;margin:0px;padding:10px 0px 10px 0;">분류</td>
				<td style="text-align:center;height:30px;width:200px;margin:0px;padding:10px 0px 10px 0;">통장</td>
				<td style="text-align:center;height:30px;width:100px;margin:0px;padding:10px 0px 10px 0;">지갑</td>
				<td style="text-align:center;height:30px;width:100px;margin:0px;padding:10px 0px 10px 0;">입금</td>
				<td style="text-align:center;height:30px;width:100px;margin:0px;padding:10px 0px 10px 0;">출금</td>
				<td style="text-align:center;height:30px;width:280px;margin:0px;padding:10px 0px 10px 0;">비고</td>
				<td style="text-align:center;margin:0px;padding:10px 0px 10px 0;">&nbsp;</td>
			</tr>
			<tr>
				<td style="background-color:#FAF4C0;margin:0px;padding:0px;"><input type="date" name="ymd" data-role="date" style="font-size:11px;background-color:#FAF4C0;height:30px;width:130px;margin:0px;padding:0px;border:none" value="<?=$ymd?>"></td>
				<td style="background-color:#FAF4C0;margin:0px;padding:0px;">
					<select name="acct_dtl_id" id="acct_dtl_id" style="font-size:11px;background-color:#FAF4C0;height:30;width:200;margin:0px;padding:0px;border:none" data-mini="true">
						<option value=""><h6>계정과목 선택</h6></option>
						<?php
						foreach($acct_list as $list){
						?>
						<option value="<?=$list->acct_dtl_id?>">[<?=$list->acct_mst_nm?>]<?=$list->acct_dtl_nm?></option>
						<?php
						}
						?>
					</select>
				</td>
				<td style="margin:0px;padding:0px;">
					<select name="bank_id" id="bank_id" style="font-size:11px;height:30;width:200;margin:0px;padding:0px;border:none" data-mini="true">
						<option value=""><h6>통장선택</h6></option>
						<?php
						foreach($bank_list as $bank){
						?>
						<option value="<?=$bank->bank_id?>">[<?=$bank->bank_nm?>]<?=$bank->acct_nm?></option>
						<?php
						}
						?>
					</select>
				</td>
				<td style="margin:0px;padding:0px;">
					<select name="wallet_id" id="wallet_id" style="font-size:11px;height:30;width:100;margin:0px;padding:0px;border:none" data-mini="true">
						<option value=""><h6>지갑선택</h6></option>
						<?php
						foreach($wallet_list as $wallet){
						?>
						<option value="<?=$wallet->wallet_id?>"><?=$wallet->wallet_nm?></option>
						<?php
						}
						?>
					</select>
				</td>
				<td style="margin:0px;padding:0px;"><input type="text" name="in_amt" style="text-align:right;font-size:11px;height:30;width:100;margin:0px;padding:0px;border:none" value=""></td>
				<td style="margin:0px;padding:0px;"><input type="text" name="out_amt" style="text-align:right;font-size:11px;height:30;width:100;margin:0px;padding:0px;border:none" value=""></td>
				<td style="margin:0px;padding:0px;"><input type="text" name="description" style="font-size:11px;height:30;width:280;margin:0px;padding:0px;border:none" value=""></td>
				<td style="margin:0px;padding:0px;"><input type="submit" class="btn btn-primary" value="추가"></td>
			</tr>
		</table>

	</form>
</div>
<h6>

<div>

	<table style="background-color:#FFFFFF" class="table table-bordered table-striped">
		<tr>
				<td width="2%"  style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">&nbsp;</small></td>
				<td width="1%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">ID</small></td>
				<td width="10%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">일자</small></td>
				<td width="19%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">분류</small></td>
				<td width="15%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">통장</small></td>
				<td width="15%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">지갑</small></td>
				<td width="10%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">입금</small></td>
				<td width="10%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">출금</small></td>
				<td width="15%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">비고</small></td>
				<td width="2%"  style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000">&nbsp;</small></td>
		</tr>
		<?php
		  $sum_in_amt = 0;
		  $sum_out_amt = 0;

		  foreach($accr_mgr_list as $mgr_list){
		  	$sum_in_amt  += $mgr_list->in_amt;
		  	$sum_out_amt += $mgr_list->out_amt;

		  	if($mgr_list->cd == '1'){
		  		$mark = '<a href="#AcctUpd'.$mgr_list->id.'" data-toggle="modal"><span class="label label-success">수입</span></a>';
		  	}
		  	else{
		  		$mark = '<a href="#AcctUpd'.$mgr_list->id.'" data-toggle="modal"><span class="label label-warning">지출</span></a>';
		  	}

		  	$del_mark = '<a href="#AcctDel'.$mgr_list->id.'" data-toggle="modal"><span class="label label-important">삭제</span></a>';
		?>
		<tr>
				<td width="2%" style="TEXT-ALIGN:left;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=$mark?></small></td>
				<td width="1%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=$mgr_list->id?></small></td>
				<td width="10%" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=$mgr_list->ymd?></small></td>
				<td width="19%" style="TEXT-ALIGN:left;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=$mgr_list->acct_mst_nm.' '.$mgr_list->acct_dtl_nm?></small></td>
				<td width="15%" style="TEXT-ALIGN:left;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=$mgr_list->bank_nm.' '.$mgr_list->acct_nm?></small></td>
				<td width="15%" style="TEXT-ALIGN:left;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=$mgr_list->wallet_nm?></small></td>
				<td width="10%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=number_format($mgr_list->in_amt)?></small></td>
				<td width="10%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=number_format($mgr_list->out_amt)?></small></td>
				<td width="15%" style="TEXT-ALIGN:left;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=$mgr_list->description?></small></td>
				<td width="2%" style="TEXT-ALIGN:left;margin:0 0 0 0;padding:5px"><small style="color:#000000"><?=$del_mark?></small></td>
		</tr>

		<?php
		  }
		?>

		<tr>
				<td width="62%" colspan="5" style="TEXT-ALIGN:center;margin:0 0 0 0;padding:5px"><small style="color:#000000"><b><?=$ymd.' 계'?></b></small></td>
				<td width="10%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:5px"><small style="color:#000000"><b><?=number_format($sum_in_amt)?></b></small></td>
				<td width="10%" style="TEXT-ALIGN:right;margin:0 0 0 0;padding:5px"><small style="color:#000000"><b><?=number_format($sum_out_amt)?></b></small></td>
				<td width="17%" colspan="2" style="TEXT-ALIGN:left;margin:0 0 0 0;padding:5px"><small style="color:#000000">&nbsp;</small></td>
		</tr>
	</table>
</div>

<div>
<?php
	// 가계부 삭제
	foreach($acct_del_list as $del_list){
?>
		<!-- Modal AcctDel-->
		<div id="AcctDel<?=$del_list->id?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeDelLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 id="codeDelLabel">가계부에서 삭제하기</h5>
			</div>

			<div class="modal-body">
				<p>
						 일자 : <?=$del_list->ymd?>
						 <br>분류 : <?=$del_list->acct_mst_nm.' '.$del_list->acct_dtl_nm?>
						 <br>통장 : <?=$del_list->bank_nm.' '.$del_list->acct_nm?>
						 <br>지갑 : <?=$del_list->wallet_nm?>
						 <br>수입금액 : <?=Number_Format($del_list->in_amt)?>
						 <br>지출금액 : <?=Number_Format($del_list->out_amt)?>
						 <br>비고 :    <?=$del_list->description?> 
						 <br>
						 위 행을 삭제하시겠습니까?
				</p>
			</div>
			<div class="modal-footer">
				<a href="/index.php/pinky_write/acct_mgr_del/<?=$del_list->id?>/<?=$del_list->ymd?>" class="btn btn-primary" data-mini="true">삭제</a>
				<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
			</div>
		</div>
<?php
	}
?>
</div>

<div>
<?php
	// 가계부 수정
	foreach($acct_upd_list as $upd_list){
?>
	<form name="Acct_Upd_Form" class="form-horizontal" action="/index.php/pinky_write/acct_mgr_upd" method="post">
		<!-- Modal AcctUpd-->
		<div id="AcctUpd<?=$upd_list->id?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeUpdLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 id="codeUpdLabel">가계부 수정하기</h5>
			</div>

			<div class="modal-body">

				<table style="background-color:#FFFFFF;font-size:11px;" class="table table-bordered table-striped">
					<tr>
						<td>일자</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;"><input type="date" name="ymd" data-role="date" style="font-size:11px;background-color:#FAF4C0;height:30px;width:130px;margin:0px;padding:0px;border:none" value="<?=$ymd?>"></td>
					</tr>
					<tr>		
						<td>분류</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;">
							<select name="acct_dtl_id" id="acct_dtl_id" style="font-size:11px;background-color:#FAF4C0;height:30;width:200;margin:0px;padding:0px;border:none" data-mini="true">
								<option value=""><h6>계정과목 선택</h6></option>
								<?php
								foreach($acct_list as $list){
								?>
								<option value="<?=$list->acct_dtl_id?>" <?php if($list->acct_dtl_id == $upd_list->acct_dtl_id) echo ' selected="selected"';?>>[<?=$list->acct_mst_nm?>]<?=$list->acct_dtl_nm?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>		
						<td>통장</td>
						<td style="margin:0px;padding:0px;">
							<select name="bank_id" id="bank_id" style="font-size:11px;height:30;width:200;margin:0px;padding:0px;border:none" data-mini="true">
								<option value=""><h6>통장선택</h6></option>
								<?php
								foreach($bank_list as $bank){
								?>
								<option value="<?=$bank->bank_id?>" <?php if($bank->bank_id == $upd_list->bank_id) echo ' selected="selected"';?>>[<?=$bank->bank_nm?>]<?=$bank->acct_nm?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>		
						<td>지갑</td>
						<td style="margin:0px;padding:0px;">
							<select name="wallet_id" id="wallet_id" style="font-size:11px;height:30;width:100;margin:0px;padding:0px;border:none" data-mini="true">
								<option value=""><h6>지갑선택</h6></option>
								<?php
								foreach($wallet_list as $wallet){
								?>
								<option value="<?=$wallet->wallet_id?>" <?php if($wallet->wallet_id == $upd_list->wallet_id) echo ' selected="selected"';?>><?=$wallet->wallet_nm?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>		
						<td>입금</td>
						<td style="margin:0px;padding:0px;"><input type="text" name="in_amt" style="text-align:right;font-size:11px;height:30;width:100;margin:0px;padding:0px;border:none" value="<?=$upd_list->in_amt?>"></td>
					</tr>
					<tr>		
						<td>출금</td>
						<td style="margin:0px;padding:0px;"><input type="text" name="out_amt" style="text-align:right;font-size:11px;height:30;width:100;margin:0px;padding:0px;border:none" value="<?=$upd_list->out_amt?>"></td>
					</tr>
					<tr>		
						<td>비고</td>
						<td style="margin:0px;padding:0px;"><input type="text" name="description" style="font-size:11px;height:30;width:280;margin:0px;padding:0px;border:none" value="<?=$upd_list->description?>"></td>
					</tr>
				</table>

				위 행을 수정하시겠습니까?

			</div>
			<div class="modal-footer">
				<input type="hidden" name="id" value="<?=$upd_list->id?>">
				<input type="submit" class="btn btn-primary" value="수정">
				<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
			</div>
		</div>
	</form>
<?php
	}
?>
</div>
</h6>

<!-- 본문 end -->
