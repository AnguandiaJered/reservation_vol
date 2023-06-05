<?php

include '../../config/database.php';
try{
$sql = 'SELECT * FROM vagent';           

            $stmt = $db->prepare($sql);
            $stmt->execute();
           
            $data = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {          
                 $data[] = $row;  
            } 

           $response         = [];
           $response['data'] =  $data;

           echo json_encode($response, JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            echo 'Database error. ' . $e->getMessage();
        }

?>