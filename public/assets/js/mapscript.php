// On initialise la latitude et la longitude du Lab'O, point de départ de notre "route" (centre de la carte)

var lat = 47.89384;
var lon = 1.89507;
var macarte = null;
var markerClusters; // Servira à stocker les groupes de marqueurs
// Nous initialisons une liste de marqueurs
var villes = {

    "Chasseur de bonbon": {"lat": 47.89384, "lon": 1.89507},
    "Maison1": {"lat": 47.8942, "lon": 1.896},
    "Maison2": {"lat": 47.89327, "lon": 1.89602},
    "Maison3": {"lat": 47.89361, "lon": 1.89680},
    "Maison4": {"lat": 47.89281, "lon": 1.89704},
    "Maison5": {"lat": 47.89272, "lon": 1.89599},
    "Maison6": {"lat": 47.89270, "lon": 1.89674},
    "Maison7": {"lat": 47.89327, "lon": 1.89602},
    "Maison8": {"lat": 47.89254, "lon": 1.89474},
    "Maison9": {"lat": 47.89272, "lon": 1.89440},
    "Maison10": {"lat": 47.89279, "lon": 1.89329},
    "Maison11": {"lat": 47.89232, "lon": 1.89324},
    "Maison12": {"lat": 47.89327, "lon": 1.89602},
    "Maison14": {"lat": 47.89283, "lon": 1.89211},
    "Maison15": {"lat": 47.89286, "lon": 1.89084},
    "Maison16": {"lat": 47.89288, "lon": 1.89948},
    "Maison17": {"lat": 47.89288, "lon": 1.88899},
    "Maison18": {"lat": 47.89297, "lon": 1.88881},
    "Maison19": {"lat": 47.89363, "lon": 1.88887},
    "Maison20": {"lat": 47.89387, "lon": 1.89902},
    "Maison21": {"lat": 47.89390, "lon": 1.88951},
    "Maison22": {"lat": 47.89349, "lon": 1.88807},
    "Maison23": {"lat": 47.89395, "lon": 1.89067},
    "Maison24": {"lat": 47.89395, "lon": 1.89139},
    "Maison25": {"lat": 47.89266, "lon": 1.88847},
    "Maison26": {"lat": 47.89219, "lon": 1.88855},
    "Maison27": {"lat": 47.89209, "lon": 1.88915},
    "Maison28": {"lat": 47.89217, "lon": 1.89073},
    "Maison29": {"lat": 47.89229, "lon": 1.89191},
    "Maison30": {"lat": 47.89227, "lon": 1.89228}

};

// Fonction d'initialisation de la carte
function initMap() {
    var markers = []; // Nous initialisons la liste des marqueurs
    macarte = L.map('map').setView([lat, lon], 15);
    markerClusters = L.markerClusterGroup(); // Nous initialisons les groupes de marqueurs
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20

    }).addTo(macarte);
    // Nous parcourons la liste des villes
    for (ville in villes) {
        var marker = L.marker([villes[ville].lat, villes[ville].lon]);

        marker.bindPopup(ville);
        markerClusters.addLayer(marker); // Nous ajoutons le marqueur aux groupes
        markers.push(marker); // Nous ajoutons le marqueur à la liste des marqueurs
    }
    var group = new L.featureGroup(markers); // Nous créons le groupe des marqueurs pour adapter le zoom
    macarte.fitBounds(group.getBounds().pad(0.5)); // Nous demandons à ce que tous les marqueurs soient visibles, et ajoutons un padding (pad(0.5)) pour que les marqueurs ne soient pas coupés
    macarte.addLayer(markerClusters);

}

window.onload = function () {
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();
};
