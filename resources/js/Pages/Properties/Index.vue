<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, defineProps, watchEffect } from "vue";

// Définir les props
const props = defineProps({
  properties: {
    type: Array,
    required: true
  }
});

// Pagination and server-side options
const options = ref({
  page: 1,
  itemsPerPage: 10, // Adjust as needed
});

// Table headers
const headers = ref([
  { text: "ID", align: "start", value: "id" },
  { text: "Nom", value: "nom" },
  { text: "Localisation", value: "localisation" },
  { text: "Superficie (m2)", value: "m2" },
  { text: "Type", value: "type" },
  { text: "État", value: "etat" },
  { text: "Nombre de Chambres", value: "nombre_chambres" },
  { text: "Nombre de Salles de Bain", value: "nombre_salles_de_bain" },
  { text: "Parking", value: "parking" },
  { text: "Garage", value: "garage" },
  { text: "Terrain", value: "terrain" },
]);

// Nombre total d'items
const totalItems = ref(props.properties.length);
const loading = ref(false);

// Handler placeholder pour la récupération des données côté serveur
const getServerData = async () => {
  loading.value = true;
  // Placeholder pour la logique serveur
  // Simuler un délai
  setTimeout(() => {
    loading.value = false;
  }, 1000);
};

// Mettre à jour les données côté serveur chaque fois que les options changent
watchEffect(() => {
  getServerData();
});
</script>

<template>
  <AppLayout title="Properties">
    <v-data-table-server
      :headers="headers"
      :items="props.properties"
      :total-items="totalItems"
      :loading="loading"
      :options.sync="options"
      class="elevation-1"
    >
      <template v-slot:item="{ item }">
        <tr>
          <td>{{ item.id }}</td>
          <td>{{ item.nom }}</td>
          <td>{{ item.localisation }}</td>
          <td>{{ item.m2 }}</td>
          <td>{{ item.type }}</td>
          <td>{{ item.etat }}</td>
          <td>{{ item.nombre_chambres }}</td>
          <td>{{ item.nombre_salles_de_bain }}</td>
          <td>{{ item.parking ? 'Oui' : 'Non' }}</td>
          <td>{{ item.garage ? 'Oui' : 'Non' }}</td>
          <td>{{ item.terrain ? 'Oui' : 'Non' }}</td>
          <!-- Add more columns as needed -->
        </tr>
      </template>
    </v-data-table-server>
  </AppLayout>
</template>
