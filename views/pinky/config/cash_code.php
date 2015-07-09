<!-- 본문start -->
<div class="navbar-inner">
     <h5>
     	<i class="icon-info-sign"></i>&nbsp;현금관리 - 통장/지갑
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

<div class="row-fluid">

<!-- 통장 -->
	<div class="span6 alert alert-info" role="alert" style="padding:0px;">
		<div class="navbar-inner" style="margin:0px 0px 5px 0px;padding:2px 0px 2px 10px;">
			<h5>
				통장&nbsp;<a href="#bankAdd" data-toggle="modal"><span class="label label-success">코드추가</span></a>
			</h5>	     	
		</div>

		<!-- Modal -->
		<div id="bankAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="bankAddLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 id="bankAddLabel">통장추가</h5>
			</div>

			<form name="bank_add" class="form-horizontal" action="/index.php/pinky_config/bank_add" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<p>
				<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
					<tr>
						<td style="text-align:right;margin:0px;padding:5px;width:100;">통장명(*)</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;height:30;width:150;">
							<input type="text" name="acct_nm" value="" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" data-mini="true">
						</td>
					</tr>
					<tr>
						<td style="text-align:right;margin:0px;padding:5px;width:100;">은행명</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
							<input style="height:30;width:150;margin:0px;padding:0px;" type="text" name="bank_nm" value="" data-mini="true">
						</td>
					</tr>
					<tr>
						<td style="text-align:right;margin:0px;padding:5px;width:100;">계좌번호</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
							<input style="height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_no" value="" data-mini="true">
						</td>
					</tr>
				</table>
				</p>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="코드추가">
				<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
			</div>
			</form>
		</div>

		<div>

			<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;" class="table table-bordered table-striped">
				<tr>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">&nbsp;</td>
					<td style="text-align:center;height:10px;width:150px;margin:0px;padding:0px;">통장명(*)</td>
					<td style="text-align:center;height:10px;width:150px;margin:0px;padding:0px;">은행명</td>
					<td style="text-align:center;height:10px;width:200px;margin:0px;padding:0px;">계좌번호</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">사용여부(*)</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">표시순서</td>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">&nbsp;</td>
				</tr>

				<?php
				$i = 1;
				foreach($bank_list as $bank){
				?>
				<tr>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">
						<a href="#bankUpd<?=$i?>" data-toggle="modal"><span class="label label-warning">수정</span></a>

						<!-- Modal -->
						<div id="bankUpd<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="scodeUpdLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 id="bankUpdLabel">통장수정</h5>
							</div>

							<form name="bank_upd" class="form-horizontal" action="/index.php/pinky_config/bank_upd" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<p>
									<input type="hidden" name="bank_id" value="<?=$bank->bank_id?>" data-mini="true">

									<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">통장명(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;height:30;width:150;">
												<input type="text" name="acct_nm" value="<?=$bank->acct_nm?>" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">은행명</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<input style="height:30;width:150;margin:0px;padding:0px;" type="text" name="bank_nm" value="<?=$bank->bank_nm?>" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">계좌번호</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
												<input style="height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_no" value="<?=$bank->acct_no?>" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">사용여부</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<select name="use_flag" id="use_flag" data-mini="true" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
													<option value="Y" <?php if($bank->use_flag == 'Y') echo ' selected="selected"';?>>예</option>
													<option value="N" <?php if($bank->use_flag == 'N') echo ' selected="selected"';?>>아니오</option>
												</select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">표시순서</td>
											<td style="margin:0px;padding:0px;width:150;"><input type="text" name="ord_seq"  style="height:30;width:150;margin:0px;padding:0px;" value="<?=$bank->ord_seq?>" data-mini="true"></td>
										</tr>
									</table>

									</p>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" value="저장">
									<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
								</div>
							</form>
						</div>
					</td>

					<td style="text-align:left;height:10px;width:150px;margin:0px;padding:0px;"><?=$bank->acct_nm?></td>
					<td style="text-align:left;height:10px;width:150px;margin:0px;padding:0px;"><?=$bank->bank_nm?></td>
					<td style="text-align:center;height:10px;width:200px;margin:0px;padding:0px;"><?=$bank->acct_no?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?php if($bank->use_flag == 'Y'){ echo "예"; }else{ echo "아니오";}?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?=$bank->ord_seq?></td>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">
						<a href="#bankDel<?=$i?>" data-toggle="modal"><span class="label label-important">삭제</span></a>

						<!-- Modal -->
						<div id="bankDel<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="bankDelLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 id="bankDelLabel">통장삭제</h5>
							</div>

							<form name="bank_del" class="form-horizontal" action="/index.php/pinky_config/bank_del" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<p style="text-align:left;font-size:11px">
										아래 통장을 삭제합니다.<br>
										또, 추후 기존에 통장정보로 사용되었던 계정의 경우 가계부에서 제외되서 보일 수 있습니다.<br>
										따라서, 삭제보다는 사용여부에 '아니오'를 하실 것을 추천하는 바입니다.<br><br>

										삭제하시겠습니까?
									</p>
									<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">통장명(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;height:30;width:150;">
												<input type="text" name="acct_nm" value="<?=$bank->acct_nm?>" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">은행명</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<input style="height:30;width:150;margin:0px;padding:0px;" type="text" name="bank_nm" value="<?=$bank->bank_nm?>" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">계좌번호</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
												<input style="height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_no" value="<?=$bank->acct_no?>" data-mini="true">
											</td>
										</tr>
									</table>

									<input type="hidden" name="bank_id" value="<?=$bank->bank_id?>" data-mini="true">
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" value="삭제">
									<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
								</div>
							</form>
						</div>
					</td>
				</tr>
				<?php
				$i++;
				}
				?>

			</table>

		</div>

 	</div>

