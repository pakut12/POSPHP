<?php
include "../config.php";
require "../Service/companyservice.php";


$type = $_POST["type"];
if ($type == "addcompany") {
    $company = $_POST["company"];
    $key = new companyservice();
    $a = $key->addcompany($company);
    echo json_encode($a);
} else if ($type == "getcompany") {
    $key = new companyservice();
    $a = $key->getcompany();
    $arr = [];
    foreach ($a as $row) {
        array_push($arr, [$row->getCompanyid(), $row->getCompanyName()]);
    }
    echo json_encode($arr);
} else if ($type == "delcompany") {
    $id = $_POST["company_id"];
    $key = new companyservice();
    $a = $key->delcompany($id);

    echo json_encode($a);
} else if ($type == "getcompanybyid") {
    $id = $_POST["company_id"];
    $key = new companyservice();
    $a = $key->getcompanybyid($id);
    foreach ($a as $row) {
        $arr[] = [$row->getCompanyid(), $row->getCompanyName()];
    }
    echo json_encode($arr);
} else if ($type == "updatecompany") {
    $id = $_POST["company_id"];
    $company = $_POST["company_name"];
    $key = new companyservice();
    $a = $key->updatecompany($id, $company);
    echo json_encode($a);
} else if ($type == "gettablecompany") {
    $key = new companyservice();
    $a = $key->getcompany();
    $html = "";
    $html .= '<table class="table text-nowrap text-center" id="table_company">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>No</th>';
    $html .= '<th>CompanyID</th>';
    $html .= '<th>CompanyName</th>';
    $html .= '<th>Edit</th>';
    $html .= '<th>Del</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody id="data_company">';
    foreach ($a as $key => $company) {
        $html .= '<tr>';
        $html .= '<td>' . ($key + 1)  . '</td>';
        $html .= '<td>' . $company->getCompanyid() . '</td>';
        $html .= '<td>' . $company->getCompanyName() . '</td>';
        $html .= '<td><button type="button" onclick="editcompany(' . $company->getCompanyid() . ');" class="btn btn-warning btn-sm">เเก้ไข</button></td>';
        $html .= '<td><button type="button" onclick="delcompany(' . $company->getCompanyid() . ');" class="btn btn-danger btn-sm">ลบ</button></td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    echo $html;
}
