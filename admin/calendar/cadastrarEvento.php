<?php 

        require('../auth/session.php');

        include "conexao.php";

        $id = $_REQUEST['id'];
                            
        $nome = $_POST["nome"];
        $data = $_POST["data"];
        
        $query = "INSERT INTO `calendar` (`title`, `date`, `user_id`) VALUES ('$nome', '$data', $id)";
        
        $exec = $conexao->exec($query);                         
        
        if($exec){            
            echo "1";     
        }
        else{
            echo "0";
        }
       
        
?>