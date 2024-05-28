<?php
include 'C:\xamppp\htdocs\DOAN_WEBSITE\database\database.php';

class YeuCauClass{
    public $Database;
    public function __construct(){
        $this->Database = new Database;
    }

    //hàm show tất cả yêu cầu
    public function selectAll(){
        $sql = "SELECT * FROM yeucau";
        $result = $this->Database->selectAll_YC($sql);
        return $result;
    }
}
?>