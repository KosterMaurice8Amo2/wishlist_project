<template>
  <v-app-bar color="transparent" hide-on-scroll>
    <v-app-bar-nav-icon></v-app-bar-nav-icon>

    <v-toolbar-title>Wishlist</v-toolbar-title>

    <v-spacer></v-spacer>

    <v-btn text>
        Login
      </v-btn>

    <v-btn text>
        Register
      </v-btn>
  </v-app-bar>
  
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>