<?php

session_start();
$dialog_pop_up_disabled_flag = 1;

require_once(dirname(__FILE__) . '/../config/session.php');
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../helpers/common-helper.php');
require_once(dirname(__FILE__) . '/../include/header.php');
require_once(dirname(__FILE__) . '/../model/queryHelper.php');
// require_once(dirname(__FILE__) . '/../include/loader.php');
require_once "../include/helper.functions.php";
require_once "../include/display-name-functions.php";
require_once "../include/case-query-function-insert.php";

$notepadflag=0;
$level_id = 1;
if (isset($_REQUEST['page'])) {
    $page = replace_special($_REQUEST['page']);
}
if (isset($_REQUEST['app_id'])) {
    $id = replace_special(urldecode(base64_decode($_REQUEST['app_id'])));
    $ut = replace_special($_REQUEST['ut']);
}
// $q_id = $id;
if (isset($_REQUEST['cust_id'])) {
    $cust_id = replace_special(urldecode(base64_decode($_REQUEST['cust_id'])));
}

if (isset($_REQUEST['loan_type'])) {
    $loan_type = replace_special(urldecode(base64_decode($_REQUEST['loan_type'])));
}
if (isset($_REQUEST['case_id'])) {
    $case_id = replace_special(urldecode(base64_decode($_REQUEST['case_id'])));
}
$ch_pcity = replace_special($_REQUEST['ch_pcity']);
if ($ch_pcity == 1) {
    echo "<script>alert('Enter Valid City');</script>";
}

$qryyy_id = $id;
$qry = "Select * from  crm_query_application where crm_query_id ='".$qryyy_id."'";
// if ($user_role == 3 && $ut != 2) {
//     $qry .= "  and (qry.lead_assign_to = '" . $user . "')";
// } else if (($user_role == 2 || $user_role == 4) && $ut != 2) {
//     if($user_role == 2){
//         $qry .= " and qry.lead_assign_to IN ($tl_member,0) ";
//     }
//     $qry .= " and qry.loan_type_id IN ($tl_loan_type)";
// }
$qry .= " order by crm_query_id desc";
// print_r($qry);
$res = mysqli_query($Conn1, $qry) or die(mysqli_error($Conn1));
$exe_form = mysqli_fetch_array($res);
// print_r($exe_form);


