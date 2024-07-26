<template>
    <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-3xl font-bold text-gray-800">{{ property.nom }}</h1>
    </div>
    <div class="mb-8 bg-white p-6 rounded-lg shadow-md">
      <p class="mb-2 text-gray-600"><strong>Prénom:</strong> {{ property.prenom }}</p>
      <p class="mb-2 text-gray-600"><strong>Localisation:</strong> {{ property.localisation }}</p>
      <p class="mb-2 text-gray-600"><strong>Surface (m2):</strong> {{ property.m2 }}</p>
      <p class="mb-2 text-gray-600"><strong>Type:</strong> {{ property.type }}</p>
      <p class="mb-2 text-gray-600"><strong>État:</strong> {{ property.etat }}</p>
      <p class="mb-2 text-gray-600"><strong>Nombre de Chambres:</strong> {{ property.nombre_chambres }}</p>
      <p class="mb-2 text-gray-600"><strong>Nombre de Salles de Bain:</strong> {{ property.nombre_salles_de_bain }}</p>
      <p class="mb-2 text-gray-600"><strong>Parking:</strong> {{ property.parking ? 'Oui' : 'Non' }}</p>
      <p class="mb-2 text-gray-600"><strong>Garage:</strong> {{ property.garage ? 'Oui' : 'Non' }}</p>
      <p class="mb-2 text-gray-600"><strong>Terrain:</strong> {{ property.terrain ? 'Oui' : 'Non' }}</p>
    </div>
    <div class="gallery mb-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Galerie</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div v-for="media in property.media" :key="media.id" class="overflow-hidden rounded-lg shadow-lg">
          <img :src="media.original_url" :alt="media.name" class="w-full h-auto transition-transform transform hover:scale-105">
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script setup>
  import { ref } from 'vue';
  import { usePage } from '@inertiajs/vue3';
  
  // Récupérer les données de l'Inertia response
  const props = defineProps({
    property: {
      type: Object,
      required: true,
    },
  });
//   const property = ref(props.value.property);
  console.log(props);
  </script>
  
  <style scoped>
  .gallery img {
    max-width: 100%;
    height: auto;
  }
  </style>
  