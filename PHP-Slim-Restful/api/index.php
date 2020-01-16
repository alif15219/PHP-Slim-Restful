<?php
require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$status = 0;
//เพิ่มฟังชันเมื่อรต้องเติมทุกครัง
$app->post('/register_by_idcard','register_by_idcard'); 
$app->run();

/************************* register_by_idcard *************************************/
    function register_by_idcard() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());


try {
             
        $db = getDB();
        $strSQL = "SELECT * FROM mem_h_member"; 
        $objParse = oci_parse($db, $strSQL);
        oci_bind_by_name($objParse, ':id_card', $data->id_card);
        oci_execute ($objParse,OCI_DEFAULT);
        $objResult = oci_fetch_array($objParse,OCI_BOTH);


        if($data == ':id_card' && ':status_id' == '01' || ':status_id' == '04'){
            $status = 1;
            $MEM_ID=$data->MEM_ID;
            $BR_NO=$data->BR_NO;
            $MEET_YEAR=$data->MEET_YEAR;
            
            // try {
        
                $db = getDB();
                $sql = 'INSERT INTO MEM_MEETING_REGISTER(MEM_ID,BR_NO,GD_DATE,MEET_YEAR) '.
                        'VALUES(:MEM_ID, :BR_NO, current_timestamp, :MEET_YEAR)';
        
                $compiled = oci_parse($db, $sql);
                oci_bind_by_name($compiled, ':MEM_ID', $MEM_ID);
                oci_bind_by_name($compiled, ':BR_NO', $BR_NO);
                oci_bind_by_name($compiled, ':MEET_YEAR', $MEET_YEAR);
                oci_execute($compiled);

            //    }
        
  
        }      
         // break;
         if($status == 0){
            $uData = json_encode($uData);
            echo '{"ยังไม่เป็นสมาชิก ไม่สามารถลงทะเบียนได้"}';    
         }   
        
    }
    catch(PDOException $e) {
        echo '{"error222":{"text":'. $e->getMessage() .'}}';
                }
}

?>