if ($exe_form['id'] == '' || $exe_form['id'] == 0) {
    if ($user_role == 3) {
        header("location:user.php");
    } else if ($user_role == 2) {
        header("location:index.php");
    }
} else {
    // $cust_id = $exe_form['cust_id'];

    // $tool_type = $exe_form['tool_type'];
    $name_bank = $exe_form['bank_id'];

    $get_bank_name = get_name("",$name_bank);

    $application_status = $exe_form['application_status'];
    $qry1 = "Select value from  crm_master_status where status_type = 2 and  id ='".$application_status."'";
    $res = mysqli_query($Conn1, $qry1) or die(mysqli_error($Conn1));
    $application_status_get = mysqli_fetch_array($res);
    $applied_amount = $exe_form['applied_amount'];
    $sanction_amount = $exe_form['sanction_amount'];
    $disbursed_amount = $exe_form['disbursed_amount'];
    $login_date = $exe_form['login_date'];
    $sanction_date = $exe_form['sanction_date'];
    $disburse_date = $exe_form['disburse_date'];
    $bank_application_no = $exe_form['bank_application_no'];
    $remarks_by_user = $exe_form['description_by_user'];
    $remarks_by_bank=$exe_form['description_by_bank'];
    $follow_up_date=$exe_form['follow_up_date'];
    $follow_up_time=$exe_form['follow_up_time'];
    $follow_up_given_by=$exe_form['follow_up_given_by'];
    $tennure=$exe_form['tennure'];
    $emi=$exe_form['emi'];

    // echo $get_bank_name;
   
    // $lead_date_time = $exe_form['date'];


    // $new_src = str_replace('', '', $exe_form['page_url']);
    // $src_exp = explode("/", $new_src);
    // $count = count($src_exp);
    // for ($i = 0; $i < $count; $i++) {
    //     $src[] = str_replace(array('-', '/', '*', '.php'), ' ', $src_exp[$i]);
    // }
    // $final_src = ucwords(implode(" ", $src)) . " (" . $exe_form['tool_type'] . ")";

    // $cust_data = mysqli_query($Conn1, "select cust.cibil_score as cibil_score,cust.company_id as comp_id,cust.name as mname,city.city_name as city_name,city.city_sub_group_id as city_sub_group_id, comp.company_name as comp_name,cust.salary_bank_id as bank_id,cust.salutation_id as salu_id,cust.name as name,cust.dob as dob,cust.phone_no as phone, cust.email_id as email,cust.address as res_address,cust.occupation_id as occup_id,cust.net_income as net_incm, cust.company_name as comp_name_other,cust.pan_no as pan_card,cust.city_id city_id,cust.alternate_phone_no as alt_phone, cust.bank_account_no as account_no,cust.ofc_contact as ofc_contact,cust.office_address as offce_address,cust.office_pincode as ofc_pincode, cust.office_email_id as ofc_email,cust.office_city_id as work_city,cust.marital_status_id as maritalstatus,cust.current_work_exp as cur_comp_wrk_exp, cust.total_work_exp as totl_wrk_exp,cust.mode_of_salary AS salary_pay_id,cust.pincode as pincode from crm_customer as cust left join crm_master_city as city on cust.city_id = city.id left join crm_master_company as comp on cust.company_id = comp.id where cust.id = " . $cust_id . "");
   
    // $result_cust_data = mysqli_fetch_array($cust_data);

    // $city_sub_group_id = $result_cust_data['city_sub_group_id'];
    // $city_name = $result_cust_data['city_name'];
    // $employer_type = $comp_id = $result_cust_data['comp_id'];
    // $saving_accounts_with = $main_account = $result_cust_data['bank_id'];
    // $salu_id = $result_cust_data['salu_id'];
    // $name = $result_cust_data['name'];
    // $mname = $result_cust_data['mname'];
    // $dob = $result_cust_data['dob'];
    // $comp_name = $result_cust_data['comp_name'];

    // $phone = $mobile = $result_cust_data['phone'];
    // $email = $result_cust_data['email'];
    // $res_addrs = $result_cust_data['res_address'];
    // $occup = $result_cust_data['occup_id'];
    // $net_incm = $result_cust_data['net_incm'];
    // $cibil_score = $result_cust_data['cibil_score'];
    // if ($employer_type == 0) {
    //     $comp_name_other = $result_cust_data['comp_name_other'];
    // }
    // // if ($comp_id == '38665') {
    // //     $comp_name = get_display_name('comp_name', $result_cust_data['comp_id'])." - ".get_display_name('sub_employer', $sub_employer_type);
    // // }
    // $pan_card = $result_cust_data['pan_card'];
    // $city_id = $result_cust_data['city_id'];
    // $alt_phone = $result_cust_data['alt_phone'];
    // $account_no = $result_cust_data['account_no'];
    // $office_landline = $result_cust_data['ofc_contact'];
    // $offce_address = $result_cust_data['offce_address'];
    // $ofc_pincode = $result_cust_data['ofc_pincode'];
    // $ofc_email = $result_cust_data['ofc_email'];
    // $work_city = $result_cust_data['work_city'];
    // $maritalstatus = $result_cust_data['maritalstatus'];
    // $ofc_city_name = get_display_name("city_name", $work_city);
    // $ccwe = $result_cust_data['cur_comp_wrk_exp'];
    // $twe = $result_cust_data['totl_wrk_exp'];
    // $salary_pay_id = $result_cust_data['salary_pay_id'];
    // $pin_code = $result_cust_data['pincode'];
    // //$saving_accounts_with = $result_cust_data['saving_accounts_with'];
    // $check_cibil_val = 1;
    // if(($exis_loans == 0 || $exis_loans == '') && ($credit_running == 0 || $credit_running == '') && $loan_in_past == 2){
    //     $check_cibil_val = 0;
    // }

    // // if ($state_cust > 0) {
    // //     $state = $state_cust;
    // // } else {
    // //     $state = $result_cust_data['state_id'];
    // // }



    // // $credit_score_query = "select * from tbl_credit_score where query_id = '" . $id . "'";
    // // $result_credit_score_query = mysqli_query($Conn1, $credit_score_query);
    // // $info_credit_query = mysqli_fetch_array($result_credit_score_query);

    // $ol_level_id = 1;
    // $ol_query_id = $q_id;
    // $ol_priority_id = str_replace(array('P','p'),'',$_REQUEST['priority']);
    // $ol_user_id = $user;
    // $ol_date = date("Y-m-d h:i:s");

    // if($_REQUEST['search_type'] == '' || $_REQUEST['search_type'] == 0){
    //     $search_type = 3;
    // }else{
    //     $search_type = $_REQUEST['search_type'];
    // }

    
    // if (trim($pan_card) != '') {
    //     $pan_customer_qry = mysqli_query($Conn1, "select min(id) as cust_pan_id,count(*) as total_count_pan from crm_customer where id > 0 and pan_no = '" . trim($pan_card) . "' order by pan_no");
    //     $result_customer_qry = mysqli_fetch_array($pan_customer_qry);
    //     $count_pan = $result_customer_qry['total_count_pan'];
    //     $cust_pan_id = $result_customer_qry['cust_pan_id'];
    // }

    ?>
    <html>
    <head>
    </head>
    <body>
        <!-- <input type="hidden" name="final_query_id" value="<?php echo urlencode(base64_encode($id));?>"> -->
    <div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>
    <div style="width:100%;">
                    <div style="padding-left: 1%;padding-right: 1%;">
                        


 <?php
//  $src_id = "https://www.myloancare.in/credit-score/free-credit-report/?getID=" . base64_encode($cust_id) . "&sorce=crm&cTo=" . base64_encode('Query No@#' . $id . '@#' . $email);
 //include("../../include/short-url.php");
 ?>
 <!-- <a href='<?php echo $src_id; ?>' target="_blank"><input type="button" style='background: #1b8c1b;'
                                                         class="buttonsub cursor" id='shrt_url'
                                                         value="Experian SMS"></a>  -->

<?php //if(!in_array($user, array(445, 448))) { ?>
    <!-- <a href="javascript:void(0);" id='show_btn' onclick="number_show('<?php echo $id; ?>','query');">
        <input type="button" style='background: #18375f;' class="buttonsub cursor" value="Show Number">
    </a>
    <a href="javascript:void(0);" id='show_alt_btn' onclick="alt_number_show('<?php echo $id; ?>','query');">
        <input type="button" style='background: #18375f;' class="buttonsub cursor" value="Show Alt. Number">
    </a> -->
<?php //} ?>

<?php $level_type = 1; ?>
<?php
// if($tool_type == "Cross Sell - Auto") {
//     $tool_type_filter = 1;
// } else {
//     $tool_type_filter = 0;
// }


// if($call_button_display == 1){echo common_call_btn($user, $Conn1, $phone, $query_status, $qryyy_id, $ver_phone, $level_type,$mobile_status, $tool_type_filter,$loantype_name,$loan_type); } ?>

</span>
                        </div>
                    </div>
                </div>
    <div class="container-fluid main-container">
        <!-- End Header -->

        <!-- Page Content
        ================================================== -->
        <div class="d-block row"><!--Container row-->

            <!-- Title Header -->
            <div class="span9"><!--Begin page content column-->

                <?php //if(in_array($loan_type,array(51,52,54,60,32,71,11,57,63))){ ?>
                    <div style="width:100%;float:left;">
               <?php //} else{ ?>
                    <!-- <div style="width:60%;float:left;"> -->
               <?php //} ?>
                    <div align="center">
                        <div class="wrapper">

<span class='orange f_13' style="font-weight:bold;"><?php
    $tool_type_ybl = '';
    if (strpos($exe_form['page_url'], 'YBL_Bluesky') !== false) {
        $tool_type_ybl = "( <span class='green'>YBL Bluesky Lead</span> )";
    }

    //echo preg_replace('/[0-9]+/', '', $final_src) . "<span class='green'> " . $frm_type . $cr_record . "</span><br>" . $tool_type_ybl;
    echo "<span class='ml10 fs-13' style='font-weight: normal; color: #000'>Query ID: </span>";
    echo "<span style='font-weight: 600; color: #000;'>".$qryyy_id."</span>
    <span class='ml10 fs-13' style='font-weight: normal; color: #000'>Case Id:</span>
    "; ?>
    <span id="mention_case_no" style='font-weight: 600; color: #000;'>
        <?php echo is_numeric($case_id)? $case_id:' -'; ?>
    </span>
   <?php echo "<span class='ml10 fs-13' style='font-weight: normal; color: #000'>Query Date: </span>";
    echo "<span style='font-weight: 600; color: #000;'>".date("d-m-Y", strtotime($exe_form['created_onSS']))." ".$timeindia."</span>";
    if($_REQUEST['priority']){
        echo "<span class='ml10 fs-13' style='font-weight: normal; color: #000'>Priority: </span>";
        echo "<span style='font-weight: 600; color: #000;'>".$_REQUEST['priority']."</span>";
    }
    if($exe_form['fup_date'] != '' && $exe_form['fup_date'] != '0000-00-00' && $exe_form['fup_date'] != '1970-01-01') {
            $fup_time = $exe_form['fup_time'] != '00:00:00'?date('H:i a',strtotime($exe_form['fup_time'])):"-";
            echo "<span class='ml10 fs-13' style='font-weight: normal; color: #000'>Next Call Time: </span>";
            echo "<span style='font-weight: 600; color: #000;'>".date('d-m-Y',strtotime($exe_form['fup_date']))." ".$fup_time."</span>";
        }

        $current_status = "--";
        if($exe_form['query_status'] != "--" && $exe_form['query_status'] != "" && $exe_form['query_status'] != "0") {
           /* $select_status_qry = "select qy_status from tbl_query_status where qy_status_id = ".$exe_form['query_status'];
            $select_status_exe = mysqli_query($Conn1, $select_status_qry);
            if(mysqli_num_rows($select_status_exe) > 0) {
                $select_status_res = mysqli_fetch_array($select_status_exe);
                $current_status = $select_status_res['qy_status'];
            }*/
            // $current_status = get_display_name('query_status',$exe_form['query_status']);
            // if($current_status == ''){
            //     $current_status = get_display_name('new_status_name',$exe_form['query_status']);
            // }

            // if(in_array($exe_form['query_status'], array(1003, 1004))) {
            //     $query_other_status = trim($exe_form['other_status'], ',');
            //     $other_status_query = " SELECT group_concat(' ', description) AS new_status FROM status_master WHERE status_id IN ($query_other_status) AND is_active_for_filter = 1 ";
            //     $other_status_exe = mysqli_query($Conn1, $other_status_query);
            //     $other_status_res = mysqli_fetch_array($other_status_exe);
            //     $current_status = $current_status.", ".$other_status_res['new_status'];
            // }
        }

        echo " <span class='ml10 fs-13' style='font-weight: normal; color: #000'>Current Status:</span> <span style='font-weight: 600; color: #000;'> ".$current_status." </span>";

        echo "<span class='ml10 fs-13' style='font-weight: normal; color: #000'>Tool Type:</span>";
        if($tool_type == 'Cross Sell - Auto') {
            echo "<a href='javascript:void' onclick='toCrossSell()'><span class='badge-success badge-pill badge' style='font-weight: 600; color: #000; font-size: 12px'> ".$tool_type." </span></a>";
        } else {
            if($tool_type == 'Partner1') {
                $tool_type_url = $exe_form['page_url'];
                $tool_type_url_arr = explode("utm_campaign=", $tool_type_url);
                $tool_type = $tool_type." ".$tool_type_url_arr[1];
            }
            echo "<span style='font-weight: 600; color: #000;'> ".$tool_type." </span>";
        }

        // if(in_array($exe_form['query_status'], array('5','16','17','11','13','18', '21')) && $exe_form['fup_date'] != '' && $exe_form['fup_date'] != '0000-00-00') {
        //     echo "<br><span class='ml10 fs-13' style='font-weight: normal; color: #000'>Updated Date: </span>";
        //     $update_qry = "select * from tbl_mint_case_followup where query_id = '" . $id . "' order by follow_id desc limit 1";
        //     $update_exe = mysqli_query($Conn1, $update_qry);
        //     $updated_date = "--";
        //     $updated_time = "--";
        //     if(mysqli_num_rows($update_exe) > 0) {
        //         $update_res = mysqli_fetch_array($update_exe);
        //         $updated_date = ($update_res['date'] != "0000-00-00" && $update_res['date'] != "" && $update_res['date'] != "1970-01-01") ? date("d-m-Y", strtotime($update_res['date'])) : "--";
        //         if($updated_date != "--" && $update_res['time'] != "00:00:00" && $update_res['time'] != "") {
        //             $updated_time = date("h:i:s A", strtotime($update_res['time']));
        //         }
        //     }
        //     echo "<span style='font-weight: 600; color: #000;'>".$updated_date." ".$updated_time."</span>";

        //     if($exe_form['query_status_desc'] != ''){
        //         echo "<br><span class='ml10 fs-13' style='font-weight: normal; color: #000'>Remarks: </span>";
        //         echo "<span style='font-weight: 600; color: #000;'>".$exe_form['query_status_desc']."</span>";
        //     }
        // }

    //  if ($ref_mobile != '' && $ref_mobile != 0) {
    //     if($refer_form_type == 3){
    //          echo "<span class='orange' style='margin-left:20px;'>Referred by : " . $referral_name . "</span>";
    //     } else if($refer_form_type == 2) {
    //         $part_source = $result_refer_name['source'];
    //         $ref_city_name = $result_refer_name['work_city'];
    //         $ref_cname = "";
    //         if($ref_city_name != "" && $ref_city_name != "0") {
    //             $ref_cname = get_display_name("city_name", $ref_city_name);
    //         }
    //         if($ref_cname != "") {
    //             $ref_cname = " - ".$ref_cname;
    //         }
    //         if($part_source == 1){
    //             $partner_source = 'App';
    //         }else if($part_source == 2){
    //             $partner_source = 'CRM';
    //         }else{
    //             $partner_source = 'Web';
    //         }
    //         echo "<span class='orange' style='margin-left:20px;'>Referred by : " . $referral_name . " (" . $referral_phone . "".$ref_cname." - ".$partner_source.")</span>";
    //     } else {
    //         echo "<span class='orange' style='margin-left:20px;'>Referred by : " . $referral_name . " (" . $referral_phone . ")</span>";
    //     }
    // } 
    ?>
    </span>

                             <!-- Toggle Div -->
                             <?php // include("type_of_loan.php");
                            // $select="select final_status from hl_filtering where level_id=$id and level_type=$level_type order by id desc limit 0,1";
                            // $resufil=mysqli_query($Conn1, $select);
                            // $rowfilter=mysqli_fetch_array($resufil);
                            // $filterstatus=$rowfilter['final_status'];
                            if($filterstatus!=""){
                                $filter=1;
                            }
                            else{
                                $filter=0;
                            }
                            if($filterstatus!=""){
                            if($filterstatus=="Green"){
                               // $style="background: #1b8c1b;";
                                $class="np-greenbtn";
                            }
                            else if($filterstatus=="Red"){

                                $class="np-redbtn";
                            }
                            else{
                               // $style="background: orenge;";
                                $class="np-amberbtn";
                            }
                        }
                        else{
                            $style="visibility: hidden;";
                        }
                        ?>

                            <!-- <input type="button" class="buttonsub cursor float-rt"  style="margin-left:0; float:left;" value="HL Filtering" name="hlque" id="hlque">
                            <input type="button" class="buttonsub cursor float-rt <?php echo $class;?> "  style="margin-left:0; float:left;<?php echo $style;?>" value=" <?php echo $filterstatus; ?>" name="hlfilter" id="hlfilter"> -->
                             <!-- Toggle Div -->

                            <?php //if ($user_role == 3 && $_SESSION['dialer_link'] != '' && $ver_phone == '1') {
                            // if($_SESSION['show_number_flag'] == 2) {
                                // if(in_array($user_role, array(1, 2, 3, 4)) || in_array($user, array(162, 83, 341))) {
                                    //if(!in_array($user, array(445, 448))) {
                            ?>
                                <!-- <a href="javascript:void(0);" id='show_btn'
                                   onclick="number_show('<?php echo $id; ?>','query');"><span
                                            class='box'><b>Show Number</b></span></a> -->
                            <?php //}
                                //}
                            // if($_SESSION['show_number_flag'] == 2) {
                                // if(in_array($user_role, array(1, 2, 3, 4)) || in_array($user, array(162, 83, 341))) {
                                //if(!in_array($user, array(445, 448))) {
                            ?>
                                <!-- <a href="javascript:void(0);" id='show_alt_btn' onclick="alt_number_show('<?php echo $id; ?>','query');">
                                    <span class='box'><b>Show Alt. Number</b></span>
                                </a> -->
                            <?php //}
                                //}
                            if ($id > $old_form_id) {
                                if ($old_form_id > 0) { ?>
                                    <input type="hidden" class="buttonsub cursor"
                                           value="Query Generated from : <?php echo $old_form_id; ?>"><?php } ?>
                                <a href="javascript:void(0);" onclick="loan_select();"><input type="hidden" class="buttonsub cursor float-rt" style='margin-right: -17%;' value="Generate Query"></a> <?php } else if ($old_form_id != '0' && $id < $old_form_id) {
                                echo '<input type="hidden" class="buttonsub cursor float-rt"  style="margin-right: -17%;" value="New Query Generated: ' . $old_form_id . '">';
                            } ?>
                            <div class='clear'></div>
                           <?php
                           
                           require_once "../include/crm_functions-new.php";
                           include("js-insert.php");
                            include("form_index_app.php");
                           
                            //include("generate-popup.php");
                              ?>
                            <br>
                            <!-- <span class="f_12"><span class="orange ml10 f_14">Date:</span> -->
   <?php //echo date("d-m-Y", strtotime($exe_form['date'])); ?>
   <!-- <span class="f_12"><span class="orange ml10 f_14">Time:</span> -->
 <?php //echo $timeindia; ?></span>
   <!-- <span class="f_12"><span class="orange ml10 f_14">IP Address:</span> -->
   <?php //echo $exe_form['user_ip']; ?></span>
   <!-- <span class="f_12"><span class="orange ml10 f_14">Query ID:</span> -->
   <?php //echo $q_id; ?></span> <br><br>

   <!-- <span class="f_12"><span class="orange ml10 f_14">Device Type:</span> -->
   <?php //echo $exe_form['device_type']; ?></span>

  <!-- <span class="f_12"><span class="orange ml10 f_14">Page URL:</span> -->
   <?php //echo $exe_form['page_url']; ?></span>

 <div style="clear:both;padding:2%;"></div>
   <div id="follow_history" class="follow_history">
<?php
//include("query_followup_history.php"); ?><br><br>
</div>
                        </div>
                    </div>
                </div>
<link href="../assets/css/notepad.css" rel='stylesheet' type='text/css' />
<script src="../assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontal_details_tab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>
<script>
    <?php  echo "hello 8 "; ?>
    var loaded_qry_tab = false;
    var loaded_cases_tab = false;
    var loaded_app_tab = false;
    var loaded_lead_alloc = false;
    var loaded_raw_details = false;
    var loaded_api_res = false;
    var loaded_other_details = false;
    var loaded_show_number = false;
    var loaded_call_log = false;
    var loaded_bnk_mapp = false;
    var loaded_one_lead = false;
    var loaded_page_summary = false;
    var loaded_cross_sell = false;
    var loaded_document = false;
    var loaded_hl_filter = false;
    var loaded_getdailer=false;
    var loaded_pre_approved_offers=false;
    var loaded_whatsapp_msg = false;
    var loaded_missed_call = false;
    var loaded_dialer_sms = false;
    var loaded_nearest_pat = false;
    function callAjaxData(e) {
       if(e.id == "raw_details") {
            var query_id = "<?php echo $qryyy_id; ?>";
            if(loaded_raw_details) return;
            if(query_id) {
                $.ajax({
                    type: "POST",
                    url: "../insert/ajax_insert_updated_query_details.php",
                    data: "query_id="+query_id,
                    beforeSend: function () {
                        $(".tab-2 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-2 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-2 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-2 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_raw_details = true;
        } 
        // else if(e.id == "cases_tab") {
        //     var case_id = "<?php echo $case_id; ?>";
        //     if(loaded_cases_tab) return;
        //     if(case_id) {
        //         $.ajax({
        //             type: "POST",
        //             url: "../insert/ajax_insert_cust_query_history.php",
        //             data: "case_id="+case_id+"&type=case",
        //             beforeSend: function () {
        //                 $(".tab-3 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../../assets/img/common-loader.gif" /></div>');
        //             },
        //             success: function(msg) {
        //                 if(msg.trim() == "") {
        //                     $(".tab-3 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //                 } else {
        //                     $(".tab-3 > .facts > .register > .table_set").html(msg);
        //                 }
        //             }
        //         });
        //     } else {
        //         $(".tab-3 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //     }
        //     loaded_cases_tab = true;
        // } 
        else if(e.id == "app_tab") {
            var case_id = "<?php echo $case_id; ?>";
            var loan_type = "<?php echo $loan_type; ?>";
            var cust_id = "<?php echo $cust_id; ?>";
            if(loaded_app_tab) return;
            if(case_id) {
                $.ajax({
                    type: "POST",
                    url: "../insert/ajax_insert_cust_query_history.php",
                    data: "case_id="+case_id+"&loan_type="+loan_type+"&cust_id="+cust_id+"&type=app",
                    beforeSend: function () {
                        $(".tab-4 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-4 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-4 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-4 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_app_tab = true;
        } else if(e.id == "other_details") {
            var query_id = "<?php echo $qryyy_id; ?>";
            if(loaded_other_details) return;
            if(query_id) {
                $.ajax({
                    type: "POST",
                    url: "../query/query_other_details.php",
                    data: "query_id="+query_id,
                    beforeSend: function () {
                        $(".tab-5 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-5 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-5 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-5 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_other_details = true;
        }
        else if(e.id == "app_rq_rs") {
            var case_id = "<?php echo $case_id; ?>";
            var query_id = "<?php echo $qryyy_id; ?>";
            if(loaded_api_res) return;
            if(case_id || query_id) {
                $.ajax({
                    type: "POST",
                    url: "../app/case_app_req_res.php",
                    data: "case_id="+case_id+"&query_id="+query_id,
                    beforeSend: function () {
                        $(".tab-6 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-6 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-6 > .facts > .register > .table_set").html(msg);
                            show_hide(".request_send");
                            show_hide(".response_recv");
                        }
                    }
                });
            } else {
                $(".tab-6 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_api_res = true;
        }else if(e.id == "lead_alloc") {
            var query_id = "<?php echo $qryyy_id; ?>";
            var case_id = 0;
            if(loaded_lead_alloc) return;
            if(query_id) {
                $.ajax({
                    type: "POST",
                    url: "../assign/assign-history.php",
                    data: "case_id="+case_id+"&query_id="+query_id,
                    beforeSend: function () {
                        $(".tab-7 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-7 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-7 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-7 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_lead_alloc = true;
        } else if(e.id == "show_number") {
            var query_id = "<?php echo $qryyy_id; ?>";
            if(loaded_show_number) return;
            if(query_id) {
                $.ajax({
                    type: "POST",
                    url: "../insert/show_number_history.php",
                    data: "query_id="+query_id+"&type=query",
                    beforeSend: function () {
                        $(".tab-8 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-8 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-8 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-8 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_show_number = true;
        } else if(e.id == "call_log") {
            var query_id = "<?php echo $qryyy_id; ?>";
            if(loaded_call_log) return;
            if(query_id) {
                $.ajax({
                    type: "POST",
                    url: "../insert/call_log.php",
                    data: "query_id="+query_id+"&type=query",
                    beforeSend: function () {
                        $(".tab-9 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-9 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-9 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-9 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_call_log = true;
        } else if(e.id == "bnk_mapp") {
            var query_id = "<?php echo $qryyy_id; ?>";
             var city_id = "<?php echo $city_id; ?>";
            var loan_type = "<?php echo $loan_type;?>";
            if(loaded_bnk_mapp) return;
            if(query_id) {
                $.ajax({
                    type: "POST",
                    url: "../insert/bankers_mapping.php",
                    data: "city_id="+city_id+"&loan_type="+loan_type+"&query_id="+query_id+"&type=query",
                    beforeSend: function () {
                        $(".tab-10 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-10 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-10 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-10 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_bnk_mapp = true;
        } else if(e.id == "one_lead") {
            var query_id = "<?php echo $qryyy_id; ?>";
            if(loaded_one_lead) return;
            if(query_id) {
                $.ajax({
                    type: "POST",
                    url: "../insert/one_lead_history.php",
                    data: "query_id="+query_id+"&type=query",
                    beforeSend: function () {
                        $(".tab-11 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-11 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-11 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-11 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_one_lead = true;
        } else if(e.id == "page_summary") {
            var query_id = "<?php echo $qryyy_id; ?>";
            if(loaded_page_summary) return;
            if(query_id) {
                $.ajax({
                    type: "POST",
                    url: "../insert/page_submit_summary.php",
                    data: "query_id="+query_id,
                    beforeSend: function () {
                        $(".tab-12 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-12 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-12 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            } else {
                $(".tab-12 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
            }
            loaded_page_summary = true;
        } 
        // else if(e.id == "cross_sell") {
        //     var query_id = "<?php echo $qryyy_id; ?>";
        //     var tool_type = "<?php echo $tool_type; ?>";
        //     if(loaded_cross_sell) return;
        //     if(query_id && tool_type == "Cross Sell - Auto") {
        //         $.ajax({
        //             type: "POST",
        //             url: "../insert/cross_sell_details.php",
        //             data: "query_id="+query_id+"&type=query",
        //             beforeSend: function () {
        //                 $(".tab-13 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../../include/img/common-loader.gif" /></div>');
        //             },
        //             success: function(msg) {
        //                 if(msg.trim() == "") {
        //                     $(".tab-13 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //                 } else {
        //                     $(".tab-13 > .facts > .register > .table_set").html(msg);
        //                 }
        //             }
        //         });
        //     } else {
        //         $(".tab-13 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //     }

        //     loaded_cross_sell = true;
        // }
        else if(e.id == 'documents'){
            if(loaded_document) return;
                $.ajax({
                    type: "POST",
                    url: "../customer-document/edit.php?tab=1&cust_id=<?php echo base64_encode($cust_id) ?>",
                    beforeSend: function () {
                        $(".tab-14 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../assets/image/common-loader.gif" /></div>');
                    },
                    success: function(msg) {
                        if(msg.trim() == "") {
                            $(".tab-14 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
                        } else {
                            $(".tab-14 > .facts > .register > .table_set").html(msg);
                        }
                    }
                });
            loaded_document = true;
        } 
        // else if(e.id == 'getdailersms'){
        //     var query_id = "<?php echo $qryyy_id; ?>";
        //     // alert(query_id)
        //     if(loaded_getdailer) return;
        //         $.ajax({
        //             type: "POST",
        //             url: "../insert/getdailersms.php?level_id=1&lead_id="+query_id,
        //             beforeSend: function () {
        //                 $(".tab-15 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../../include/img/common-loader.gif" /></div>');
        //             },
        //             success: function(msg) {
        //                 if(msg.trim() == 0) {
        //                     $(".tab-15 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //                 } else {
        //                     $(".tab-15 > .facts > .register > .table_set").html(msg);
        //                 }
        //             }
        //         });
        //         loaded_getdailer = true;
        // } else if(e.id == 'pre_approved_offers'){
        //     var cust_id = "<?php echo $cust_id; ?>";
        //     var web_fmd_id = "<?php echo $web_fmd_id; ?>";
        //     var query_id = "<?php echo $qryyy_id; ?>";
        //     //if(loaded_pre_approved_offers) return;
        //     if(cust_id) {
        //         $.ajax({
        //             type: "POST",
        //             url: "../insert/pre-approved-offers.php",
        //             data: "cust_id="+cust_id+"&web_fmd_id="+web_fmd_id+"&query_id="+query_id,
        //             beforeSend: function () {
        //                 $(".tab-16 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../../include/img/common-loader.gif" /></div>');
        //             },
        //             success: function(msg) {
        //                 if(msg.trim() == "") {
        //                     $(".tab-16 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //                 } else {
        //                     $(".tab-16 > .facts > .register > .table_set").html(msg);
        //                 }
        //             }
        //         });
        //     } else {
        //         $(".tab-16 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //     }
        //     loaded_pre_approved_offers = true;
        // }else if(e.id == 'cust_whatsapp'){
        //     var cust_id = "<?php echo $cust_id; ?>";
        //     if(loaded_whatsapp_msg) return;
        //     if(cust_id) {
        //         $.ajax({
        //             type: "POST",
        //             url: "../whatsapp/edit.php?tabs=1&id="+btoa(cust_id),
        //             data: "cust_id="+cust_id,
        //             beforeSend: function () {
        //                 $(".tab-17 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../../include/img/common-loader.gif" /></div>');
        //             },
        //             success: function(msg) {
        //                 if(msg.trim() == "") {
        //                     $(".tab-17 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //                 } else {
        //                     $(".tab-17 > .facts > .register > .table_set").html(msg);
        //                 }
        //             }
        //         });
        //     } else {
        //         $(".tab-17 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //     }
        //     loaded_whatsapp_msg = true;
        // } else if(e.id == "missed_call_log") {
        //     var query_id = "<?php echo $qryyy_id; ?>";
        //     var cust_phone = "<?php echo $phone; ?>";
        //     if(loaded_missed_call) return;
        //     if(query_id) {
        //         $.ajax({
        //             type: "POST",
        //             url: "../insert/missed_call_log.php",
        //             data: "query_id="+query_id+"&type=query&cust_phone="+cust_phone,
        //             beforeSend: function () {
        //                 $(".tab-18 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../../include/img/common-loader.gif" /></div>');
        //             },
        //             success: function(msg) {
        //                 if(msg.trim() == "") {
        //                     $(".tab-18 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //                 } else {
        //                     $(".tab-18 > .facts > .register > .table_set").html(msg);
        //                 }
        //             }
        //         });
        //     } else {
        //         $(".tab-18 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //     }
        //     loaded_missed_call = true;
        // } else if(e.id == "dialer_sms") {
        //     var cust_phone = "<?php echo $phone; ?>";
        //     var query_id = "<?php echo $qryyy_id; ?>";
        //     if(loaded_dialer_sms) return;
        //     if(cust_phone) {
        //         $.ajax({
        //             type: "POST",
        //             url: "../insert/dialer-sms.php",
        //             data: "cust_phone="+cust_phone+"&query_id="+query_id,
        //             beforeSend: function () {
        //                 $(".tab-19 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../../include/img/common-loader.gif" /></div>');
        //             },
        //             success: function(msg) {
        //                 if(msg.trim() == "") {
        //                     $(".tab-19 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //                 } else {
        //                     $(".tab-19 > .facts > .register > .table_set").html(msg);
        //                 }
        //             }
        //         });
        //     } else {
        //         $(".tab-19 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //     }
        //     loaded_dialer_sms = true;
        // } else if(e.id == "nearest_pat") {
        //     var city_id = "<?php echo $city_id; ?>";
        //     if(loaded_nearest_pat) return;
        //     if(city_id) {
        //         $.ajax({
        //             type: "POST",
        //             url: "../insert/nearest-partner.php",
        //             data: "city_id="+city_id,
        //             beforeSend: function () {
        //                 $(".tab-20 > .facts > .register > .table_set").html('<div class="img">Please wait while we are fetching the details...</div><div class="img"><img style="width: 10%" src="../../include/img/common-loader.gif" /></div>');
        //             },
        //             success: function(msg) {
        //                 if(msg.trim() == "") {
        //                     $(".tab-20 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //                 } else {
        //                     $(".tab-20 > .facts > .register > .table_set").html(msg);
        //                 }
        //             }
        //         });
        //     } else {
        //         $(".tab-20 > .facts > .register > .table_set").html("<h3>No Data Found</h3>");
        //     }
        //     loaded_nearest_pat = true;
        // }
    
}
</script>
<br>
<div style="width: 90%; clear: both; margin: 0 auto;">
    <div class="main">
        <div class="sap_tabs" style="width: 100%">
            <div id="horizontal_details_tab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                <li class="resp-tab-item tab-view" aria-controls="details_tab_1" id="fup_his" role="tab">
                        <span>Follow Up</span>
                    </li>
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_2"  id="raw_details"  role="tab" onclick="callAjaxData(this)">
                        <span>Raw Details</span>
                    </li>
                        <!-- <li class="resp-tab-item lost tab-view" aria-controls="details_tab_3"  id="cases_tab" role="tab" onclick="callAjaxData(this)">
                            <span>Cases</span>
                        </li> -->
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_4"  id="app_tab"  role="tab" onclick="callAjaxData(this)">
                        <span>Application</span>
                    </li>
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_5"  id="other_details"  role="tab" onclick="callAjaxData(this)">
                        <span>Page Details</span>
                    </li>
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_6"  id="app_rq_rs"  role="tab" onclick="callAjaxData(this)">
                        <span>API Response</span>
                    </li>
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_7"  id="lead_alloc"  role="tab" onclick="callAjaxData(this)">
                        <span>Allocation</span>
                    </li>
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_8"  id="show_number"  role="tab" onclick="callAjaxData(this)">
                        <span>Show Number</span>
                    </li>
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_9"  id="call_log"  role="tab" onclick="callAjaxData(this)">
                        <span>Call Log</span>
                    </li>

                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_10"  id="bnk_mapp"  role="tab" onclick="callAjaxData(this)">
                        <span>Banker</span>
                    </li>
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_11"  id="one_lead"  role="tab" onclick="callAjaxData(this)">
                        <span>Lead Display</span>
                    </li>
                    <li class="resp-tab-item lost tab-view" aria-controls="details_tab_12"  id="page_summary"  role="tab" onclick="callAjaxData(this)">
                        <span>Summary</span>
                    </li>
                    <!-- <li class="resp-tab-item lost tab-view" aria-controls="details_tab_13"  id="cross_sell"  role="tab" onclick="callAjaxData(this)">
                        <span>Cross Sell</span>
                    </li> -->
                     <li class="resp-tab-item lost tab-view" aria-controls="details_tab_14"  id="documents"  role="tab" onclick="callAjaxData(this)">
                        <span>Documents</span>
                    </li>
                    <!-- <li class="resp-tab-item lost tab-view" aria-controls="details_tab_15"  id="getdailersms"  role="tab" onclick="callAjaxData(this)">
                        <span>Dialer SMS</span>
                    </li> -->
                        <!-- <li class="resp-tab-item lost tab-view" aria-controls="details_tab_16"  id="pre_approved_offers" role="tab" onclick="callAjaxData(this)">
                            <span>PA-PQ Offers</span>
                        </li> -->
                        <!-- <li class="resp-tab-item lost tab-view" aria-controls="details_tab_17"  id="cust_whatsapp" role="tab" onclick="callAjaxData(this)">
                            <span>Whatsapp</span>
                        </li>
                        <li class="resp-tab-item lost tab-view" aria-controls="details_tab_18"  id="missed_call_log" role="tab" onclick="callAjaxData(this)">
                            <span>Other Calls</span>
                        </li>
                        <li class="resp-tab-item lost tab-view" aria-controls="details_tab_19"  id="dialer_sms" role="tab" onclick="callAjaxData(this)">
                            <span>Dialer SMS</span>
                        </li> -->
                        <li class="resp-tab-item lost tab-view" aria-controls="details_tab_20"  id="nearest_pat" role="tab" onclick="callAjaxData(this)">
                            <span>Nearest Pat.</span>
                        </li>
                    <div class="clear"></div>
                </ul>
                <div class="resp-tabs-container">
                <div class="tab-1 resp-tab-content" aria-labelledby="details_tab_1">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">
                                    <?php
                                        if(in_array($user,$user_new_status) || in_array($loan_type,$loan_type_new_status)){
                                            include("query-follow-up.php");
                                        }else{
                                            include("query_followup_history.php");
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="tab-2 resp-tab-content" aria-labelledby="details_tab_2">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-3 resp-tab-content" aria-labelledby="details_tab_3">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="tab-4 resp-tab-content" aria-labelledby="details_tab_4">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-5 resp-tab-content" aria-labelledby="details_tab_5">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-6 resp-tab-content" aria-labelledby="details_tab_6">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-7 resp-tab-content" aria-labelledby="details_tab_7">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-8 resp-tab-content" aria-labelledby="details_tab_8">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-9 resp-tab-content" aria-labelledby="details_tab_9">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-10 resp-tab-content" aria-labelledby="details_tab_10">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-11 resp-tab-content" aria-labelledby="details_tab_11">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-12 resp-tab-content" aria-labelledby="details_tab_12">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-13 resp-tab-content" aria-labelledby="details_tab_13">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="tab-14 resp-tab-content" aria-labelledby="details_tab_14">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-15 resp-tab-content" aria-labelledby="details_tab_15">
                        <div class="facts">
                            <div class="register">
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div> -->
                     <!-- <div class="tab-16 resp-tab-content" aria-labelledby="details_tab_16">
                        <div class="facts">
                            <div class="register">
                            
                                <?php //$fetch_axis_offers_api_data =  base64_encode(json_encode(array('mobile'=>base64_encode($mobile),'dob'=>base64_encode($dob),'loan_nature'=>base64_encode($loan_nature),'web_fmd_id'=>base64_encode($web_fmd_id),'main_account'=>base64_encode($main_account),'qry_id'=>base64_encode($qryyy_id),'saving_accounts_with'=>base64_encode($result_cust_data['saving_accounts_with']))));?>
                                <input type="button" value="Fetch Axis PL Offers" name='fetch_axis_pl_offers' id='fetch_axis_pl_offers' onclick='callAxisPLOffersApi("<?php // echo $fetch_axis_offers_api_data; ?>");'>

                                <?php //$fetch_offers_api_data =  base64_encode(json_encode(array('cust_id'=>base64_encode($cust_id),'lead_id'=>base64_encode($query_id),'level_type'=>base64_encode('1'),'source'=>base64_encode('2'),'mobile_no'=>base64_encode($mobile),'loan_type_id'=>base64_encode($loan_type))));?>
                                        <input type="button" value="Fetch Offers" name='fetch_offers' id='fetch_offers' onclick='callOffersApi("<?php //echo $fetch_offers_api_data; ?>");'>
                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="tab-17 resp-tab-content" aria-labelledby="details_tab_17">
                       <div class="facts">
                           <div class="register">

                               <div class="table_set">

                               </div>
                           </div>
                       </div>
                   </div>
                    <div class="tab-18 resp-tab-content" aria-labelledby="details_tab_18">
                        <div class="facts">
                            <div class="register">

                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="tab-19 resp-tab-content" aria-labelledby="details_tab_19">
                        <div class="facts">
                            <div class="register">

                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="tab-20 resp-tab-content" aria-labelledby="details_tab_20">
                        <div class="facts">
                            <div class="register">

                                <div class="table_set">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear:both; padding:2%;"></div>
</div>
<?php if($notepadflag==1){

?>

<div class="header">
<div class="container">
 <!-- Navigation Menu Start -->
 <div class="navigation">
   <div class="row">
     <!-- Navigation Menu Link Lists -->
     <div class="col-sm-12 col-xs-12 main-bx">
       <div class="botm-menu">
         <span class="br-lblue notepad-heading">Notepad </span>
         <div class="menu-list">
           <div class="content-part">
               <div id="lastfive" class="content-colm">
              </div>
           <div class="icons-center"><hr></div>
             <div class="text-section">This is your own personal note taking machine</div>
           </div>

           <div id="body2" class="fom-body">


               <div class="fields-botm">
                   <input type=text name=noteremarks id=noteremarks placeholder="Add your Remarks"><br>
                   <input type=hidden name=notelevel_id id=notelevel_id value="<?php echo $qryyy_id ;?>" readonly><br>
                   <input type=hidden name=noteuser id=noteuser value="<?php echo $user; ?>">
                   <input type=hidden name=notelevel_type1 id=notelevel_type1 value="1">
                   <button name='addnote'  id='addnote'  value='add note'>Add note</button>

              </div>

             </div>
         </div>
       </div>
     </div>


   </div>
 </div>
</div>
</div>
<div class="menu-btn">
<a  href="#"><i class="fa fa-file-text-o"></i></a>
</div>
<?php } ?>
</body>
</html>
<?php
}
include("../include/footer_close.php"); ?>
<script src="../assets/js/notepad.js"></script>
<script>
    function occup_sal(value_get) {
        var pre_fetched_occup = '<?php echo $occup;?>';
        if (value_get != undefined && value_get != '') {
            $('#occupation_id').val(value_get);
        } else {
            $('#occupation_id').val(pre_fetched_occup);
        }

        var val_loan = $("#loan_type option:selected").val();
        if ($('#occupation_id option:selected').val() == 3) {
            $(".sal").hide();
            $(".senp_cc").show();
            $(".senp_itr").removeClass("hidden");
            $(".cc_sepb").hide();
            if (val_loan == 71) {
                $(".senp").hide();
                $(".cc_sepb").show();
                $(".senp_itr").show();
            } else {
                $(".cc_sepb").hide();
                $(".senp").show();
            }
            if(val_loan == 57) {
                $(".bl-fields").removeClass("hidden");
            } else {
                $(".bl-fields").addClass("hidden");
            }
            $(".dl-sep-sal").addClass("hidden");
        } else if ($('#occupation_id option:selected').val() == 2) {
            $(".sal").hide();
            $(".senp_cc").show();
            $(".senp_itr").removeClass("hidden");
            $(".senp").hide();
            $(".cc_sepb").hide();
            if (val_loan == 71) {
                $(".cc_sepb").show();
                $(".senp_itr").show();
            } else {
                $(".cc_sepb").hide();
            }
            $(".bl-fields").addClass("hidden");
            if(val_loan == 11) {
                $(".dl-sep-sal").removeClass("hidden");
                $("#wih-label").html("Work in Hospital");
            } else {
                $(".dl-sep-sal").addClass("hidden");
            }
        } else {
            if (val_loan != 60) {
                $(".sal").show();
            }
            if (val_loan == 71) {
                $(".senp_itr").hide();
            }
            $(".cc_sepb").hide();
            $(".senp").hide();
            $(".senp_cc").hide();
            $(".bl-fields").addClass("hidden");
            if(val_loan == 11) {
                $(".dl-sep-sal").removeClass("hidden");
                $("#wih-label").html("Work in Pvt. Clinic");
            } else {
                $(".dl-sep-sal").addClass("hidden");
            }
        }
    }

    // function sub_emp_type() {
    //     if ($("#employer_name").val() != '56473' && $("#employer_name").val() != '1') {
    //         $.ajax({
    //             data: "emp_type=" + $("#employer_name").val() + "&sub_emp=<?php echo $sub_employer_type; ?>",
    //             type: "POST",
    //             url: "<?php echo $head_url;?>/include/sub_emp_type.php",
    //             success: function (data) {
    //                 $("#sub_emp_val").html(data);
    //                 $("#sub_employer").val("");
    //                 $(".sub_emp_ty").removeClass("hidden");
    //             }
    //         })
    //     } else {
    //         $("#sub_employer").val("");
    //         $(".sub_emp_ty").addClass("hidden");
    //     }
    // }

    // sub_emp_type();
    occup_sal(<?php echo $occup;?>);

    function loan_select() {
        $("#ln_type_pop").css("display", "block");
    }

    function show_hide(class_name) {
        var maxLength = 100;
        $(class_name).each(function() {
            var myStr = $(this).text();
            if($.trim(myStr).length > maxLength) {
                var newStr = myStr.substring(0, maxLength);
                var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                $(this).empty().html(newStr);
                $(this).append(' <a href="javascript:void(0);" class="read-more"> Read more... </a>');
                $(this).append('<span class="more-text hidden">' + removedStr + '<a href="javascript:void(0);" class="read-less"> Read less... </a> </span>');
            }
        });

        $(".read-more").click(function() {
            $(this).siblings(".more-text").removeClass("hidden");
            $(this).addClass("hidden");
        });

        $(".read-less").click(function() {
            $(this).parent().addClass("hidden");
            $(this).parent().prev().removeClass("hidden");
        });
    }

    function toCrossSell() {
        $("#cross_sell").trigger("click");
        $(".tab-14")[0].scrollIntoView();
    }
    function callOffersApi(data){
        if(data != ''){
            $.ajax({
                    type: "POST",
                    url: "../insert/fetch-pre-approved-offers.php",
                    data: 'req_val='+data,
                    success: function(msg) {
                        $("#pre_approved_offers").trigger('click');
                    }
        });
    }
}

function callAxisPLOffersApi(data) {
    if(data != ''){
        $.ajax({
            type: "POST",
            url: "../insert/fetch-pre-approved-offers-axis-pl.php",
            data: 'req_val='+data,
            success: function(msg) {
                console.log(msg);
                $("#pre_approved_offers").trigger('click');
            }
        });
    }
}
function trig_pre_approve() {
    $("#pre_approved_offers").trigger("click");
}
    function check_comp_name(data){
        $(".gvt_cat").remove();
        if(data != ''){
            $.ajax({
                    type: "GET",
                    url: "<?php echo $head_url;?>/include/company-fuzzy-logic.php?govt_cat_state_id=<?php echo $govt_cat_state_id; ?>&type=select&comp_name="+data.toUpperCase()+"&comp_category=<?php echo $comp_category; ?>&sub_comp_category=<?php echo $sub_comp_category; ?>&sub_sub_comp_category=<?php echo $sub_sub_comp_category; ?>",
                    success: function(fuzzy_data) {
                        if($.trim(fuzzy_data) != ''){
                             $($.trim(fuzzy_data)).insertAfter(".company_name_input");
                        }else{
                            $(".gvt_cat").remove();
                        }
                        
                    }
        });
    }
}
check_comp_name("<?php echo $comp_name; ?>");
function change_secd_comp_name(val){
    if(val != '' && val != 0){
        $("#comp_name").val(val);
        $(".gvt_cat").remove();
    }
}
</script>
