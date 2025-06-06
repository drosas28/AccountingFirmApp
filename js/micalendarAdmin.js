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
      //id: es el id de cita
      url: "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=9",
    },
    eventClick: function (info) {
      /* Para Agendar cita*/
      $("#txtCita").val(info.event.id);
      $("#txtCliente").val(info.event.extendedProps.id_cliente);
      $("#txtTitulo").val(info.event.title);
      let { fecha, hora } = separar_fechas(info.event.start);
      $("#fecha_inicio").val(fecha);
      $("#hora_inicio").val(hora);
      separar1(info.event.end);
      $("#txtDes").val(info.event.extendedProps.des);
      $("#txtLugar").val(info.event.extendedProps.lugar);
      $("#txtCosto").val(info.event.extendedProps.costo);
      document.getElementById("txtEstado").innerHTML = estado(
        info.event.extendedProps.status
      );
      $("#modalInfo").modal("show");
    },
  });
  calendar.setOption("locale", "es"); //calendario en español
  calendar.render();
});

function separar_fechas(str) {
  let x = new Date(str).toLocaleString().split(",");
  let h = x[1];
  let date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
  let fecha = [date.getFullYear(), mnth, day].join("-");
  let hora = "";
  if (h.trim() === "9:00:00") {
    hora = "09:00";
  } else {
    hora = h.trim();
  }
  return { fecha, hora };
}

function separar1(info) {
  let { fecha, hora } = separar_fechas(info);
  $("#fecha_fin").val(fecha);
  $("#hora_fin").val(hora);
}

function estado(status) {
  let estado1 = "";
  if (status === "Activa") {
    estado1 = '<span class="badge me-1 bg-label-primary">Activa</span>';
  } else if (status === "Completada") {
    estado1 = '<span class="badge me-1 bg-label-success">Completada</span>';
  } else if (status === "Reprogramar") {
    estado1 = '<span class="badge me-1 bg-label-info">Reprogramar</span>';
  } else if (status === "Pendiente") {
    estado1 = '<span class="badge me-1 bg-label-warning">Pendiente</span>';
  } else if (status === "Perdida") {
    estado1 = '<span class="badge me-1 bg-label-light">Perdida</span>';
  }
  return estado1;
}

function modificarCosto() {
  let id_cita = $("#txtCita").val();
  let id_cliente = $("#txtCliente").val();
  let costo = $("#txtCosto").val();
  if (id_cita != "" && id_cliente != "" && costo != "") {
    let url =
      "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=10&id_cliente=" +
      id_cliente +
      "&id_cita=" +
      id_cita +
      "&costo=" +
      costo +
      "&r=" +
      Math.random();
    $.ajax({
      url: url,
      success: function (result) {
        mymensaje = "<h5>Costo Cambiado!!</h5>";
        document.getElementById("mensaje").innerHTML = mymensaje;
        $("#modalAlert").modal("show");
      },
    });
  } else {
    alert("Llenar los campos"); //poner modal
  }
}

function eliminarCita() {
  let id_cita = $("#txtCita").val();
  let url =
    "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=3&id_cita=" +
    id_cita +
    "&r=" +
    Math.random();
  $.ajax({
    url: url,
    success: function (result) {
      mymensaje = "<h5>Cita Eliminada!!</h5>";
      document.getElementById("mensaje").innerHTML = mymensaje;
      $("#modalAlert").modal("show");
      $("#modalInfo").modal("hide");
    },
  });
}

function modificarEstado() {
  $("#modalEstado").modal("show");
}

function cambio() {
  let nuevo = document.getElementById("txtCambio").value;
  let id_cliente = document.getElementById("txtCliente").value;
  let id_cita = document.getElementById("txtCita").value;
  let url =
    "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=11&id_cliente=" +
    id_cliente +
    "&id_cita=" +
    id_cita +
    "&estado=" +
    nuevo +
    "&r=" +
    Math.random();
  $.ajax({
    url: url,
    success: function (result) {
      mymensaje = "<h5>Cambio de estado exitoso!!</h5>";
      document.getElementById("mensaje").innerHTML = mymensaje;
      $("#modalAlert").modal("show");
      $("#modalEstado").modal("hide");
    },
  });
}
