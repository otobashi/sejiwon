<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**************************************************************************************************/
/* 1.프 로 젝 트 : SantaClaus                                                                       */
/*                                                                                                */
/* 2.모       듈 : Model                                                                           */
/*                                                                                                */
/* 3.프로그램 ID : cash_flow_model.php                                                              */
/*                                                                                                */
/* 4.기 능 설 명 : __construct    - 초기화                                                            */
/*                 add            - acct_mst Table Insert                                         */
/*                                                                                                */
/* 5.관련 Controllers   : par.php                                                                  */
/*                                                                                                */
/* 6.관련 Views  : acct_mst.php                                                                    */
/*                                                                                                */
/* 7.사용 테이블 : acct_mst                                                                          */
/*                                                                                                */
/* 8.변 경 이 력 :                                                                                  */
/*  version  작성자    일      자                   내                 용                      요청자   */
/*  -------  ------  ----------  -------------------------------------------------------  ------  */
/*  1.0      이상훈    2014.07.11  최초작성                                                           */
/*  1.1      이상훈    2015.07.06  Renewal Modify                                                   */
/**************************************************************************************************/

class pinky_report_model extends CI_Model {
  function __construct()
  {
      parent::__construct();
  }

/*************************************************************************************************/
/* 예산 입력                                                                                   */
/*************************************************************************************************/

  function plan_mgr_insert($option)
  {
      $this->db->set('ymd'          , $option['ymd']);
      $this->db->set('in_amt'       , $option['in_amt']);
      $this->db->set('out_amt'      , $option['out_amt']);
      $this->db->set('acct_dtl_id'  , $option['acct_dtl_id']);
      $this->db->set('description'  , $option['description']);
      $this->db->set('created','NOW()',false);
      $this->db->set('updated','NOW()',false);

      $this->db->insert('plan');

      $result = $this->db->insert_id();
      return $result;
  }

