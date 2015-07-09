/*************************************************************************************************/
/* 그래프                                                                                        */
/*************************************************************************************************/
/*

  function grp_year()
  {

    $data_url    = '/index.php/unaw/grp_year/';

    $this->_header($data_url);

		$year   = date('Y');

		$from01 = $year.'-01-01';
		$to01   = $year.'-01-31';

		$from02 = $year.'-02-01';
		$to02   = $year.'-02-31';

		$from03 = $year.'-03-01';
		$to03   = $year.'-03-31';

		$from04 = $year.'-04-01';
		$to04   = $year.'-04-31';

		$from05 = $year.'-05-01';
		$to05   = $year.'-05-31';
		
		$from06 = $year.'-06-01';
		$to06   = $year.'-06-31';
		
		$from07 = $year.'-07-01';
		$to07   = $year.'-07-31';
		
		$from08 = $year.'-08-01';
		$to08   = $year.'-08-31';
		
		$from09 = $year.'-09-01';
		$to09   = $year.'-09-31';
		
		$from10 = $year.'-10-01';
		$to10   = $year.'-10-31';
		
		$from11 = $year.'-11-01';
		$to11   = $year.'-11-31';
		
		$from12 = $year.'-12-01';
		$to12   = $year.'-12-31';

  	
 		$set_year01 = $this->acct_model->set_year(array('from_date'=>$from01, 'to_date' =>$to01));
 		$set_year02 = $this->acct_model->set_year(array('from_date'=>$from02, 'to_date' =>$to02));
 		$set_year03 = $this->acct_model->set_year(array('from_date'=>$from03, 'to_date' =>$to03));
 		$set_year04 = $this->acct_model->set_year(array('from_date'=>$from04, 'to_date' =>$to04));
 		$set_year05 = $this->acct_model->set_year(array('from_date'=>$from05, 'to_date' =>$to05));
 		$set_year06 = $this->acct_model->set_year(array('from_date'=>$from06, 'to_date' =>$to06));
 		$set_year07 = $this->acct_model->set_year(array('from_date'=>$from07, 'to_date' =>$to07));
 		$set_year08 = $this->acct_model->set_year(array('from_date'=>$from08, 'to_date' =>$to08));
 		$set_year09 = $this->acct_model->set_year(array('from_date'=>$from09, 'to_date' =>$to09));
 		$set_year10 = $this->acct_model->set_year(array('from_date'=>$from10, 'to_date' =>$to10));
 		$set_year11 = $this->acct_model->set_year(array('from_date'=>$from11, 'to_date' =>$to11));
 		$set_year12 = $this->acct_model->set_year(array('from_date'=>$from12, 'to_date' =>$to12));

    $this->load->view('grp_year',array(
                                        'set_year01' => $set_year01
                                       ,'set_year02' => $set_year02
                                       ,'set_year03' => $set_year03
                                       ,'set_year04' => $set_year04
                                       ,'set_year05' => $set_year05
                                       ,'set_year06' => $set_year06
                                       ,'set_year07' => $set_year07
                                       ,'set_year08' => $set_year08
                                       ,'set_year09' => $set_year09
                                       ,'set_year10' => $set_year10
                                       ,'set_year11' => $set_year11
                                       ,'set_year12' => $set_year12
                                      ) );
		$this->load->view('grp_year');
				
    $this->_footer();
  }
*/


/*************************************************************************************************/
/* 그래프                                                                                        */
/*************************************************************************************************/
  function set_year($option)
  {
      return $this->db->query("SELECT a.acct_mst_nm AS acct_mst_nm
                                     ,SUM(b.in_amt) AS amt
	                             FROM   (
                                      SELECT a.acct_mst_nm AS acct_mst_nm
                                            ,b.acct_dtl_nm AS acct_dtl_nm
                                            ,b.acct_dtl_id AS acct_dtl_id
                                            ,a.ord_seq     AS mst_ord_seq
                                            ,b.ord_seq     AS dtl_ord_seq
                                            ,b.cd          AS cd
                                      FROM   acct_mst a
                                            ,acct_dtl b
                                      WHERE  a.acct_mst_id = b.acct_mst_id
                                      AND    b.cd = 1
                                     ) a,
                                     acct b
                               WHERE  b.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                               AND    a.acct_dtl_id = b.acct_dtl_id
                               GROUP BY a.acct_mst_nm
                               UNION ALL
                               SELECT a.acct_mst_nm AS acct_mst_nm
                                     ,SUM(b.out_amt) AS amt
	                             FROM   (
                                      SELECT a.acct_mst_nm AS acct_mst_nm
                                            ,b.acct_dtl_nm AS acct_dtl_nm
                                            ,b.acct_dtl_id AS acct_dtl_id
                                            ,a.ord_seq     AS mst_ord_seq
                                            ,b.ord_seq     AS dtl_ord_seq
                                            ,b.cd          AS cd
                                      FROM   acct_mst a
                                            ,acct_dtl b
                                      WHERE  a.acct_mst_id = b.acct_mst_id
                                      AND    b.cd = -1
                                     ) a,
                                     acct b
                               WHERE  b.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                               AND    a.acct_dtl_id = b.acct_dtl_id
                               GROUP BY a.acct_mst_nm
                               ")->result();
  }
