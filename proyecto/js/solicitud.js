let map, marker;

function abrirModalSolicitud(servicioId, nombre) {
  document.getElementById("modal-servicio-nombre").innerText = nombre;
  document.getElementById("servicio_id").value = servicioId;

  document.getElementById("modal-solicitud").style.display = "block";

  setTimeout(initMapa, 200);
}

function cerrarModal() {
  document.getElementById("modal-solicitud").style.display = "none";
  if (map) map.remove();
}

function initMapa() {
  if (map) return;

  map = L.map("mapa").setView([-34.9011, -56.1645], 13); // Montevideo default

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap"
  }).addTo(map);

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(pos => {
      const lat = pos.coords.latitude;
      const lng = pos.coords.longitude;

      map.setView([lat, lng], 15);

      marker = L.marker([lat, lng], { draggable: true }).addTo(map);

      setCoords(lat, lng);
      reverseGeocode(lat, lng);

      marker.on("dragend", () => {
        const p = marker.getLatLng();
        setCoords(p.lat, p.lng);
        reverseGeocode(p.lat, p.lng);
      });
    });
  }
}

function setCoords(lat, lng) {
  document.getElementById("lat").value = lat;
  document.getElementById("lng").value = lng;
}

function reverseGeocode(lat, lng) {
  fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
    .then(r => r.json())
    .then(d => {
      if (d.display_name) {
        document.getElementById("direccion").value = d.display_name;
      }
    });
}

document.getElementById("form-solicitud").addEventListener("submit", e => {
  e.preventDefault();

  fetch("../php/crear_solicitud.php", {
    method: "POST",
    body: new FormData(e.target)
  })
  .then(r => r.json())
  .then(() => {
    alert("✅ Solicitud enviada");
    cerrarModal();
  });
});