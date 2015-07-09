<!-- 본문start -->
<div role="main" class="ui-content jqm-content jqm-fullwidtd">
    <div class="navbar-inner ui-bar-b">
        <h6><i class="icon-info-sign"></i>&nbsp;가계부 - 무지출 캘린더</h6>
    </div>
    <br>

    <form class="form-horizontal" action="/index.php/unaw/zero_cal" method="post">
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

					&nbsp;월 : 
				<select name="month" class="span1">
					<?php
						for($i=1;$i<13;$i++){
					?>
				  <option <?php if($i == $month) echo "selected='checked'";?>><?=$i?></option>
					<?php
						}
					?>
				</select>
        <input type="submit" value="조회" data-mini="true">
      </p>
    </form>
    <hr>

    <h6>
        <?php
        foreach($sales_calendar as $cal){
          echo '<h5>'.$cal->month_long.' '.$cal->year.'</h5>';
          break;
        }
        ?>
    </h6>

		<table class="table table-condensed table-hover table-bordered">
       <tr class="ui-bar-g">
         <td><h6 style="color:red;TEXT-ALIGN:center">Sun</h6></td>
         <td><h6 style="TEXT-ALIGN:center">Mon</h6></td>
         <td><h6 style="TEXT-ALIGN:center">Tue</h6></td>
         <td><h6 style="TEXT-ALIGN:center">Wed</h6></td>
         <td><h6 style="TEXT-ALIGN:center">Thu</h6></td>
         <td><h6 style="TEXT-ALIGN:center">Fri</h6></td>
         <td><h6 style="color:blue;TEXT-ALIGN:center">Sat</h6></td>
       </tr>
        <?php
        foreach($sales_calendar as $cal){
 
          if($cal->byday_sun == 1){
              echo '<h6><tr>';
          }
 
          if($cal->day == 1){
            if($cal->byday_sun == 2){
                echo '<td></td>';
            }
            if($cal->byday_sun == 3){
                echo '<td></td><td></td>';
            }
            if($cal->byday_sun == 4){
                echo '<td></td><td></td><td></td>';
            }
            if($cal->byday_sun == 5){
                echo '<td></td><td></td><td></td><td></td>';
            }
            if($cal->byday_sun == 6){
                echo '<td></td><td></td><td></td><td></td><td></td>';
            }
            if($cal->byday_sun == 7){
                echo '<td></td><td></td><td></td><td></td><td></td><td></td>';
            }
          }
 
          if($cal->byday_sun == 1){
            echo '<td style="color:red">';
          }
          else if($cal->byday_sun == 7){
            echo '<td style="color:blue">';
          }
          else if($cal->memo) {
            echo '<td style="color:red">';
          }
          else {
            echo '<td>';
          }
 
            echo '<h6 style="TEXT-ALIGN:left">'.$cal->day.' <small>'.$cal->ganji.' '.substr($cal->lunar_date,5,2).'/'.substr($cal->lunar_date,-2).'<br>'.$cal->memo.'</small></h6>';
 
            $i = 0;
            foreach($zero_cal as $report){
              if($cal->ymd == $report->ymd){
                if($report->out_amt == 0){
                  echo '<h6 style="color:D9418C;TEXT-ALIGN:center">무지출</h6>';
                }
                else{
                  echo '<h6 style="color:8041D9;TEXT-ALIGN:center">'.Number_Format($report->out_amt).'</h6>';
                }
              }
            }
 
            echo '</td>';
 
          if($cal->byday_sun == 7){
              echo '</tr></h6>';
          }
 
        }
        ?>
   </table>
 
</div>
<!-- 본문 end -->
