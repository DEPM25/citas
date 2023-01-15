document.addEventListener('DOMContentLoaded', function() {
    let formulario = document.querySelector('#form_citas');
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'local',
        initialView: 'dayGridMonth',
        locale:"es",
        headerToolbar: {
          center: 'dayGridMonth,timeGridWeek,listWeek'
        },

        validRange: function(nowDate){
          return {
            start: nowDate,
          }
        },

        events:baseURL+"/citas/mostrar",
    //   eventSources:{
    //     url:baseURL+"/citas/mostrar",
    //     method:"POST",
    //     extraParams: {
    //         _token:formulario._token.value
    //     }
    //   },

        dateClick: function(info){
            var events = calendar.getEvents();
            var date = info.dateStr;
            var disable = false;
            events.forEach(function(event) {
                if (event.startStr.split('T')[0] === date) {
                    disable = true;
                }
            });
            if (disable) {
                alert("No se puede insertar un evento en este día");
            }else{
                formulario.reset();
                formulario.start.value=info.dateStr;
                formulario.end.value=info.dateStr;
    
                $('#formulario').modal("show");
            }
            
        },
        eventClick: function (info){
            var actualHora = new Date();
            var finHora = new Date(info.event.start);
            var diferenciaHora = (finHora - actualHora) / 1000 / 60;
            if (diferenciaHora <= 120) {
                document.getElementById('btnUpdate').disabled = true;
                document.getElementById('btnDelete').disabled = true;
            } else {
                document.getElementById('btnUpdate').disabled = false;
                document.getElementById('btnDelete').disabled = false;
            }

            axios.post(baseURL+"/citas/editar/"+info.event.id)
            .then(
                (response) => {
                    formulario.id.value = response.data.id;
                    formulario.documento.value = response.data.documento;
                    formulario.nombre.value = response.data.nombre;
                    formulario.apellido.value = response.data.apellido;
                    formulario.mascota.value = response.data.mascota;
                    formulario.start.value = response.data.start;
                    formulario.end.value = response.data.end;
                    formulario.hora.value = response.data.hora;

                    $('#formulario').modal("show");
                    document.getElementById('btnSave').disabled = true;
                }
            )
        }
    });

    calendar.render();

    document.getElementById('btnSave').addEventListener("click", function (){
        enviarDatos("/citas/guardar")
    });

    document.getElementById('btnDelete').addEventListener("click", function (){
        enviarDatos("/citas/borrar/"+formulario.id.value);
    });

    document.getElementById('btnUpdate').addEventListener("click", function (){
        enviarDatos("/citas/actualizar/"+formulario.id.value);
      });

    function enviarDatos(url){
        const datos = new FormData(formulario);

        const nuevaURL = baseURL+url

        axios.post(nuevaURL, datos)
        .then(
          (response) => {
            calendar.refetchEvents();
            $("#formulario").modal("hide");

        }
        ).catch(
          error => {
            if (error.response) {
              console.log(error.response.data)
            }
          }
        )
    }
  });