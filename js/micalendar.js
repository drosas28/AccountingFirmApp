function calendar(id) {
  document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    let calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: "2023-04-01",
      selectable: true,
      initialView: "dayGridMonth",
      height: "auto",
      navLinks: true,
      editable: true,
      slotMinTime: "09:00:00", //Hora de
      slotMaxTime: "20:00:00",
      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek", //,listMonth
      },
      views: {
        dayGridMonth: {
          titleFormat: {
            year: "numeric",
            month: "long",
          },
        },
        timeGridWeek: {
          hiddenDays: [0],
        },
        timeGridDay: {
          hiddenDays: [0],
        },
      },
      slotLabelFormat: {
        hour: "numeric",
        minute: "2-digit",
        meridiem: false,
        hour12: true,
      },
      eventTimeFormat: {
        hour: "2-digit",
        minute: "2-digit",
        meridiem: false,
        hour12: true,
      },
      events: {
        url:
          "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=8&id=" + id,
      },
      dateClick: function (info) {
        /* Para Agendar cita*/
        const { fecha, hora } = separar_fechas(info.dateStr);
        $("#fecha_inicio").val(fecha);
        $("#fecha_fin").val(fecha);
        $("#hora_inicio").val(hora);
        $("#agendaModal").modal("show");
      },
    });
    calendar.setOption("locale", "es"); //calendario en español
    calendar.render();
  });
}

function separar_fechas(dateStr) {
  let fecha = "",
    hora = "";
  if (dateStr.length > 10) {
    fecha = dateStr.split("", 10).join("");
    hora = dateStr.split("").slice(11, 19).join("");
    return { fecha, hora };
  } else {
    fecha = dateStr;
    hora = "09:00";
    return { fecha, hora };
  }
}

function juntar_fechas(fecha, hora) {
  //2023-02-23 15:00:00
  let final = `${fecha} ${hora}`;
  return final;
}

function limpiarModal() {
  $("#txtTitulo").val("");
  $("#fecha_inicio").val("");
  $("#hora_inicio").val("");
  $("#fecha_fin").val("");
  $("#hora_fin").val("");
  $("#txtDes").val("");
  $("#txtLugar").val("");
}