<!-- 지갑 -->
	<div class="span6 alert alert-success" role="alert" style="padding:0px;">
		<div class="navbar-inner" style="margin:0px 0px 5px 0px;padding:2px 0px 2px 10px;">
			<h5>
				지갑&nbsp;<a href="#walletAdd" data-toggle="modal"><span class="label label-success">코드추가</span></a>
			</h5>	     	
		</div>

		<!-- Modal -->
		<div id="walletAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="walletAddLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 id="walletAddLabel">지갑추가</h5>
			</div>

			<form name="wallet_add" class="form-horizontal" action="/index.php/pinky_config/wallet_add" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<p>
				<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
					<tr>
						<td style="text-align:right;margin:0px;padding:5px;width:100;">지갑명(*)</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;height:30;width:150;">
							<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="wallet_nm" value="" data-mini="true">
						</td>
					</tr>
				</table>
				</p>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="코드추가">
				<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
			</div>
			</form>
		</div>

		<div>

			<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;" class="table table-bordered table-striped">
				<tr>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">&nbsp;</td>
					<td style="text-align:center;height:10px;width:200px;margin:0px;padding:0px;">지갑명(*)</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">사용여부(*)</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">표시순서</td>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">&nbsp;</td>
				</tr>

				<?php
				$i = 1;
				foreach($wallet_list as $wallet){
				?>
				<tr>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">
						<a href="#walletUpd<?=$i?>" data-toggle="modal"><span class="label label-warning">수정</span></a>

						<!-- Modal -->
						<div id="walletUpd<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="walletUpdLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 id="walletUpdLabel">지갑수정</h5>
							</div>

							<form name="wallet_upd" class="form-horizontal" action="/index.php/pinky_config/wallet_upd" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">지갑명(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="wallet_nm" value="<?=$wallet->wallet_nm?>" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">사용여부</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<select name="use_flag" id="use_flag" data-mini="true" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
													<option value="Y" <?php if($wallet->use_flag == 'Y') echo ' selected="selected"';?>>예</option>
													<option value="N" <?php if($wallet->use_flag == 'N') echo ' selected="selected"';?>>아니오</option>
												</select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">표시순서</td>
											<td style="margin:0px;padding:0px;width:150;"><input type="text" name="ord_seq"  style="height:30;width:150;margin:0px;padding:0px;" value="<?=$wallet->ord_seq?>" data-mini="true"></td>
										</tr>
									</table>

									<input type="hidden" name="wallet_id" value="<?=$wallet->wallet_id?>" data-mini="true">
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" value="저장">
									<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
								</div>
							</form>
						</div>
					</td>
					<td style="text-align:left;height:10px;width:100px;margin:0px;padding:0px;"><?=$wallet->wallet_nm?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?php if($wallet->use_flag == 'Y'){ echo "예"; }else{ echo "아니오";}?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?=$wallet->ord_seq?></td>

					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">
						<a href="#walletDel<?=$i?>" data-toggle="modal"><span class="label label-important">삭제</span></a>

						<!-- Modal -->
						<div id="walletDel<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="walletDelLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 id="walletDelLabel">지갑삭제</h5>
							</div>

							<form name="wallet_del" class="form-horizontal" action="/index.php/pinky_config/wallet_del" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<p style="text-align:left;font-size:11px">
										아래 지갑을 삭제합니다.<br>
										기존에 아래코드로 사용되었던 지갑의 경우 가계부에서 제외되서 보일 수 있습니다.<br>
										따라서, 지갑삭제보다는 사용여부에 '아니오'를 하실 것을 추천하는 바입니다.<br><br>

										삭제하시겠습니까?
									</p>
									<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">지갑명(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="wallet_nm" value="<?=$wallet->wallet_nm?>" data-mini="true">
											</td>
										</tr>
									</table>

									<input type="hidden" name="wallet_id" value="<?=$wallet->wallet_id?>" data-mini="true">
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" value="삭제">
									<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
								</div>
							</form>
						</div>
					</td>

				</tr>
				<?php
				$i++;
				}
				?>

			</table>

		</div>

 	</div>


</div>

<!-- 본문 end -->
