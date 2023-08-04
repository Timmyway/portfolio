<script setup>
import { onMounted, ref, useAttrs } from 'vue';
const props = defineProps({    
    coordinates: { type: Array, default: [51.505, -0.09] },
    zoomLevel: 20,
    h: { type: [Number, String], default: '400px' },
    markers: { type: Array, default: [] },
    circles: { type: Array, default: [] }
});

const attrs = useAttrs();

const map = ref();

onMounted(() => {
    // var map = L.map(props.identifier);    
    setMap(attrs.id);
    setView(props.coordinates, props.zoomLevel);
    credit();
    // Put a marker
    props.markers.forEach(position => {
        if (position.action === 'mark') {
            var marker = addMarker(position.c);            
        } else if (position.action === 'circle') {            
            var marker = addCircle(position.c, position?.options);
        }
        if (position?.message) {
            marker.bindPopup(position.message);
            marker.openPopup();
        }
        
    });    
});

function setMap(mapId) {
    map.value = L.map(mapId);
}

function setView(coordinates, zoom=13) {
    map.value.setView(coordinates, zoom);
}
function credit(
    icon='https://tile.openstreetmap.org/{z}/{x}/{y}.png',
    maxZoom=19,
    attribution='&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
) {
    L.tileLayer(icon, {
		maxZoom,
		attribution
	}).addTo(map.value)
}

function addMarker(c) {
    const marker = L.marker(c).addTo(map.value);
    return marker;
}

function addCircle(c, { color = 'red', fillColor = '#f03', fillOpacity = 0.5, radius = 25 }) {
    const circle = L.circle(c, {
        color,
        fillColor,
        fillOpacity,
        radius
    }).addTo(map.value);
    return circle;
}

function addPopup(message) {
    marker.bindPopup(message).openPopup();
}

</script>

<template>
    <div :style="{ height: h }"></div>
</template>