let mapa, marcador;

function abrirModalSolicitud(id, nombre) {
  console.log("Abriendo modal:", id, nombre);

  document.getElementById("modal-servicio-nombre").innerText = nombre;
  document.getElementById("servicio_id").value = id;
  document.getElementById("modal-solicitud").style.display = "block";

  navigator.geolocation.getCurrentPosition(
    (pos) => {
      const lat = pos.coords.latitude;
      const lng = pos.coords.longitude;

      document.getElementById("lat").value = lat;
      document.getElementById("lng").value = lng;

      if (mapa) mapa.remove();

      mapa = L.map("mapa").setView([lat, lng], 15);

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap"
      }).addTo(mapa);

      marcador = L.marker([lat, lng], { draggable: true }).addTo(mapa);

      marcador.on("dragend", () => {
        const p = marcador.getLatLng();
        document.getElementById("lat").value = p.lat;
        document.getElementById("lng").value = p.lng;
      });
    },
    () => alert("No se pudo obtener la ubicación")
  );
}

function cerrarModal() {
  document.getElementById("modal-solicitud").style.display = "none";
  if (mapa) mapa.remove();
}
