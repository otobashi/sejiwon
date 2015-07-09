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

class pinky_acct_model extends CI_Model {
  function __construct()
  {
      parent::__construct();
  }

//--------------------------------------------------------------------------------------------------
// Acct Insert
//--------------------------------------------------------------------------------------------------
  function acct_mgr_insert($option)
  {
      $this->db->set('ymd'          , $option['ymd']);
      $this->db->set('in_amt'       , $option['in_amt']);
      $this->db->set('out_amt'      , $option['out_amt']);
      $this->db->set('acct_dtl_id'  , $option['acct_dtl_id']);
      $this->db->set('bank_id'      , $option['bank_id']);
      $this->db->set('wallet_id'    , $option['wallet_id']);
      $this->db->set('description'  , $option['description']);
      $this->db->set('created','NOW()',false);
      $this->db->set('updated','NOW()',false);

      $this->db->insert('acct');

      $result = $this->db->insert_id();
      return $result;
  }

//--------------------------------------------------------------------------------------------------
// Acct Update
//--------------------------------------------------------------------------------------------------
  function acct_mgr_update($option)
  {
      $result = $this->db->query("UPDATE acct
                                  SET    ymd           = '".$option['ymd']."'
                                        ,in_amt        = '".$option['in_amt']."'
                                        ,out_amt       = '".$option['out_amt']."'
                                        ,acct_dtl_id   = '".$option['acct_dtl_id']."'
                                        ,bank_id       = '".$option['bank_id']."'
                                        ,wallet_id     = '".$option['wallet_id']."'
                                        ,description   = '".$option['description']."'
                                        ,updated = NOW()
                                  WHERE id = '".$option['id']."';  ");

      return $result;
  }

//--------------------------------------------------------------------------------------------------
// Acct Delete
//--------------------------------------------------------------------------------------------------
  function acct_mgr_delete($option)
  {
      $result = $this->db->query("delete from acct
                                  where id = '".$option['id']."';
                                 ");

      return $result;
  }

//--------------------------------------------------------------------------------------------------
// Acct Code List
//--------------------------------------------------------------------------------------------------
  function acct_list(){
      return $this->db->query("SELECT a.acct_mst_id AS acct_mst_id
                                     ,b.acct_dtl_id AS acct_dtl_id
                                     ,a.acct_mst_nm AS acct_mst_nm
                                     ,b.acct_dtl_nm AS acct_dtl_nm
                               FROM   acct_mst a
                                     ,acct_dtl b
                               WHERE  a.acct_mst_id = b.acct_mst_id
                               AND    a.use_flag = 'Y'
                               AND    b.use_flag = 'Y'
                               ORDER BY a.ord_seq, b.ord_seq
                               ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Month Status Acct
//--------------------------------------------------------------------------------------------------
  function acct_mgr_list($option)
  {
      return $this->db->query("
                                SELECT distinct
                                       j.cd as cd
                                      ,j.ymd as ymd
                                      ,j.acct_dtl_id as acct_dtl_id
                                      ,j.bank_id as bank_id
                                      ,j.wallet_id as wallet_id
                                      ,j.in_amt    as in_amt
                                      ,j.out_amt   as out_amt
                                      ,j.description as description
                                      ,j.acct_mst_nm as acct_mst_nm
                                      ,j.acct_dtl_nm as acct_dtl_nm
                                      ,j.bank_nm as bank_nm
                                      ,j.acct_nm as acct_nm
                                      ,j.acct_no as acct_no
                                      ,m.wallet_nm as wallet_nm
                                      ,j.id as id
                                FROM   (                                
                                          SELECT f.id as id
                                                ,f.ymd as ymd
                                                ,f.acct_dtl_id as acct_dtl_id
                                                ,f.bank_id as bank_id
                                                ,f.wallet_id as wallet_id
                                                ,f.in_amt    as in_amt
                                                ,f.out_amt   as out_amt
                                                ,f.description as description
                                                ,f.acct_mst_nm as acct_mst_nm
                                                ,f.acct_dtl_nm as acct_dtl_nm
                                                ,f.cd as cd
                                                ,i.bank_nm as bank_nm
                                                ,i.acct_nm as acct_nm
                                                ,i.acct_no as acct_no
                                          FROM (
                                                 SELECT a.id as id
                                                       ,a.ymd as ymd
                                                       ,a.acct_dtl_id as acct_dtl_id
                                                       ,a.bank_id as bank_id
                                                       ,a.wallet_id as wallet_id
                                                       ,a.in_amt    as in_amt
                                                       ,a.out_amt   as out_amt
                                                       ,a.description as description
                                                       ,e.acct_mst_nm as acct_mst_nm
                                                       ,e.acct_dtl_nm as acct_dtl_nm
                                                       ,e.cd as cd
                                                 FROM  (
                                                         SELECT *
                                                         FROM   acct
                                                         WHERE  ymd = '".$option['ymd']."'
                                                       ) a
                                                       left join
                                                       (
                                                         SELECT b.acct_mst_nm as acct_mst_nm
                                                               ,c.acct_dtl_nm as acct_dtl_nm
                                                               ,c.acct_dtl_id as acct_dtl_id
                                                               ,c.cd          as cd
                                                               ,d.ymd         as ymd
                                                         FROM   acct_mst b
                                                               ,acct_dtl c
                                                               ,acct     d
                                                         WHERE  d.ymd = '".$option['ymd']."'
                                                         AND    d.acct_dtl_id = c.acct_dtl_id
                                                         AND    c.acct_mst_id = b.acct_mst_id
                                                       ) e
                                                       on  a.acct_dtl_id = e.acct_dtl_id
                                                       and a.ymd         = e.ymd
                                               ) f
                                               left join
                                               (
                                                 SELECT g.bank_id as bank_id
                                                       ,g.acct_nm as acct_nm
                                                       ,g.bank_nm as bank_nm
                                                       ,g.acct_no as acct_no
                                                       ,h.ymd     as ymd
                                                 FROM   bank g
                                                       ,acct h
                                                 WHERE  h.ymd = '".$option['ymd']."'
                                                 AND    h.bank_id = g.bank_id
                                               ) i
                                               on  f.bank_id = i.bank_id
                                               and f.ymd     = i.ymd
                                       ) j
                                       left join
                                       (
                                         SELECT k.wallet_id as wallet_id
                                               ,k.wallet_nm as wallet_nm
                                               ,l.ymd as ymd
                                         FROM   wallet k
                                               ,acct l
                                         WHERE  l.ymd = '".$option['ymd']."'
                                         AND    l.wallet_id = k.wallet_id
                                       ) m
                                       on  j.wallet_id = m.wallet_id
                                       and j.ymd     = m.ymd
                                order by j.cd desc, j.acct_mst_nm asc, j.acct_dtl_nm asc

                               ")->result();    
  }

//--------------------------------------------------------------------------------------------------
// Month Status Acct
//--------------------------------------------------------------------------------------------------
  function month_status_acct($option){
    return $this->db->query(" 
                              select cal.ymd as ymd
                                    ,acc.in_amt as in_amt
                                    ,acc.out_amt as out_amt
                                    ,ifnull(acc.in_amt,0) - ifnull(acc.out_amt,0) as mod_amt
                              from (
                                    select c.ymd as ymd
                                    from   calendar c
                                    where  c.ymd like concat(substring('".$option['ymd']."',1,7),'%')
                                   ) cal
                                   left join
                                   (
                                    select acc.ymd as ymd
                                          ,sum(acc.in_amt)  as in_amt
                                          ,sum(acc.out_amt) as out_amt
                                    from   acct acc
                                    where  acc.ymd like concat(substring('".$option['ymd']."',1,7),'%')
                                    group by acc.ymd
                                  ) acc
                              on cal.ymd = acc.ymd
                              order by 1
                              ;
                            ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Week Total Acct
//--------------------------------------------------------------------------------------------------
  function week_total_acct($option){
    return $this->db->query(" 
                              select cal.week as week
                                    ,sum(acc.in_amt)  as in_amt
                                    ,sum(acc.out_amt) as out_amt
                                    ,sum(acc.in_amt) - sum(acc.out_amt) as mod_amt
                              from   acct acc
                                    ,calendar cal
                              where  acc.ymd like concat(substring('".$option['ymd']."',1,7),'%')
                              and    acc.ymd = cal.ymd
                              group by cal.week
                              order by 1
                              ;
                            ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Week Total Acct
//--------------------------------------------------------------------------------------------------
  function month_total_acct($option){
    return $this->db->query(" 
                              select sum(acc.in_amt)  as in_amt
                                    ,sum(acc.out_amt) as out_amt
                                    ,sum(acc.in_amt) - sum(acc.out_amt) as mod_amt
                              from   acct acc
                              where  acc.ymd like concat(substring('".$option['ymd']."',1,7),'%')
                              ;
                            ")->row();
  }

}

?>