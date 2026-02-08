navigator.geolocation.getCurrentPosition(
  (pos) => {
    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    document.getElementById("lat").value = lat;
    document.getElementById("lng").value = lng;
  },
  () => alert("No se pudo obtener ubicación")
);
