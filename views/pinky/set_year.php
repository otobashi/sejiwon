<!-- 본문start -->
<div role="main" class="ui-content jqm-content jqm-fullwidtd">

    <div class="navbar-inner ui-bar-b">
        <h6><i class="icon-info-sign"></i>&nbsp;가계부 - 년결산</h6>
    </div>
    <br>

		<form name="set_year" class="form-horizontal" action="/index.php/unaw/set_year" metdod="post" enctype="multipart/form-data">
				<p>
					해당 년 : 
				<select name="year" class="span1">
					<?php
						for($i=$year-5;$i<$year+5;$i++){
					?>
				  <option <?php if($i == $year) echo "selected='checked'";?>><?=$i?></option>
					<?php
						}
					?>
				</select>

        <input type="submit" value="조회" data-mini="true">
      </p>
    </form>
		<hr>
		
		<h6 style="color:999999;TEXT-ALIGN:right">단위:천원</h6>

		<table class="table table-condensed table-hover table-bordered">
        <tr>
          <td colspan="2"><h6>&nbsp;</h6></td>
          <td><h6 style="color:47C83E;TEXT-ALIGN:center">1월</h6></td>
          <td><h6 style="color:47C83E;TEXT-ALIGN:center">2월</h6></td>
          <td><h6 style="color:47C83E;TEXT-ALIGN:center">3월</h6></td>
          <td><h6 style="color:999999;TEXT-ALIGN:center">Q1</h6></td>
          <td><h6 style="color:4374D9;TEXT-ALIGN:center">4월</h6></td>
          <td><h6 style="color:4374D9;TEXT-ALIGN:center">5월</h6></td>
          <td><h6 style="color:4374D9;TEXT-ALIGN:center">6월</h6></td>
          <td><h6 style="color:999999;TEXT-ALIGN:center">Q2</h6></td>
          <td><h6 style="color:D9418C;TEXT-ALIGN:center">7월</h6></td>
          <td><h6 style="color:D9418C;TEXT-ALIGN:center">8월</h6></td>
          <td><h6 style="color:D9418C;TEXT-ALIGN:center">9월</h6></td>
          <td><h6 style="color:999999;TEXT-ALIGN:center">Q3</h6></td>
          <td><h6 style="color:8041D9;TEXT-ALIGN:center">10월</h6></td>
          <td><h6 style="color:8041D9;TEXT-ALIGN:center">11월</h6></td>
          <td><h6 style="color:8041D9;TEXT-ALIGN:center">12월</h6></td>
          <td><h6 style="color:999999;TEXT-ALIGN:center">Q4</h6></td>
          <td><h6 style="color:000000;TEXT-ALIGN:center">합계</h6></td>
        </tr>
         <?php
           $i=0;
           foreach($set_year as $cf){
           	if( $cf->acct_mst_nm == '합계'){
         ?>
           <tr>
             <td><h6><?=$cf->acct_mst_nm?></h6></td>
             <td><h6><?=$cf->acct_dtl_nm?></h6></td>
             <td><h6 style="color:47C83E;TEXT-ALIGN:right"><?=Number_Format($cf->amt_01)?></h6></td>
             <td><h6 style="color:47C83E;TEXT-ALIGN:right"><?=Number_Format($cf->amt_02)?></h6></td>
             <td><h6 style="color:47C83E;TEXT-ALIGN:right"><?=Number_Format($cf->amt_03)?></h6></td>
             <td><h6 style="color:999999;TEXT-ALIGN:right"><?=Number_Format($cf->q1)?></h6></td>
             <td><h6 style="color:4374D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_04)?></h6></td>
             <td><h6 style="color:4374D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_05)?></h6></td>
             <td><h6 style="color:4374D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_06)?></h6></td>
             <td><h6 style="color:999999;TEXT-ALIGN:right"><?=Number_Format($cf->q2)?></h6></td>
             <td><h6 style="color:D9418C;TEXT-ALIGN:right"><?=Number_Format($cf->amt_07)?></h6></td>
             <td><h6 style="color:D9418C;TEXT-ALIGN:right"><?=Number_Format($cf->amt_08)?></h6></td>
             <td><h6 style="color:D9418C;TEXT-ALIGN:right"><?=Number_Format($cf->amt_09)?></h6></td>
             <td><h6 style="color:999999;TEXT-ALIGN:right"><?=Number_Format($cf->q3)?></h6></td>
             <td><h6 style="color:8041D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_10)?></h6></td>
             <td><h6 style="color:8041D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_11)?></h6></td>
             <td><h6 style="color:8041D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_12)?></h6></td>
             <td><h6 style="color:999999;TEXT-ALIGN:right"><?=Number_Format($cf->q4)?></h6></td>
             <td><h6 style="color:000000;TEXT-ALIGN:right"><?=Number_Format($cf->total)?></h6></td>
           </tr>
         <?php
             }
             $i++;
           }
         ?>
         <?php
           $i=0;
           foreach($set_year as $cf){
           	if( $cf->acct_mst_nm <> '합계'){
         ?>
           <tr>
             <td><h6><?=$cf->acct_mst_nm?></h6></td>
             <td><h6><?=$cf->acct_dtl_nm?></h6></td>
             <td><h6 style="color:47C83E;TEXT-ALIGN:right"><?=Number_Format($cf->amt_01)?></h6></td>
             <td><h6 style="color:47C83E;TEXT-ALIGN:right"><?=Number_Format($cf->amt_02)?></h6></td>
             <td><h6 style="color:47C83E;TEXT-ALIGN:right"><?=Number_Format($cf->amt_03)?></h6></td>
             <td><h6 style="color:999999;TEXT-ALIGN:right"><?=Number_Format($cf->q1)?></h6></td>
             <td><h6 style="color:4374D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_04)?></h6></td>
             <td><h6 style="color:4374D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_05)?></h6></td>
             <td><h6 style="color:4374D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_06)?></h6></td>
             <td><h6 style="color:999999;TEXT-ALIGN:right"><?=Number_Format($cf->q2)?></h6></td>
             <td><h6 style="color:D9418C;TEXT-ALIGN:right"><?=Number_Format($cf->amt_07)?></h6></td>
             <td><h6 style="color:D9418C;TEXT-ALIGN:right"><?=Number_Format($cf->amt_08)?></h6></td>
             <td><h6 style="color:D9418C;TEXT-ALIGN:right"><?=Number_Format($cf->amt_09)?></h6></td>
             <td><h6 style="color:999999;TEXT-ALIGN:right"><?=Number_Format($cf->q3)?></h6></td>
             <td><h6 style="color:8041D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_10)?></h6></td>
             <td><h6 style="color:8041D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_11)?></h6></td>
             <td><h6 style="color:8041D9;TEXT-ALIGN:right"><?=Number_Format($cf->amt_12)?></h6></td>
             <td><h6 style="color:999999;TEXT-ALIGN:right"><?=Number_Format($cf->q4)?></h6></td>
             <td><h6 style="color:000000;TEXT-ALIGN:right"><?=Number_Format($cf->total)?></h6></td>
           </tr>
         <?php
             }
             $i++;
           }
         ?>
    </table>

</div>
<!-- 본문 end -->
