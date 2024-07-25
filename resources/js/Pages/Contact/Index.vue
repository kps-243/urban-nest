<template>
    <div class="container mx-auto px-4 py-8">
      <form @submit.prevent="submitForm" class="w-full flex flex-col gap-5">
        <div>
          <label for="nom" class="block text-sm font-medium text-gray-700">* Nom</label>
          <input type="text" v-model="form.nom" id="nom" name="nom" required class="mt-1 block w-full">
        </div>
        <div>
          <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
          <input type="text" v-model="form.phone" id="phone" name="phone" class="mt-1 block w-full">
        </div>
        <div>
          <label for="mail" class="block text-sm font-medium text-gray-700">* Mail</label>
          <input type="email" v-model="form.mail" id="mail" name="mail" required class="mt-1 block w-full">
        </div>
        <div>
          <label for="work" class="block text-sm font-medium text-gray-700">Votre entreprise</label>
          <input type="text" v-model="form.work" id="work" name="work" class="mt-1 block w-full">
        </div>
        <div>
          <label for="link" class="block text-sm font-medium text-gray-700">* Objet</label>
          <input type="text" v-model="form.link" id="link" name="link" required class="mt-1 block w-full">
        </div>
        <div>
          <label for="question" class="block text-sm font-medium text-gray-700">* Votre question</label>
          <textarea v-model="form.question" id="question" name="question" rows="3" required class="mt-1 block w-full"></textarea>
        </div>
        <div>
          <button type="submit" class="bg-blue-800 text-white px-4 py-2 rounded">Soumettre</button>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  
  // Initialiser le formulaire avec les champs requis
  const form = useForm({
    nom: '',
    phone: '',
    mail: '',
    work: '',
    link: '',
    question: ''
  });
  
  // Fonction pour soumettre le formulaire
  const submitForm = () => {
    form.post(route('contact.sendMail'), {
      onSuccess: () => {
        console.log('Form submitted successfully');
      },
      onError: (errors) => {
        console.error('Form submission failed', errors);
      }
    });
  };
  </script>
  
  <style scoped>
  /* Ajoutez ici des styles spécifiques si nécessaire */
  </style>
  