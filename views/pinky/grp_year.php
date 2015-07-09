<!-- 본문start -->
<div role="main" class="ui-content jqm-content jqm-fullwidth">
        <div class="navbar-inner">
             <h6><i class="icon-info-sign"></i>&nbsp;가계부 - 그래프</h6>
        </div>
        <hr>
        <div class="row-fluid">

	        <div class="span6">
	            <div class="navbar-inner ui-bar-b">
	                <h6>월별 비중</h6>
	            </div>
	
	            <h6><div id="piechart1"></div></h6>
	            <h6><div id="piechart2"></div></h6>
	            <h6><div id="piechart3"></div></h6>
	            <h6><div id="piechart4"></div></h6>
	            <h6><div id="piechart5"></div></h6>
	            <h6><div id="piechart6"></div></h6>
	            <h6><div id="piechart7"></div></h6>
	            <h6><div id="piechart8"></div></h6>
	            <h6><div id="piechart9"></div></h6>
	            <h6><div id="piechart10"></div></h6>
	            <h6><div id="piechart11"></div></h6>
	            <h6><div id="piechart12"></div></h6>
	
	        </div>
	
	        <div class="span6">
	
	            <div class="navbar-inner ui-bar-c">
	                <h6>월별 그래프</h6>
	            </div>
	
	            <h6><div id="columnchart_values1"></div></h6>
	            <h6><div id="columnchart_values2"></div></h6>
	            <h6><div id="columnchart_values3"></div></h6>
	            <h6><div id="columnchart_values4"></div></h6>
	            <h6><div id="columnchart_values5"></div></h6>
	            <h6><div id="columnchart_values6"></div></h6>
	            <h6><div id="columnchart_values7"></div></h6>
	            <h6><div id="columnchart_values8"></div></h6>
	            <h6><div id="columnchart_values9"></div></h6>
	            <h6><div id="columnchart_values10"></div></h6>
	            <h6><div id="columnchart_values11"></div></h6>
	            <h6><div id="columnchart_values12"></div></h6>
	
	        </div>
	
	    </div>
</div>
<?php
/*************************************************************************************************/
/* 월별 비중                                                                                     */
/*************************************************************************************************/
// 01월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data01 = "['계정', '금액']";
foreach($grp_year01 as $grp01){
    $data01 .= ",['".$grp01->acct_mst_nm."',".$grp01->amt."]";
}
echo $data01;

echo "
    ]);

    var options = {
      title: '1월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
    chart.draw(data, options);
  }
</script>
";

// 02월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data02 = "['계정', '금액']";
foreach($grp_year02 as $grp02){
    $data02 .= ",['".$grp02->acct_mst_nm."',".$grp02->amt."]";
}
echo $data02;

echo "
    ]);

    var options = {
      title: '2월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    chart.draw(data, options);
  }
</script>
";

// 03월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data03 = "['계정', '금액']";
foreach($grp_year03 as $grp03){
    $data03 .= ",['".$grp03->acct_mst_nm."',".$grp03->amt."]";
}
echo $data03;

echo "
    ]);

    var options = {
      title: '3월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
    chart.draw(data, options);
  }
</script>
";

// 04월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data04 = "['계정', '금액']";
foreach($grp_year04 as $grp04){
    $data04 .= ",['".$grp04->acct_mst_nm."',".$grp04->amt."]";
}
echo $data04;

echo "
    ]);

    var options = {
      title: '4월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
    chart.draw(data, options);
  }
</script>
";

// 05월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data05 = "['계정', '금액']";
foreach($grp_year05 as $grp05){
    $data05 .= ",['".$grp05->acct_mst_nm."',".$grp05->amt."]";
}
echo $data05;

echo "
    ]);

    var options = {
      title: '5월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
    chart.draw(data, options);
  }
</script>
";

// 06월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data06 = "['계정', '금액']";
foreach($grp_year06 as $grp06){
    $data06 .= ",['".$grp06->acct_mst_nm."',".$grp06->amt."]";
}
echo $data06;

echo "
    ]);

    var options = {
      title: '6월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart6'));
    chart.draw(data, options);
  }
</script>
";

// 07월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data07 = "['계정', '금액']";
foreach($grp_year07 as $grp07){
    $data07 .= ",['".$grp07->acct_mst_nm."',".$grp07->amt."]";
}
echo $data07;

echo "
    ]);

    var options = {
      title: '7월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart7'));
    chart.draw(data, options);
  }
</script>
";

// 08월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data08 = "['계정', '금액']";
foreach($grp_year08 as $grp08){
    $data08 .= ",['".$grp08->acct_mst_nm."',".$grp08->amt."]";
}
echo $data08;

