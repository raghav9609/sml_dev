<?php
require_once(dirname(__FILE__) . '/../config/session.php');
require_once(dirname(__FILE__) . '/../helpers/common-helper.php');
require_once(dirname(__FILE__) . '/../include/header.php');
require_once(dirname(__FILE__) . '/../include/helper.functions.php');
require_once(dirname(__FILE__) . '/../model/partnerDetailsModel.php');

$filter_data = [];
if($_REQUEST['partner'] > 0){
    $filter_data['partner_id'] = $_REQUEST['partner']; 
}
if($_REQUEST['city'] > 0){
    $filter_data['partner_id'] = $_REQUEST['city']; 
}
if($_REQUEST['agent_type'] > 0){
    $filter_data['partner_id'] = $_REQUEST['agent_type']; 
}
if($_REQUEST['sm_name']!= ""){
    $filter_data['sm_name'] = $_REQUEST['sm_name']; 
}
if($_REQUEST['sm_email_id'] !=""){
    $filter_data['sm_email_id'] = $_REQUEST['sm_email_id']; 
}
if($_REQUEST['phoneno'] > 0){
    $filter_data['phoneno'] = $_REQUEST['phoneno']; 
}
$data_to_display = $db_handle->runQuery($partnerDetailsExport->searchFilter($filter_data));
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../assets/css/style-assignment.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    <style>
        .new_textbox {
            background: #E6E6E6 none repeat scroll 0% 0%;
            color: #000;
        }

        .onoffswitch-inner:before {
            content: "Ist" !important;
        }

        .onoffswitch-inner:after {
            content: "IInd" !important;
        }
    </style>

</head>
<body>
<div style="width:100%;">
    <fieldset style='width:90%;margin-left:5%;'>
        <legend style='color:#2E2EAB;font-weight: bold;'>Search Filter</legend>
    <form>
        <?php echo get_dropdown(10, 'partner', '', '');
        echo get_dropdown('city', 'city', '', '');
        ?>
        <select name="agent_type" id = "agent_type">
            <option value="0">Select Agent Type</option>
            <option value="1">RM</option>
            <option value="2">SM</option>
        </select>
        <input type='text' name="sm_name" placeholder= "RM/ SM Name" maxlength="100">
        <input type='text' name="sm_email_id" placeholder= "RM/ SM Email ID" maxlength="100">
        <input type='text' name="phoneno" placeholder= "RM/ SM Phone No" maxlength="10">
        <input class="cursor" type='submit' value='Search' name='search_btn'>
        <a href="<?php echo $head_url; ?>/partner-details/"><input class="cursor" type='button' value='Clear'></a>
        <a href="<?php echo $head_url; ?>/partner-details/add-partner.php"><input class="cursor" type="button" value="Add"></a>
    </form>
        
    </fieldset>
</div>
<div style="margin:0 auto; width:90%; padding:10px; background-color:#fff; height:800px;">
        <form action="" method="POST">
            <table class="gridtable" width="95%;">
                <tr>
                    <th colspan="10"><input type="submit" name="update" class="buttonsub ml10 cursor" value="Update"/></th>
                </tr>
                <tr>
                    <th><input type="checkbox" name="selectAll[]" id="selectAll" onchange="selectallDisabled(this);">Select All</th>
                    <th>Partner Name<br> City Name</th>
                    <th>Agent Name  <br> Agent Type</th>
                    <th>Agent Contact No <br> Status</th>
                    <th>Agent Email ID<br> Status</th>
                </tr>
                <?php
                    foreach($data_to_display as $key=>$value){
                        $id = $value['id'];
                        $partner_id = $value['partner_id'];
                        $city_id = $value['city_id'];
                        $name = $value['name'];
                        $email_id = $value['email_id'];
                        $mobile_no = $value['mobile_no'];
                        $is_email_flag_active = $value['is_email_flag_active'];
                        $is_sms_flag_active = $value['is_sms_flag_active'];
                        $agent_type = $value['agent_type'];
                        ?>
                <tr>
                <td><input type="checkbox" name="ch_edit[]" value="<?php echo $id; ?>" id="<?php echo $id; ?>" class ="all allchecked" onchange="disbaledFields(this);"/>
                </td>
                <td >
                <?php
                if($partner_id > 0){
                    $partner_namefetch  = get_name($master_code_id,$partner_id);
                    $partner_name = $partner_namefetch['value'];
                }
                if($city_id > 0){
                    $city_namefetch  = get_name('city_id',$city_id);
                    $city_name = $city_namefetch['city_name'];
                }
                echo $partner_name. "<br><span class='orange'>" .$city_name."</span><br>"; ?>
                </td>
                    <td>
                    <?php echo $agent_type == 2 ? "SM":"RM"; ?>
                        <input name="name_<?php echo $id; ?>" value="<?php echo $name; ?>" class="<?php echo $id; ?>_chng all" disabled="" type="text" maxlength="50"/>
                        
                    </td>
                    <td>
                        <input name="mobile_no_<?php echo $id; ?>" value="<?php echo $mobile_no; ?>" class="<?php echo $id; ?>_chng all" disabled="" type="text" maxlength="10"/>
                        <input type="checkbox" name="sms_flag<?php echo $id; ?>" value="1" <?php if($is_sms_flag_active == 1){echo "checked";} ?> class="<?php echo $id; ?>_chng all" disabled=""/>
                    </td>
                    <td>
                        <input name="email_id_<?php echo $id; ?>" value="<?php echo $email_id; ?>" class="<?php echo $id; ?>_chng all" disabled="" type="text" maxlength="100"/>
                        <input type="checkbox" name="email_flag<?php echo $id; ?>" <?php if($is_email_flag_active == 1){echo "checked";} ?> value="1" class="<?php echo $id; ?>_chng all" disabled=""/>
                    </td>
                </tr>
                    <?php } ?>
            </table>
        </form>
    </div>
</body>
</html>
<script src="<?php echo $head_url; ?>/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo $head_url; ?>/assets/js/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<script>
    function disbaledFields(e){
        if(e.checked){
            $("."+e.id+"_chng").removeAttr("disabled");
            
        }else{
            $("."+e.id+"_chng").attr('disabled', 'disabled');
            $("#selectAll").prop("checked",false);
        }
    }
    function selectallDisabled(e){
        if(e.checked){
            $(".all").removeAttr("disabled");
            $(".allchecked").prop("checked",true);
        }else{
            $(".all").attr('disabled', 'disabled');
            $(".allchecked").removeAttr('disabled').prop("checked",false);
        }
    }
</script>
<?php
if (isset($_REQUEST["update"])) {
    $chech_id = replace_special($_REQUEST['ch_edit']);
    foreach($chech_id as $key=>$value){
        $name = $_REQUEST['name_'.$value];
        $mobile_no = $_REQUEST['mobile_no_'.$value];
        $sms_flag = $_REQUEST['sms_flag'.$value];
        $email_id = $_REQUEST['email_id_'.$value];
        $email_flag = $_REQUEST['email_flag'.$value];
        mysqli_query($Conn1,"update crm_partner_rm_sm_details set name ='".$name."',email_id ='".$email_id."',mobile_no ='".$mobile_no."',is_email_flag_active ='".$email_flag."',is_sms_flag_active ='".$sms_flag."' where id = '".$value."'");       
    } 
    ?>
    <script>
       swal("Data Updated Successfully!");
       window.location.href = "<?php echo $head_url; ?>/partner-details/";  
    </script>
<?php } ?>