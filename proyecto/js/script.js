document.addEventListener("DOMContentLoaded", () => {

  const contenedor = document.getElementById("estado-solicitud");
  if (!contenedor) return;

  fetch("../php/obtener_solicitud.php")
    .then(response => response.json())
    .then(data => {

      if (!data) {
        contenedor.innerHTML = `
          <p>📭 No tenés solicitudes activas.</p>
        `;
        return;
      }

      let html = `
        <h3>📄 Estado de tu solicitud</h3>
        <p><strong>Estado:</strong> ${data.estado}</p>
      `;

      if (data.nombre) {
        html += `
          <p><strong>Cuidador asignado:</strong> ${data.nombre}</p>
          <p><strong>Teléfono:</strong> ${data.telefono}</p>
        `;
      } else {
        html += `
          <p>⏳ Buscando cuidador disponible...</p>
        `;
      }

      contenedor.innerHTML = html;
    })
    .catch(error => {
      console.error(error);
      contenedor.innerHTML = `<p>❌ Error al cargar la solicitud</p>`;
    });

});