  function plan_mgr_upd($option)
  {
      $result = $this->db->query("UPDATE plan
                                  SET    ymd           = '".$option['ymd']."'
                                        ,in_amt        = '".$option['in_amt']."'
                                        ,out_amt       = '".$option['out_amt']."'
                                        ,acct_dtl_id   = '".$option['acct_dtl_id']."'
                                        ,description   = '".$option['description']."'
                                        ,updated = NOW()
                                  WHERE id = '".$option['id']."';  ");

      return $result;

  }

  function plan_mgr_list($option)
  {
      return $this->db->query("SELECT a.*
                               FROM   plan a
                               WHERE  a.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                               ")->result();
  }

  function plan_mgr_del($option)
  {
      $result = $this->db->query("delete from plan
                                  where id = '".$option['id']."';
                                 ");

      return $result;
  }

/*************************************************************************************************/
/* 결산                                                                                          */
/*************************************************************************************************/

  function set_year($option)
  {
      return $this->db->query("
                               SELECT CASE WHEN c.no = '1' THEN '' 
                                           WHEN c.no = '2' THEN a.acct_mst_nm
                                           WHEN c.no = '3' THEN '합계' END AS acct_mst_nm
                                     ,CASE WHEN c.no = '1' THEN a.acct_dtl_nm 
                                           WHEN c.no = '2' THEN ' 계'
                                           WHEN c.no = '3' THEN '' END AS acct_dtl_nm
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '01' THEN b.amt*a.cd END),0)/1000,0)) AS amt_01
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '02' THEN b.amt*a.cd END),0)/1000,0)) AS amt_02
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '03' THEN b.amt*a.cd END),0)/1000,0)) AS amt_03
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '01' OR b.ymd = '02' OR b.ymd = '03' THEN b.amt*a.cd END),0)/1000,0)) AS q1
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '04' THEN b.amt*a.cd END),0)/1000,0)) AS amt_04
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '05' THEN b.amt*a.cd END),0)/1000,0)) AS amt_05
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '06' THEN b.amt*a.cd END),0)/1000,0)) AS amt_06
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '04' OR b.ymd = '05' OR b.ymd = '06' THEN b.amt*a.cd END),0)/1000,0)) AS q2
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '07' THEN b.amt*a.cd END),0)/1000,0)) AS amt_07
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '08' THEN b.amt*a.cd END),0)/1000,0)) AS amt_08
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '09' THEN b.amt*a.cd END),0)/1000,0)) AS amt_09
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '07' OR b.ymd = '08' OR b.ymd = '09' THEN b.amt*a.cd END),0)/1000,0)) AS q3
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '10' THEN b.amt*a.cd END),0)/1000,0)) AS amt_10
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '11' THEN b.amt*a.cd END),0)/1000,0)) AS amt_11
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '12' THEN b.amt*a.cd END),0)/1000,0)) AS amt_12
                                     ,ABS(ROUND(NULLIF(SUM(CASE WHEN b.ymd = '10' OR b.ymd = '11' OR b.ymd = '12' THEN b.amt*a.cd END),0)/1000,0)) AS q4
                                     ,ABS(ROUND(NULLIF(SUM(b.amt*a.cd),0)/1000,0)) AS total
                               FROM  (
                                      SELECT a.acct_mst_nm AS acct_mst_nm
                                            ,b.acct_dtl_nm AS acct_dtl_nm
                                            ,b.acct_dtl_id AS acct_dtl_id
                                            ,a.ord_seq     AS mst_ord_seq
                                            ,b.ord_seq     AS dtl_ord_seq
                                            ,b.cd          AS cd
                                      FROM   acct_mst a
                                            ,acct_dtl b
                                      WHERE  a.acct_mst_id = b.acct_mst_id
                                     ) a
                                     LEFT OUTER JOIN
                                     (
                                      SELECT date_format(ymd,'%m') AS ymd
                                            ,acct_dtl_id        AS acct_dtl_id
                                            ,SUM(out_amt)       AS amt
                                      FROM   acct
                                      WHERE  ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                                      GROUP BY date_format(ymd,'%m')
                                              ,acct_dtl_id
                                      UNION ALL
                                      SELECT date_format(ymd,'%m') AS ymd
                                            ,acct_dtl_id        AS acct_dtl_id
                                            ,SUM(in_amt)        AS amt
                                      FROM   acct
                                      WHERE  ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                                      GROUP BY date_format(ymd,'%m')
                                              ,acct_dtl_id
                                     ) b ON a.acct_dtl_id = b.acct_dtl_id
                                     ,
                                     (
                                      SELECT '1' AS no FROM dual
                                      UNION ALL
                                      SELECT '2' AS no FROM dual
                                      UNION ALL
                                      SELECT '3' AS no FROM dual
                                     ) c
                               GROUP BY CASE WHEN c.no = '1' THEN ''
                                             WHEN c.no = '2' THEN a.acct_mst_nm
                                             WHEN c.no = '3' THEN '합계' END
                                       ,CASE WHEN c.no = '1' THEN a.acct_dtl_nm 
                                             WHEN c.no = '2' THEN ' 계'
                                             WHEN c.no = '3' THEN '' END
                               ORDER BY a.mst_ord_seq
                                       ,c.no desc
                                       ,a.dtl_ord_seq
                              ")->result();
  }

/*************************************************************************************************/
/* 무지출 캘린더                                                                                 */
/*************************************************************************************************/

  function zero_cal($option)
  {
      return $this->db->query("SELECT a.ymd AS ymd
                                     ,CASE WHEN b.out_amt > 0 THEN b.out_amt ELSE 0 END AS out_amt
	                             FROM   calendar a
	                                    LEFT OUTER JOIN
	                                    (SELECT a.ymd AS ymd
                                             ,SUM(a.out_amt) AS out_amt
                                       FROM   acct a
                                       WHERE  a.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                                       GROUP BY a.ymd) b 
                                      ON a.ymd = b.ymd
                               WHERE  a.ymd BETWEEN '".$option['from_date']."' AND '".$option['to_date']."'
                               ")->result();
  }

/*************************************************************************************************/
/* 월별 비중                                                                                     */
/*************************************************************************************************/
  function grp_year($option)
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

/*************************************************************************************************/
/* 월별 그래프                                                                                   */
/*************************************************************************************************/
  function grp_column($option)
  {
      return $this->db->query("SELECT a.acct_mst_nm AS acct_mst_nm
                                     ,ROUND(SUM(b.in_amt)/1000,0) AS amt
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
                                     ,ROUND(SUM(b.out_amt)/1000,0) AS amt
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

}

?>