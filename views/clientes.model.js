class Clase_Cliente {
    todos() {
        $.get(url + "todos", (response) => {
            let html = "";
            $.each(response, (index, val) => {
                html += "<tr>";
                html += "<td>" + val.email + "</td>";
                html += "<td>" + val.telefono + "</td>";
                html += "<td><button class='btn btn-danger' onclick='objeto.eliminar(" + val.id + ")'>Eliminar</button></td>";
                html += "</tr>";
            });
            $("#tablaClientes").html(html); // Asumiendo que tienes una tabla con este id
        });
    }

    uno(id) {
        var id = $("#id").val();
        $.get(url + "uno?id=" + id, (response) => {
            response = JSON.parse(response);
            $("#nombre").val(response[0].nombre);
            $("#apellido").val(response[0].apellido);
            $("#email").val(response[0].email);
            $("#telefono").val(response[0].telefono);
        });
    }
}