echo "
    ]);

    var options = {
      title: '8월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart8'));
    chart.draw(data, options);
  }
</script>
";

// 09월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data09 = "['계정', '금액']";
foreach($grp_year09 as $grp09){
    $data09 .= ",['".$grp09->acct_mst_nm."',".$grp09->amt."]";
}
echo $data09;

echo "
    ]);

    var options = {
      title: '9월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart9'));
    chart.draw(data, options);
  }
</script>
";

// 10월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data10 = "['계정', '금액']";
foreach($grp_year10 as $grp10){
    $data10 .= ",['".$grp10->acct_mst_nm."',".$grp10->amt."]";
}
echo $data10;

echo "
    ]);

    var options = {
      title: '10월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart10'));
    chart.draw(data, options);
  }
</script>
";

// 11월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data11 = "['계정', '금액']";
foreach($grp_year11 as $grp11){
    $data11 .= ",['".$grp11->acct_mst_nm."',".$grp11->amt."]";
}
echo $data11;

echo "
    ]);

    var options = {
      title: '11월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart11'));
    chart.draw(data, options);
  }
</script>
";

// 12월
echo '
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
';

$data12 = "['계정', '금액']";
foreach($grp_year12 as $grp12){
    $data12 .= ",['".$grp12->acct_mst_nm."',".$grp12->amt."]";
}
echo $data12;

echo "
    ]);

    var options = {
      title: '12월'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart12'));
    chart.draw(data, options);
  }
</script>
";

/*************************************************************************************************/
/* 월별 그래프                                                                                   */
/*************************************************************************************************/
// 01월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb01 = array(
               "#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE08C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#008299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#003399","#002266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#030066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8041D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990085","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99004C","#660033"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0100FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              );

$data_col01 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column01 as $col01){
    $data_col01 .= ',["'.$col01->acct_mst_nm.'",'.$col01->amt.',"'.$rgb01[$i].'"]';
    $i++;
}
echo $data_col01;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "1월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
    chart.draw(view, options);
}
</script>
';

// 02월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb02 = array(
               "#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE08C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#008299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#003399","#002266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#030066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8041D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990085","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99004C","#660033"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0200FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              );

$data_col02 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column02 as $col02){
    $data_col02 .= ',["'.$col02->acct_mst_nm.'",'.$col02->amt.',"'.$rgb02[$i].'"]';
    $i++;
}
echo $data_col02;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "2월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
    chart.draw(view, options);
}
</script>
';

// 03월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb03 = array(
               "#FAECC5","#FFE08C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#008299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#003399","#003266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#030066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8041D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990085","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99004C","#660033"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0300FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              );

$data_col03 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column03 as $col03){
    $data_col03 .= ',["'.$col03->acct_mst_nm.'",'.$col03->amt.',"'.$rgb03[$i].'"]';
    $i++;
}
echo $data_col03;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "3월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values3"));
    chart.draw(view, options);
}
</script>
';

// 04월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb04 = array(
               "#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#008299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#004399","#004266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#040066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8041D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990085","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99004C","#660043"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0400FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE08C","#F2CB61","#CCA63D","#997000","#664B00"
              );

$data_col04 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column04 as $col04){
    $data_col04 .= ',["'.$col04->acct_mst_nm.'",'.$col04->amt.',"'.$rgb04[$i].'"]';
    $i++;
}
echo $data_col04;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "4월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values4"));
    chart.draw(view, options);
}
</script>
';

// 05월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb05 = array(
               "#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#008299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#005399","#005266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#050066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8051D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990085","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99005C","#660053"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0500FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE08C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              );

$data_col05 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column05 as $col05){
    $data_col05 .= ',["'.$col05->acct_mst_nm.'",'.$col05->amt.',"'.$rgb05[$i].'"]';
    $i++;
}
echo $data_col05;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "5월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values5"));
    chart.draw(view, options);
}
</script>
';

// 06월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb06 = array(
               "#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#008299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#005399","#005266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#050066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8051D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990085","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99005C","#660053"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0500FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE08C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              );

$data_col06 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column06 as $col06){
    $data_col06 .= ',["'.$col06->acct_mst_nm.'",'.$col06->amt.',"'.$rgb06[$i].'"]';
    $i++;
}
echo $data_col06;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "6월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values6"));
    chart.draw(view, options);
}
</script>
';

// 07월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb07 = array(
               "#D9E5FF","#B2CCFF","#6799FF","#4374D9","#005399","#005266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#050066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8051D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990085","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99005C","#660053"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0500FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE08C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#008299","#005766"
              );

