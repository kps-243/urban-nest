<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  role: "",
  terms: false,
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="Register" />
  <AuthLayout>
    <AuthenticationCard>
      <template #logo>
        <AuthenticationCardLogo />
      </template>

      <form @submit.prevent="submit">
        <div>
          <VTextField
            id="name"
            label="Name"
            variant="outlined"
            v-model="form.name"
            type="text"
            class="mt-1 block w-full"
            required
            autofocus
            autocomplete="name"
          />
          <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="mt-4">
          <VTextField
            id="email"
            label="email"
            variant="outlined"
            v-model="form.email"
            type="email"
            class="mt-1 block w-full"
            required
            autofocus
            autocomplete="username"
          />
          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
          <VTextField
            label="password"
            variant="outlined"
            id="password"
            v-model="form.password"
            type="password"
            class="mt-1 block w-full"
            required
            autocomplete="new-password"
          />
          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4">
          <VTextField
            label="Confirm Password"
            variant="outlined"
            id="password_confirmation"
            v-model="form.password_confirmation"
            type="password"
            class="mt-1 block w-full"
            required
            autocomplete="new-password"
          />
          <InputError
            class="mt-2"
            :message="form.errors.password_confirmation"
          />
        </div>
        <!-- Ajout du champ de sélection du rôle -->
        <div class="mt-4">
          <jet-label for="role" value="Role" />
          <select id="role" v-model="form.role" class="mt-1 block w-full border">
            <option value="client">Client</option>
            <option value="commercial">Commercial</option>
          </select>
        </div>
        <div
          v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
          class="mt-4"
        >
          <InputLabel for="terms">
            <div class="flex items-center">
              <Checkbox
                id="terms"
                v-model:checked="form.terms"
                name="terms"
                required
              />

              <div class="ms-2">
                I agree to the
                <a
                  target="_blank"
                  :href="route('terms.show')"
                  class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >Terms of Service</a
                >
                and
                <a
                  target="_blank"
                  :href="route('policy.show')"
                  class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >Privacy Policy</a
                >
              </div>
            </div>
            <InputError class="mt-2" :message="form.errors.terms" />
          </InputLabel>
        </div>

        <div class="flex items-center justify-end mt-4">
          <PrimaryButton
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Register
          </PrimaryButton>
        </div>
        <div class="mt-5 flex justify-center">
          <p>Already registered?</p>
          <Link
            :href="route('login')"
            class="text-md text-primary ml-3 font-bold hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Login here
          </Link>
        </div>
      </form>
    </AuthenticationCard>
  </AuthLayout>
</template>
