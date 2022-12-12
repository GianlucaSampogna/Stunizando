<!-- foi criado porque nem todas as páginas (CADASTRO) tem o footer incluso (portanto não dária para adicionar isso em todas as páginas) -->
<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<!-- Add jQuery library (required) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

<!-- Add the evo-calendar.js for.. obviously, functionality! -->
<script src="js/fullcalendar/lib/evo-calendar.js"></script>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/fullcalendar/lib/main.js"></script>




<script>

    $(document).ready(function() {
        const eventos = document.querySelector("#evento");
        console.log(alunos);

        let alunos = JSON.parse(eventos.value);
        console.log(alunos);
        let calendarEvents = [];

        for (let aluno of alunos) {
            let {
                id_evento,
                name,
                dia_da_atividade,
                type,
                description
            } = aluno;


            console.log({
                id_evento,
                name,
                dia_da_atividade,
                type,
                description
            });


            let evento = {
                "id": id_evento,
                "name": name,
                "type": type,
                "description": description,
                "date": dia_da_atividade,
                "color": "#a518ba"
            }

            calendarEvents.push(evento);



        }

        // inicializando calendário
        $('#calendar').evoCalendar({
            'language': 'pt',
            'format': "yyyy-mm-dd",
            'todayHighlight': true,
            'sidebarDisplayDefault': false,
            'calendarEvents': calendarEvents
        })
        
        // $("#calendar").evoCalendar('addCalendarEvent', [
        //     {
        //     id: '09nk7Ts',
        //     name: "My Birthday",
        //     date: "February/15/2020",
        //     type: "birthday",
        //     everyYear: true
        //     }
        // ]);
    });
        

</script>

</body>


</html>