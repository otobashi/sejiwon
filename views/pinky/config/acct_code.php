<!-- 본문start -->
<div class="navbar-inner">
     <h5>
     	<i class="icon-info-sign"></i>&nbsp;기본코드 - 분류
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
	<div class="span6 alert alert-info" role="alert" style="padding:0px;">
		<div class="navbar-inner" style="margin:0px 0px 5px 0px;padding:2px 0px 2px 10px;">
		     <h5>
		     	대분류&nbsp;<a href="#codeAdd" data-toggle="modal"><span class="label label-success">코드추가</span></a>
		     </h5>
		</div>

		<!-- Modal -->
		<div id="codeAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeAddLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 id="codeAddLabel">대분류코드추가</h5>
			</div>

			<form name="acct_mst_add" class="form-horizontal" action="/index.php/pinky_config/acct_mst_add" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<p>
					<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
						<tr>
							<td style="text-align:right;margin:0px;padding:5px;width:100;">대분류(*)</td>
							<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
								<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_mst_nm" value="" data-mini="true">
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
					<td style="text-align:center;height:10px;width:200px;margin:0px;padding:0px;">대분류(*)</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">사용여부(*)</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">표시순서</td>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">&nbsp;</td>
				</tr>

				<?php
				$i = 1;
				foreach($acct_mst_list as $mst){
				?>
				<tr>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">
						<a href="#codeUpd<?=$i?>" data-toggle="modal"><span class="label label-warning">수정</span></a>

						<!-- Modal -->
						<div id="codeUpd<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeUpdLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 id="codeUpdLabel">대분류코드수정</h5>
							</div>

							<form name="acct_mst_upd" class="form-horizontal" action="/index.php/pinky_config/acct_mst_upd" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">대분류(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_mst_nm" value="<?=$mst->acct_mst_nm?>" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">사용여부</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<select name="use_flag" id="use_flag" data-mini="true" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
													<option value="Y" <?php if($mst->use_flag == 'Y') echo ' selected="selected"';?>>예</option>
													<option value="N" <?php if($mst->use_flag == 'N') echo ' selected="selected"';?>>아니오</option>
												</select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">표시순서</td>
											<td style="margin:0px;padding:0px;width:150;"><input type="text" name="ord_seq"  style="height:30;width:150;margin:0px;padding:0px;" value="<?=$mst->ord_seq?>" data-mini="true"></td>
										</tr>
									</table>

									<input type="hidden" name="acct_mst_id" value="<?=$mst->acct_mst_id?>" data-mini="true">
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" value="저장">
									<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
								</div>
							</form>
						</div>
					</td>
					<td style="text-align:left;height:10px;width:100px;margin:0px;padding:0px;"><?=$mst->acct_mst_nm?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?php if($mst->use_flag == 'Y'){ echo "예"; }else{ echo "아니오";}?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?=$mst->ord_seq?></td>

					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">
						<a href="#codeDel<?=$i?>" data-toggle="modal"><span class="label label-important">삭제</span></a>

						<!-- Modal -->
						<div id="codeDel<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeDelLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 id="codeDelLabel">대분류코드 삭제</h5>
							</div>

							<form name="acct_mst_del" class="form-horizontal" action="/index.php/pinky_config/acct_mst_del" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<p style="text-align:left;font-size:11px">
										아래 대분류 코드를 삭제합니다.<br>
										대분류 코드를 삭제할 시에는 관련된 소분류코드도 같이 삭제됩니다.<br>
										또, 추후 기존에 아래코드로 사용되었던 계정의 경우 가계부에서 제외되서 보일 수 있습니다.<br>
										따라서, 코드 삭제보다는 사용여부에 '아니오'를 하실 것을 추천하는 바입니다.<br><br>

										삭제하시겠습니까?
									</p>
									<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">대분류(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_mst_nm" value="<?=$mst->acct_mst_nm?>" data-mini="true">
											</td>
										</tr>
									</table>

									<input type="hidden" name="acct_mst_id" value="<?=$mst->acct_mst_id?>" data-mini="true">
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

	<div class="span6 alert alert-success" role="alert" style="padding:0px;">
		<div class="navbar-inner" style="margin:0px 0px 5px 0px;padding:2px 0px 2px 10px;">
			<h5>
				소분류&nbsp;<a href="#scodeAdd" data-toggle="modal"><span class="label label-success">코드추가</span></a>
			</h5>	     	
		</div>

		<!-- Modal -->
		<div id="scodeAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="scodeAddLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 id="scodeAddLabel">소분류코드추가</h5>
			</div>

			<form name="acct_dtl_add" class="form-horizontal" action="/index.php/pinky_config/acct_dtl_add" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<p>
				<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
					<tr>
						<td style="text-align:right;margin:0px;padding:5px;width:100;">대분류(*)</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;height:30;width:150;">
							<select name="acct_mst_id" id="select-native-1" data-mini="true" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
								<?php
								foreach($acct_mst_use_list as $list){
								?>
									<option value="<?=$list->acct_mst_id?>"><?=$list->acct_mst_nm?></option>
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;margin:0px;padding:5px;width:100;">소분류(*)</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
							<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_dtl_nm" value="" data-mini="true">
						</td>
					</tr>
					<tr>
						<td style="text-align:right;margin:0px;padding:5px;width:100;">차대구분</td>
						<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
							<select style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" name="cd" id="cd" data-mini="true">
								<option value="1">수입</option>
								<option value="-1">지출</option>
							</select>
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
					<td style="text-align:center;height:10px;width:200px;margin:0px;padding:0px;">대분류(*)</td>
					<td style="text-align:center;height:10px;width:200px;margin:0px;padding:0px;">소분류(*)</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">차대구분(*)</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">사용여부(*)</td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;">표시순서</td>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">&nbsp;</td>
				</tr>

				<?php
				$i = 1;
				foreach($acct_dtl_list as $dtl){
				?>
				<tr>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">
						<a href="#scodeUpd<?=$i?>" data-toggle="modal"><span class="label label-warning">수정</span></a>

						<!-- Modal -->
						<div id="scodeUpd<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="scodeUpdLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 id="scodeUpdLabel">소분류코드수정</h5>
							</div>

							<form name="acct_dtl_upd" class="form-horizontal" action="/index.php/pinky_config/acct_dtl_upd" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<p>
									<input type="hidden" name="acct_dtl_id" value="<?=$dtl->acct_dtl_id?>" data-mini="true">

									<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">대분류(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;height:30;width:150;">
												<select name="acct_mst_id" id="select-native-1" data-mini="true" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
													<?php
													foreach($acct_mst_use_list as $list){
													?>
														<option value="<?=$list->acct_mst_id?>" <?php if($dtl->acct_mst_id == $list->acct_mst_id) echo ' selected="selected"';?>><?=$list->acct_mst_nm?></option>
													<?php
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">소분류(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_dtl_nm" value="<?=$dtl->acct_dtl_nm?>" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">차대구분</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
												<select style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" name="cd" id="cd" data-mini="true">
													<option value="1" <?php if($dtl->cd == '1') echo ' selected="selected"';?>>수입</option>
													<option value="-1" <?php if($dtl->cd == '-1') echo ' selected="selected"';?>>지출</option>
												</select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">사용여부</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<select name="use_flag" id="use_flag" data-mini="true" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
													<option value="Y" <?php if($mst->use_flag == 'Y') echo ' selected="selected"';?>>예</option>
													<option value="N" <?php if($mst->use_flag == 'N') echo ' selected="selected"';?>>아니오</option>
												</select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">표시순서</td>
											<td style="margin:0px;padding:0px;width:150;"><input type="text" name="ord_seq"  style="height:30;width:150;margin:0px;padding:0px;" value="<?=$mst->ord_seq?>" data-mini="true"></td>
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

					<td style="text-align:left;height:10px;width:200px;margin:0px;padding:0px;">
					<?php
					foreach($acct_mst_list as $list){
						if($dtl->acct_mst_id == $list->acct_mst_id) {
						echo $list->acct_mst_nm;
						}
					}
					?>
					</td>

					<td style="text-align:left;height:10px;width:200px;margin:0px;padding:0px;"><?=$dtl->acct_dtl_nm?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?php if($dtl->cd == '1'){ echo "수입"; }else{ echo "지출";}?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?php if($dtl->use_flag == 'Y'){ echo "예"; }else{ echo "아니오";}?></td>
					<td style="text-align:center;height:10px;width:100px;margin:0px;padding:0px;"><?=$dtl->ord_seq?></td>
					<td style="text-align:center;height:10px;width:20px;margin:0px;padding:0px;">
						<a href="#scodeDel<?=$i?>" data-toggle="modal"><span class="label label-important">삭제</span></a>

						<!-- Modal -->
						<div id="scodeDel<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="scodeDelLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 id="scodeDelLabel">소분류코드 삭제</h5>
							</div>

							<form name="acct_dtl_del" class="form-horizontal" action="/index.php/pinky_config/acct_dtl_del" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<p style="text-align:left;font-size:11px">
										아래 소분류 코드를 삭제합니다.<br>
										또, 추후 기존에 아래코드로 사용되었던 계정의 경우 가계부에서 제외되서 보일 수 있습니다.<br>
										따라서, 코드 삭제보다는 사용여부에 '아니오'를 하실 것을 추천하는 바입니다.<br><br>

										삭제하시겠습니까?
									</p>
									<table style="font-size:11px;background-color:#FFFFFF;margin:0px;padding:0px;width:250;" class="table table-bordered table-striped">
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">대분류(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;height:30;width:150;">
												<select name="acct_mst_id" id="select-native-1" data-mini="true" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
													<?php
													foreach($acct_mst_use_list as $list){
													?>
														<option value="<?=$list->acct_mst_id?>" <?php if($dtl->acct_mst_id == $list->acct_mst_id) echo ' selected="selected"';?>><?=$list->acct_mst_nm?></option>
													<?php
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">소분류(*)</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;">
												<input style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" type="text" name="acct_dtl_nm" value="<?=$dtl->acct_dtl_nm?>" data-mini="true">
											</td>
										</tr>
										<tr>
											<td style="text-align:right;margin:0px;padding:5px;width:100;">차대구분</td>
											<td style="background-color:#FAF4C0;margin:0px;padding:0px;width:150;" style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;">
												<select style="background-color:#FAF4C0;height:30;width:150;margin:0px;padding:0px;" name="cd" id="cd" data-mini="true">
													<option value="1" <?php if($dtl->cd == '1') echo ' selected="selected"';?>>수입</option>
													<option value="-1" <?php if($dtl->cd == '-1') echo ' selected="selected"';?>>지출</option>
												</select>
											</td>
										</tr>
									</table>

									<input type="hidden" name="acct_dtl_id" value="<?=$dtl->acct_dtl_id?>" data-mini="true">
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
