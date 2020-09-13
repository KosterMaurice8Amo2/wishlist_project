<template>
  <v-footer padless fixed>
    <v-col
      class="text-center"
      cols="12"
    >
      {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
    </v-col>
  </v-footer>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>