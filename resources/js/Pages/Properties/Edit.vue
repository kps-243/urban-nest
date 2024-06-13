<script setup>
import { useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

// Récupérer les propriétés via les props
const props = defineProps({
  property: {
    type: Object,
    required: true,
  },
});

const form = useForm({
  nom: "",
  prenom: "",
  localisation: "",
  m2: "",
  type: "",
  etat: "",
  nombre_chambres: 0,
  nombre_salles_de_bain: 0,
  parking: false,
  garage: false,
  terrain: false,
});

onMounted(() => {
  form.nom = props.property.nom;
  form.prenom = props.property.prenom;
  form.localisation = props.property.localisation;
  form.m2 = props.property.m2;
  form.type = props.property.type;
  form.etat = props.property.etat;
  form.nombre_chambres = props.property.nombre_chambres;
  form.nombre_salles_de_bain = props.property.nombre_salles_de_bain;
  form.parking = props.property.parking;
  form.garage = props.property.garage;
  form.terrain = props.property.terrain;
});

const submit = () => {
  form.put(route("properties.update", props.property.id), {
    onSuccess: () => {
      console.log("Form submitted successfully");
    },
    onError: (errors) => {
      console.error("Form submission failed", errors);
    },
  });
};
</script>

<template>
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-4">Modifier Bien Immobilier</h1>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <VTextField
          id="nom"
          label="Nom"
          variant="outlined"
          v-model="form.nom"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="name"
        />        
      </div>
      <div class="mb-4">
        <VTextField
          id="prenom"
          label="Prénom"
          variant="outlined"
          v-model="form.prenom"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="prenom"
        />        
      </div>
      <div class="mb-4">
        <VTextField
          id="localisation"
          label="Localisation"
          variant="outlined"
          v-model="form.localisation"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="localisation"
        />        
      </div>
      <div class="mb-4">
        <VTextField
          id="m2"
          label="M2"
          variant="outlined"
          v-model="form.m2"
          type="number"
          class="mt-1 block w-full"
        />
      </div>
      <div class="mb-4">
        <VSelect
          id="type"
          label="Type"
          v-model="form.type"
          :items="['Maison', 'Appartement']"
          class="mt-1 block w-full"
        />
      </div>
      <div class="mb-4">
        <VSelect
          id="etat"
          label="État"
          v-model="form.etat"
          :items="['Neuf', 'Rénové', 'Plateau']"
          class="mt-1 block w-full"
        />
      </div>
      <div class="mb-4">
        <VTextField
          id="nombre_chambres"
          label="Nombre de Chambres"
          variant="outlined"
          v-model="form.nombre_chambres"
          type="number"
          class="mt-1 block w-full"
        />
      </div>
      <div class="mb-4">
        <VTextField
          id="nombre_salles_de_bain"
          label="Nombre de Salles de Bain"
          variant="outlined"
          v-model="form.nombre_salles_de_bain"
          type="number"
          class="mt-1 block w-full"
        />
      </div>
      <div class="mb-4">
        <VCheckbox
          id="parking"
          label="Parking"
          v-model="form.parking"
          class="mt-1 block w-full"
        />
      </div>
      <div class="mb-4">
        <VCheckbox
          id="garage"
          label="Garage"
          v-model="form.garage"
          class="mt-1 block w-full"
        />
      </div>
      <div class="mb-4">
        <VCheckbox
          id="terrain"
          label="Terrain"
          v-model="form.terrain"
          class="mt-1 block w-full"
        />
      </div>
      <div class="mt-6">
        <PrimaryButton>
          Update
        </PrimaryButton>
      </div>
    </form>
  </div>
</template>
