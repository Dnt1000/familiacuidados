const map = L.map('map').setView([lat, lng], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

L.marker([lat, lng]).addTo(map)
  .bindPopup("Cliente necesita asistencia")
  .openPopup();
