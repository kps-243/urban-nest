<template>
    <div class="home-page">
      <!-- Hero Section -->
      <section class="hero bg-cover bg-center h-screen flex items-center justify-center text-white" style="background-image: url('/img/hero-background.jpg');">
        <div class="text-center px-4">
          <h1 class="text-4xl md:text-6xl font-bold mb-4">Bienvenue à Urbannest</h1>
          <p class="text-lg md:text-2xl mb-8">Votre solution immobilière de confiance</p>
          <button class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Découvrez nos propriétés</button>
        </div>
      </section>
  
      <!-- About Section -->
      <section class="about py-16 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
          <h2 class="text-3xl font-bold mb-4">Qui sommes-nous ?</h2>
          <p class="text-lg text-gray-700 mb-8">Chez Urbannest, nous vous aidons à trouver la maison de vos rêves. Que vous cherchiez à acheter, vendre ou louer, nous avons les solutions pour vous.</p>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h3 class="text-2xl font-bold mb-2">Expertise locale</h3>
              <p class="text-gray-700">Nous connaissons le marché immobilier local et nous vous accompagnons dans chaque étape de votre projet.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h3 class="text-2xl font-bold mb-2">Support personnalisé</h3>
              <p class="text-gray-700">Nous offrons un support personnalisé pour répondre à toutes vos questions et besoins spécifiques.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h3 class="text-2xl font-bold mb-2">Large choix de propriétés</h3>
              <p class="text-gray-700">Découvrez une vaste sélection de propriétés qui correspondent à vos critères et à votre budget.</p>
            </div>
          </div>
        </div>
      </section>
  
      <!-- Latest Properties Section -->
      <section class="latest-properties py-16 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
          <h2 class="text-3xl font-bold mb-8">Nos Dernières Propriétés</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div v-for="property in latestProperties" :key="property.id" class="property bg-white p-6 rounded-lg shadow-md">
              <img :src="property.image_url ? property.image_url : '/img/property1.jpg'" alt="Property Image" class="w-full h-48 object-cover rounded-t-lg">
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
  import { usePage } from '@inertiajs/vue3';
  
  // Récupération des données depuis les props
  const { latestProperties } = usePage().props;
  
  </script>
  
  <style scoped>
  .hero {
    background-image: url('/img/hero-background.jpg');
  }
  </style>
  