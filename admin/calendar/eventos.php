<?php
    
    require('../auth/session.php');

    //Conectando ao banco de dados
    include "conexao.php";
    
    $consulta = $conexao->query("SELECT c.id, c.title, c.date, u.user FROM calendar AS c INNER JOIN users AS u ON u.id = c.user_id;"); 

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        //echo "Nome: {$linha['nome']} - E-mail: {$linha['email']}<br />";
        $vetor[] = $linha;
     }

    //Passando vetor em forma de json
    echo json_encode($vetor);
    
?>
