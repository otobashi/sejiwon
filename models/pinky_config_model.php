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

class pinky_config_model extends CI_Model {
  function __construct()
  {
      parent::__construct();
  }

//--------------------------------------------------------------------------------------------------
// Wallet List
//--------------------------------------------------------------------------------------------------
  function wallet_list(){
      return $this->db->query("SELECT a.*
                               FROM   wallet a
                               ORDER BY a.ord_seq
                              ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Wallet Add
//--------------------------------------------------------------------------------------------------
  function wallet_add($option)
  {

      $this->db->set('wallet_nm',  $option['wallet_nm']);
      $this->db->set('use_flag', $option['use_flag']);
      $this->db->set('ord_seq',  $option['ord_seq']);
      $this->db->set('created','NOW()',false);
      $this->db->set('updated','NOW()',false);

      $this->db->insert('wallet');

      $result = $this->db->insert_id();
      return $result;

  }

//--------------------------------------------------------------------------------------------------
// Wallet Upd
//--------------------------------------------------------------------------------------------------
  function wallet_upd($option)
  {
      $result = $this->db->query("update wallet
                                  set    wallet_nm     = '".$option['wallet_nm']."'
                                        ,use_flag      = '".$option['use_flag']."'
                                        ,ord_seq       = '".$option['ord_seq']."'
                                        ,updated = NOW()
                                  where wallet_id = '".$option['wallet_id']."';  ");

      return $option['wallet_id'];

  }

//--------------------------------------------------------------------------------------------------
// Wallet Del
//--------------------------------------------------------------------------------------------------
  function wallet_del($option)
  {
      $result = $this->db->query("delete from wallet
                                  where wallet_id = '".$option['wallet_id']."';  ");

      return $option['wallet_id'];

  }

//--------------------------------------------------------------------------------------------------
// Bank Code List
//--------------------------------------------------------------------------------------------------
  function bank_list(){
      return $this->db->query("SELECT a.*
                               FROM   bank a
                               ORDER BY a.ord_seq
                              ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Bank Code Add
//--------------------------------------------------------------------------------------------------
  function bank_add($option)
  {

      $this->db->set('acct_nm',  $option['acct_nm']);
      $this->db->set('bank_nm',  $option['bank_nm']);
      $this->db->set('acct_no',  $option['acct_no']);
      $this->db->set('use_flag', $option['use_flag']);
      $this->db->set('ord_seq',  $option['ord_seq']);
      $this->db->set('created','NOW()',false);
      $this->db->set('updated','NOW()',false);

      $this->db->insert('bank');

      $result = $this->db->insert_id();
      return $result;

  }

//--------------------------------------------------------------------------------------------------
// Bank Code Upd
//--------------------------------------------------------------------------------------------------
  function bank_upd($option)
  {
      $result = $this->db->query("update bank
                                  set    acct_nm  = '".$option['acct_nm']."'
                                        ,bank_nm  = '".$option['bank_nm']."'
                                        ,acct_no  = '".$option['acct_no']."'
                                        ,use_flag = '".$option['use_flag']."'
                                        ,ord_seq  = '".$option['ord_seq']."'
                                        ,updated = NOW()
                                  where bank_id = '".$option['bank_id']."';  ");

      return $option['bank_id'];

  }

//--------------------------------------------------------------------------------------------------
// Bank Code Del
//--------------------------------------------------------------------------------------------------
  function bank_del($option)
  {
      $result = $this->db->query("delete from bank
                                  where bank_id = '".$option['bank_id']."';  ");

      return $option['bank_id'];

  }

//--------------------------------------------------------------------------------------------------
// Code Acct Mst List
//--------------------------------------------------------------------------------------------------
  function total_acct_mst_list()
  {
      return $this->db->query("SELECT a.*
                               FROM   acct_mst a
                               ORDER BY a.ord_seq
                               ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Code Acct Dtl List
//--------------------------------------------------------------------------------------------------
  function total_acct_dtl_list()
  {
      return $this->db->query("SELECT a.*
                               FROM   acct_dtl a
                               ORDER BY a.acct_mst_id, a.ord_seq
                               ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Code Acct Mst List
//--------------------------------------------------------------------------------------------------
  function acct_mst_use_list()
  {
      return $this->db->query("SELECT a.*
                               FROM   acct_mst a
                               WHERE  use_flag = 'Y'
                               ORDER BY a.ord_seq
                               ")->result();
  }

//--------------------------------------------------------------------------------------------------
// Code Acct Mst Add
//--------------------------------------------------------------------------------------------------
  function acct_mst_add($option)
  {

      $this->db->set('acct_mst_nm',  $option['acct_mst_nm']);
      $this->db->set('use_flag', $option['use_flag']);
      $this->db->set('ord_seq',  $option['ord_seq']);
      $this->db->set('created','NOW()',false);
      $this->db->set('updated','NOW()',false);

      $this->db->insert('acct_mst');

      $result = $this->db->insert_id();
      return $result;

  }

//--------------------------------------------------------------------------------------------------
// Code Acct Mst Upd
//--------------------------------------------------------------------------------------------------
  function acct_mst_upd($option)
  {
      $result = $this->db->query("update acct_mst
                                  set    acct_mst_nm   = '".$option['acct_mst_nm']."'
                                        ,use_flag      = '".$option['use_flag']."'
                                        ,ord_seq       = '".$option['ord_seq']."'
                                        ,updated = NOW()
                                  where acct_mst_id = '".$option['acct_mst_id']."';  ");

      return $option['acct_mst_id'];

  }

//--------------------------------------------------------------------------------------------------
// Code Acct Mst Upd
//--------------------------------------------------------------------------------------------------
  function acct_mst_del($option)
  {
      $result = $this->db->query("delete from acct_mst
                                  where acct_mst_id = '".$option['acct_mst_id']."';  ");

      $result = $this->db->query("delete from acct_dtl
                                  where acct_mst_id = '".$option['acct_mst_id']."';  ");

      return $option['acct_mst_id'];

  }

//--------------------------------------------------------------------------------------------------
// Code Acct Dtl Add
//--------------------------------------------------------------------------------------------------
  function acct_dtl_add($option)
  {

      $this->db->set('acct_mst_id',  $option['acct_mst_id']);
      $this->db->set('acct_dtl_nm',  $option['acct_dtl_nm']);
      $this->db->set('cd',           $option['cd']);
      $this->db->set('use_flag', $option['use_flag']);
      $this->db->set('ord_seq',  $option['ord_seq']);
      $this->db->set('created','NOW()',false);
      $this->db->set('updated','NOW()',false);

      $this->db->insert('acct_dtl');

      $result = $this->db->insert_id();
      return $result;

  }

//--------------------------------------------------------------------------------------------------
// Code Acct Dtl Upd
//--------------------------------------------------------------------------------------------------
  function acct_dtl_upd($option)
  {
      $result = $this->db->query("update acct_dtl
                                  set    acct_mst_id   = '".$option['acct_mst_id']."'
                                        ,acct_dtl_nm   = '".$option['acct_dtl_nm']."'
                                        ,cd            = '".$option['cd']."'
                                        ,use_flag      = '".$option['use_flag']."'
                                        ,ord_seq       = '".$option['ord_seq']."'
                                        ,updated = NOW()
                                  where acct_dtl_id = '".$option['acct_dtl_id']."';  ");

      return $option['acct_dtl_id'];

  }

//--------------------------------------------------------------------------------------------------
// Code Acct Mst Upd
//--------------------------------------------------------------------------------------------------
  function acct_dtl_del($option)
  {
      $result = $this->db->query("delete from acct_dtl
                                  where acct_dtl_id = '".$option['acct_dtl_id']."';  ");

      return $option['acct_dtl_id'];

  }

}

?>