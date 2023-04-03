<?php

    require('../auth/session.php');

    $id = $_REQUEST['id'];
?>

<html>
<head>
    <meta charset="utf-8">
    <meta lang="pt-BR">
    <title> Calendário Dinâmico com PHP + FullCalendar </title>
    
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <script src='fullcalendar/lib/jquery.min.js'></script>
    <script src='fullcalendar/lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    
    <!-- script de tradução -->
    <script src='fullcalendar/lang/en-ca.js'></script>
        
    <script>

        function getCurrentDate() {
            const date = new Date();
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            
            return `${year}-${month}-${day}`;
        }


       $(document).ready(function() {	
           	
            //CARREGA CALENDÁRIO E EVENTOS DO BANCO
            $('#calendario').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: getCurrentDate(),
                editable: true,
                eventLimit: true, 
                events: 'eventos.php',           
                eventColor: '#dd6777'
            });	
            
            //CADASTRA NOVO EVENTO
            $('#novo_evento').submit(function(){
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var dados = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "cadastrarEvento.php?id=<?= $id?>",
                    data: dados,
                    success: function(data)
                    {   
                        if(data == "1"){
                            alert("Successfully registered! ");
                            //atualiza a página!
                            location.reload();
                        }else{
                            alert("There was some problem! ");
                        }
                    }
                });                
                return false;
            });	
	   }); 
                
    </script>
    
    <style>
        #calendario{
            position: relative;
            width: 70%;
            margin: 0px auto;
        }        
    </style>
    
</head>
<body>    
    <a href="../auth/restricted.php">Voltar</a>
    <div id='calendario'>
        <br/>
        <form id="novo_evento" action="" method="post">
            Name event: <input type="text" name="nome" required/><br/><br/>  
            Date event: <input type="datetime-local" name="data" required/><br/><br/>       
            <button type="submit"> Create new event </button>
        </form>
    </div>
</body>
</html>
