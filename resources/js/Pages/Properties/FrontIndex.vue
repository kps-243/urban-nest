<template>
    <div class="frontindex-page">
      <!-- Hero Section -->
      <section class="hero bg-cover bg-center h-64 flex items-center justify-center text-white" style="background-image: url('/img/hero-background.jpg');">
        <div class="text-center px-4">
          <h1 class="text-4xl md:text-6xl font-bold mb-4">Nos Propriétés</h1>
        </div>
      </section>
  
      <section class="search-bar py-8 bg-gray-200">
      <div class="container mx-auto px-4">
        <input
          v-model="search"
          type="text"
          placeholder="Rechercher des propriétés..."
          class="w-full p-4 rounded-lg shadow-md"
          @keyup.enter="filterProperties"
        />
      </div>
    </section>
    
      <!-- Properties Section -->
      <section class="properties py-16 bg-gray-100">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8">Découvrez nos propriétés</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="property in filteredProperties" :key="property.id" class="property bg-white p-6 rounded-lg shadow-md">
            <img src="/img/property1.jpg" alt="Property Image" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-4">
              <h3 class="text-2xl font-bold mb-2">{{ property.nom }}</h3>
              <p class="text-gray-700 mb-2"><strong>Prénom:</strong> {{ property.prenom }}</p>
              <p class="text-gray-700 mb-2"><strong>Localisation:</strong> {{ property.localisation }}</p>
              <p class="text-gray-700 mb-2"><strong>Surface:</strong> {{ property.m2 }} m²</p>
              <p class="text-gray-700 mb-2"><strong>Type:</strong> {{ property.type }}</p>
              <p class="text-gray-700 mb-2"><strong>État:</strong> {{ property.etat }}</p>
              <p class="text-gray-700 mb-2"><strong>Chambres:</strong> {{ property.nombre_chambre }}</p>
              <p class="text-gray-700 mb-2"><strong>Salles de Bain:</strong> {{ property.nombre_salle_bain }}</p>
              <p class="text-gray-700 mb-2"><strong>Parking:</strong> {{ property.parking ? 'Oui' : 'Non' }}</p>
              <p class="text-gray-700 mb-2"><strong>Garage:</strong> {{ property.garage ? 'Oui' : 'Non' }}</p>
              <p class="text-gray-700 mb-2"><strong>Terrain:</strong> {{ property.terrain ? 'Oui' : 'Non' }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  
      <!-- Contact Section -->
      <section class="contact bg-blue-800 text-white py-16">
        <div class="container mx-auto px-4 text-center">
          <h2 class="text-3xl font-bold mb-4">Contactez-nous</h2>
          <p class="text-lg mb-8">Vous avez des questions ? N'hésitez pas à nous contacter. Nous sommes là pour vous aider.</p>
          <button class="bg-white text-blue-800 font-bold py-2 px-4 rounded">Envoyer un message</button>
        </div>
      </section>
    </div>
  </template>
  
  <script setup>
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
  
  const props = defineProps({
      properties: {
        type: Array,
        required: true
      }
    });

    const search = ref('');

    const filteredProperties = computed(() => {
      if (!search.value) {
        return props.properties;
      }
      return props.properties.filter(property => {
        return property.nom.toLowerCase().includes(search.value.toLowerCase()) ||
               property.prenom.toLowerCase().includes(search.value.toLowerCase()) ||
               property.localisation.toLowerCase().includes(search.value.toLowerCase()) ||
               property.type.toLowerCase().includes(search.value.toLowerCase());
      });
    });

    const filterProperties = () => {
      console.log('Filtering properties with search term:', search.value);
    };
  </script>
  
  <style scoped>
  .hero {
    background-image: url('/img/hero-background.jpg');
  }
  </style>
  