<template>
    <div class="home-page">
      <!-- Hero Section -->
      <section class="hero bg-cover bg-center h-screen flex items-center justify-center text-white " style="background-image: url('/img/hero-background.jpg');">
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
  
      <!-- Featured Properties Section -->
      <section class="featured-properties py-16">
        <div class="container mx-auto px-4 text-center">
          <h2 class="text-3xl font-bold mb-8">Propriétés en vedette</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div v-for="property in featuredProperties" :key="property.id" class="property bg-white p-6 rounded-lg shadow-md">
              <img :src="property.image" alt="Property Image" class="w-full h-48 object-cover rounded-t-lg">
              <div class="p-4">
                <h3 class="text-2xl font-bold mb-2">{{ property.name }}</h3>
                <p class="text-gray-700 mb-4">{{ property.location }}</p>
                <p class="text-lg font-bold text-blue-800">{{ property.price }} €</p>
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
  import { ref } from 'vue';
  
  // Exemple de propriétés en vedette
  const featuredProperties = ref([
    {
      id: 1,
      name: 'Villa de luxe',
      location: 'Paris, France',
      price: '2,500,000',
      image: '/img/property1.jpg'
    },
    {
      id: 2,
      name: 'Appartement moderne',
      location: 'Lyon, France',
      price: '800,000',
      image: '/img/property2.jpg'
    },
    {
      id: 3,
      name: 'Maison familiale',
      location: 'Marseille, France',
      price: '1,200,000',
      image: '/img/property3.jpg'
    }
  ]);
  </script>
  
  <style scoped>
  .hero {
    background-image: url('/img/hero-background.jpg');
  }
  </style>
  