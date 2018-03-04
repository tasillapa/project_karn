<?php

session_start();
$output = '';
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "get_order_id":get_order_id();
            break;
        case "get_p_name":get_p_name();
            break;
    }
}

function get_order_id() {
    include('../service/connect_db.php');
    if ($_POST['v_order_id'] == '') {
        $output .= "<option value=''>เลือก</option>";
        echo $output;
        exit();
    } else {
        $sql = "SELECT v_order_id FROM vendor_order AS vo LEFT JOIN vendor AS vd ON vo.v_id = vd.v_id WHERE vo.v_id = '" . $_POST['v_order_id'] . "'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<option value='{$row['v_order_id']}'>{$row['v_order_id']}</option>";
        }
        echo $output;
    }
}

function get_p_name() {
    include('../service/connect_db.php');
    if ($_POST['v_order_id'] == '') {
        $output .= '<option value=""]>เลือกสินค้า</option>';
        echo $output;
    } else {
        $sql = "SELECT * FROM vendor_detail_order WHERE v_order_id='" . $_POST['v_order_id'] . "' ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<option value="' . $row["v_order_id"] . '">' . $row["p_name"] . '</option>';
        }
        echo $output;
    }
}

?>