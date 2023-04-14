<?php

    require('../auth/session.php');

    $id = $_REQUEST['id'];
?>

<html>
<head>
    <meta charset="utf-8">
    <meta lang="pt-BR">
    <title>English Portal - Admin Area</title>
    
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <script src='fullcalendar/lib/jquery.min.js'></script>
    <script src='fullcalendar/lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../restricted/vendors/feather/feather.css">
    <link rel="stylesheet" href="../restricted/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../restricted/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../restricted/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../../images/favicon.ico" />
    
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
                theme: false,
                eventClick: function(event) {
                    window.open('https://us02web.zoom.us/j/4131437747?pwd=L0JtMkdvdVEyd3IvYzVwUG40aFRmUT09#success', 'page_open', 'width=700,height=600');
                },
                buttonIcons: true,
				weekNumbers: false,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: getCurrentDate(),
                editable: true,
                eventLimit: true, 
                events: 'events.php',           
                eventColor: '#c60b1e'
            });	
            
            //CADASTRA NOVO EVENTO
            $('#novo_evento').submit(function(){
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var datas = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "registerEvent.php?id=<?= $id?>",
                    data: datas,
                    success: function(date)
                    {   
                        if(date == "1"){
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
    <a href="../restricted">Voltar</a>
    <div id='calendario'>
        <br/>
        <form id="novo_evento" action="" method="post">
            Name event: <input type="text" name="name" required/><br/><br/>  
            Date event: <input type="datetime-local" name="date" required/><br/><br/>       
            <button type="submit"> Create new event </button>
        </form>
    </div>
</body>
</html>
