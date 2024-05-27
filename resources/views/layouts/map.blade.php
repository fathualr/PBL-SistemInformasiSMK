<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
delete L.Icon.Default.prototype._getIconUrl;

L.Icon.Default.mergeOptions({
    iconRetinaUrl: "/image/marker-icon-2x.png",
    iconUrl: "/image/marker-icon.png",
    shadowUrl: "/image/marker-shadow.png",
});

document.addEventListener("DOMContentLoaded", function() {
    var locationString = '{{ $medsos->google_map }}';
    console.log(locationString);
    var locationArray = locationString.split(',');

    var map = L.map("map").setView([parseFloat(locationArray[0]), parseFloat(locationArray[1])], 15);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap contributors",
    }).addTo(map);

    var marker = L.marker([parseFloat(locationArray[0]), parseFloat(locationArray[1])]).addTo(map);

    var popupContent = "<h1 class='font-bold text-sm text-center'>Lokasi Sekolah</h1>" +
        "<p>Koordinat : " + parseFloat(locationArray[0]).toFixed(6) + ", " +
        parseFloat(locationArray[1]).toFixed(6) + "</p>";

    marker.bindPopup(popupContent).openPopup();

    map.removeControl(map.zoomControl);
});
</script>