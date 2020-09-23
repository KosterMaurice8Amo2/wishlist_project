<template>
  
  <header class="masthead mb-auto text-white">
    <div class="inner ">
      <h3 class="masthead-brand">{{ username }}</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link text-white" href="/">Home</a>
        <a class="nav-link text-white" href="/wishes">Wish</a>
        <a class="nav-link text-primary" href="/login">Login</a>
        <a class="nav-link text-primary" href="/register">Registreer</a>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  
  // data() {
  //   return {
  //     ingelogd: true,
  //   };
  // },
  mounted() {
    console.log("Component mounted.");
  },
  props: {
    username: String,
  }
};
</script>