$data_col07 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column07 as $col07){
    $data_col07 .= ',["'.$col07->acct_mst_nm.'",'.$col07->amt.',"'.$rgb07[$i].'"]';
    $i++;
}
echo $data_col07;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "7월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values7"));
    chart.draw(view, options);
}
</script>
';

// 08월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb08 = array(
               "#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#050066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8051D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990085","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99005C","#660053"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0500FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE08C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#008299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#005399","#005266"
              );

$data_col08 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column08 as $col08){
    $data_col08 .= ',["'.$col08->acct_mst_nm.'",'.$col08->amt.',"'.$rgb08[$i].'"]';
    $i++;
}
echo $data_col08;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "8월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values8"));
    chart.draw(view, options);
}
</script>
';

// 09월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb09 = array(
               "#E8D9FF","#D1B2FF","#A566FF","#8051D9","#3F0099","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990095","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99005C","#660053"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0500FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE09C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#009299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#005399","#005266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050099","#050066"
              );

$data_col09 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column09 as $col09){
    $data_col09 .= ',["'.$col09->acct_mst_nm.'",'.$col09->amt.',"'.$rgb09[$i].'"]';
    $i++;
}
echo $data_col09;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "9월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values9"));
    chart.draw(view, options);
}
</script>
';

// 10월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb10 = array(
               "#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990105","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99005C","#660053"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0500FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE10C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#010299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#005399","#005266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050109","#050066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8051D9","#3F0109","#2A0066"
              );

$data_col10 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column10 as $col10){
    $data_col10 .= ',["'.$col10->acct_mst_nm.'",'.$col10->amt.',"'.$rgb10[$i].'"]';
    $i++;
}
echo $data_col10;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "10월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values10"));
    chart.draw(view, options);
}
</script>
';

// 11월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb11 = array(
               "#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99005C","#660053"
              ,"#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0500FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE11C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#011299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#005399","#005266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050119","#050066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8051D9","#3F0119","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990115","#660058"
              );

$data_col11 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column11 as $col11){
    $data_col11 .= ',["'.$col11->acct_mst_nm.'",'.$col11->amt.',"'.$rgb11[$i].'"]';
    $i++;
}

echo $data_col11;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "11월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values11"));
    chart.draw(view, options);
}
</script>
';

// 12월
echo '
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ';

$rgb12 = array(
               "#F6F6F6","#D5D5D5","#A6A6A6","#747474","#4C4C4C","#212121"
              ,"#EAEAEA","#BDBDBD","#8C8C8C","#5D5D5D","#353535","#191919"
              ,"#FF0000","#FF5E00","#FFBB00","#FFE400","#ABF200","#1DDB16"
              ,"#00D8FF","#0054FF","#0500FF","#5F00FF","#FF00DD","#FF007F"
              ,"#F15F5F","#F29661","#F2CB61","#E5D85C","#BCE55C","#86E57F"
              ,"#5CD1E5","#6799FF","#6B66FF","#A566FF","#000000","#FFFFFF"
              ,"#FFD8D8","#FFA7A7","#F15F5F","#CC3D3D","#980000","#670000"
              ,"#FAE0D4","#FFC19E","#F29661","#CC723D","#993800","#662500"
              ,"#FAECC5","#FFE12C","#F2CB61","#CCA63D","#997000","#664B00"
              ,"#FAF4C0","#FAED7D","#E5D85C","#C4B73B","#998A00","#665C00"
              ,"#E4F7BA","#CEF279","#BCE55C","#9FC93C","#6B9900","#476600"
              ,"#D4F4FA","#B2EBF4","#5CD1E5","#3DB7CC","#012299","#005766"
              ,"#D9E5FF","#B2CCFF","#6799FF","#4374D9","#005399","#005266"
              ,"#DAD9FF","#B5B2FF","#6B66FF","#4641D9","#050129","#050066"
              ,"#E8D9FF","#D1B2FF","#A566FF","#8051D9","#3F0129","#2A0066"
              ,"#FFD9FA","#FFB2F5","#F361DC","#D941C5","#990125","#660058"
              ,"#FFD9EC","#FFB2D9","#F361A6","#D9418C","#99005C","#660053"
              );

$data_col12 = '["계정", "금액", { role: "style" } ]';
$i = 0;
foreach($grp_column12 as $col12){
    $data_col12 .= ',["'.$col12->acct_mst_nm.'",'.$col12->amt.',"'.$rgb12[$i].'"]';
    $i++;
}
echo $data_col12;

echo '
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
title: "12월 (단위:천원)",
bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values12"));
    chart.draw(view, options);
}
</script>
';
?>



<!-- 본문 end -->
