<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, defineProps, watchEffect } from "vue";

// Définir les props
const props = defineProps({
  users: {
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
  { text: "Nom", value: "name" },
  { text: "Email", value: "email" },
  { text: "Rôle", value: "role" },
  { text: "Date de Création", value: "created_at" },
  { text: "Date de Mise à Jour", value: "updated_at" },
]);

// Nombre total d'items
const totalItems = ref(props.users.length);
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
    <AppLayout title="Users">
      <v-data-table-server
        :headers="headers"
        :items="props.users"
        :total-items="totalItems"
        :loading="loading"
        :options.sync="options"
        class="elevation-1"
      >
        <template v-slot:item="{ item }">
          <tr>
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.email }}</td>
            <td>{{ item.role }}</td>  <!-- Affichage du rôle -->
            <td>{{ item.created_at }}</td>
            <td>{{ item.updated_at }}</td>
          </tr>
        </template>
      </v-data-table-server>
    </AppLayout>
  </template>
  