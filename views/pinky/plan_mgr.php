<!-- 본문start -->
<div role="main" class="ui-content jqm-content jqm-fullwidth">

    <div class="navbar-inner ui-bar-b">
        <h6><i class="icon-info-sign"></i>&nbsp;가계부 - 예산</h6>
    </div>
    <br>

    <form name="plan_mgr" class="form-horizontal" action="/index.php/unaw/plan_mgr" method="post" enctype="multipart/form-data">
				<table>
            <tr>
            	<td>
            		조회일자&nbsp;&nbsp;&nbsp;
            	</td>
            	<td>
            		<?php
            			if($from_date){
            		?>
		                <input type="date" name="from_date" id="from_date" value="<?=$from_date?>">
		            <?php
		            	}
		            	else {
		            ?>
		                <input type="date" name="from_date" id="from_date" value="<?='20'.(string)date('y').'-'.(string)date('m').'-01'?>">
		            <?php
		            	}
		            ?>
            	</td>
            	<td>
            		<?php
            			if($to_date){
            		?>
		                <input type="date" name="to_date" id="to_date" value="<?=$to_date?>">
		            <?php
		            	}
		            	else {
		            ?>
		                <input type="date" name="to_date" id="to_date" value="<?='20'.(string)date('y').'-'.(string)date('m').'-'.(string)date('d')?>">
		            <?php
		            	}
		            ?>
            	</td>
		          <td>
                &nbsp;&nbsp;&nbsp;<input type="submit" class="btn" value="조회">
		          </td>
		        </tr>
		    </table>
    </form>
    
		<!-- Button to trigger modal -->
		<br>
		<a href="#codeAdd" role="button" class="btn btn-primary" data-toggle="modal">가계부예산 추가</a>
		 
		<!-- Modal -->
		<div id="codeAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeAddLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="codeAddLabel">가계부예산추가</h3>
		  </div>
				    <form name="plan_mgr_add" class="form-horizontal" action="/index.php/unaw/plan_mgr_add" method="post" enctype="multipart/form-data">
		  <div class="modal-body">
		    <p>
					<h6 style="color:red">&nbsp;&nbsp;*&nbsp;예산일자에 일자는 무시되므로, 해당월에 아무일자나 선택하셔도 됩니다.</h6>
					<table>
		    		<tr>
		    			<td><h6>일자</h6></td>
		    			<td><input type="date" name="ymd" id="ymd" value="<?='20'.(string)date('y').'-'.(string)date('m').'-'.(string)date('d')?>"></td>
		    			<td><h6>계정</h6></td>
		    			<td>
							    <select name="acct_dtl_id" id="acct_dtl_id" data-mini="true">
							        <option value=""><h6>계정과목 선택</h6></option>
	                <?php
	                  foreach($acct_list as $list){
	                ?>
							        <option value="<?=$list->acct_dtl_id?>"><h6>[<?=$list->acct_mst_nm?>] <?=$list->acct_dtl_nm?></h6></option>
	                <?php
	                  }
	                ?>
							    </select>
            	</td>
            </tr>
            <tr>
            	<td><h6>입금</h6></td>
            	<td>
          				<input type="text" name="in_amt" id="in_amt" value="" placeholder="입금액" data-mini="true">
          		</td>
          		<td><h6>출금</h6></td>
          		<td>
          				<input type="text" name="out_amt" id="out_amt" value="" placeholder="출금액" data-mini="true">
          		</td>
            </tr>
            <tr>
            	<td><h6>비고</h6></td>
            	<td colspan="3">
            		<textarea style="width:480px" name="description" placeholder="비고"></textarea>
            	</td>
            </tr>
          </table>
		    </p>
		  </div>
		  <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
		    <input type="submit" class="btn btn-primary" value="추가">
		  </div>
				    </form>
		</div>
		</br>

		<br>
		<table class="table table-condensed table-hover table-bordered">
			<tr>
				<td colspan="2">&nbsp;</td>
				<td><h6>일자(*)</td>
				<td><h6>계정과목(*)</td>
				<td><h6>입금액</td>
				<td><h6>출금액</td>
				<td><h6>비고</td>
			</tr>
		
			<?php
				$i = 1;
			  foreach($plan_mgr_list as $mgr){
			?>
			<tr>
				<td>
					<a href="#codeUpd<?=$i?>" role="button" class="btn" data-toggle="modal"><i class="icon-pencil"></i></a>
		 
					<!-- Modal -->
					<div id="codeUpd<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeUpdLabel" aria-hidden="true">
					  <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					    <h3 id="codeUpdLabel">가계부예산수정</h3>
					  </div>
						
						<form name="plan_mgr_upd" class="form-horizontal" action="/index.php/unaw/plan_mgr_upd_modal" method="post" enctype="multipart/form-data">
					  <div class="modal-body">
					    <p>

                  <input type="hidden" name="id" value="<?=$mgr->id?>" data-mini="true">
									<table class="table table-condensed table-hover table-bordered">
                  	<tr>
                  		<td>일자</td>
                      <td>
                      	<input type="date" name="ymd" value="<?=$mgr->ymd?>" data-mini="true">
                      </td>
                    </tr>
                    <tr>
                    	<td>계정과목</td>
                    	<td>
													    <select name="acct_dtl_id" id="acct_dtl_id" data-mini="true">
													        <option value=""><h6>계정과목 선택</h6></option>
							                <?php
							                  foreach($acct_list as $list){
							                ?>
													        <option value="<?=$list->acct_dtl_id?>" <?php if($mgr->acct_dtl_id == $list->acct_dtl_id) echo ' selected="selected"';?>>[<?=$list->acct_mst_nm?>]<?=$list->acct_dtl_nm?></option>
							                <?php
							                  }
							                ?>
													    </select>
                    	</td>
                    </tr>
                    <tr>
                    	<td>수입금액</td>
                    	<td>
                  				<input type="text" name="in_amt" value="<?=$mgr->in_amt?>" data-mini="true">
                    	</td>
                    </tr>
                    <tr>
		              		<td>지출금액</td>
		              		<td>
                  				<input type="text" name="out_amt" value="<?=$mgr->out_amt?>" data-mini="true">
                    	</td>
                    </tr>
                    <tr>
                    	<td>비고</td>
                    	<td>
              						<textarea name="description" placeholder="비고"><?=$mgr->description?></textarea>
              				</td>
              			</tr>
              		</table>

					    </p>
					  </div>
					  <div class="modal-footer">
					    <button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
					    <input type="submit" class="btn btn-primary" value="저장">
					  </div>
					  
						</form>
		</td>

    <td>
					<a href="#codeDel<?=$i?>" role="button" class="btn" data-toggle="modal"><i class="icon-trash"></i></a>
		 
					<!-- Modal -->
					<div id="codeDel<?=$i?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="codeDelLabel" aria-hidden="true">
					  <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					    <h3 id="codeDelLabel">행삭제</h3>
					  </div>
						
					  <div class="modal-body">
					    <p>
								 일자 : <?=$mgr->ymd?>
								 <br>수입금액 : <?=Number_Format($mgr->in_amt)?>
								 <br>지출금액 :	<?=Number_Format($mgr->out_amt)?>
								 <br>비고 :  <?=$mgr->description?> 
								 <br><br>
								 위 행을 삭제하시겠습니까?
					    </p>
					  </div>
					  <div class="modal-footer">
					    <button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
              <a href="/index.php/unaw/plan_mgr_del/<?=$mgr->id?>" class="btn btn-primary" data-mini="true">삭제</a>
					  </div>
						
					</div>
		</td>

    <td>
        <?=$mgr->ymd?>
    </td>
    <td>
        <?php
          foreach($acct_list as $list){
        		if($mgr->acct_dtl_id == $list->acct_dtl_id) echo '['.$list->acct_mst_nm.']'.$list->acct_dtl_nm;
          }
        ?>
    </td>
    <td style="TEXT-ALIGN:right">
    		<?=Number_Format($mgr->in_amt)?>
    </td>
    <td style="TEXT-ALIGN:right">
    		<?=Number_Format($mgr->out_amt)?>
    </td>
    <td>
        <?=$mgr->description?>
    </td>
  </tr>
		  <?php
		  		$i++;
		    }
		  ?>
		
		</table>
		
		
		<hr>

</div>

<!-- 본문 end -->
