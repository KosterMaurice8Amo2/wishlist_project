<template>
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">{{ wishname }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ wishtext }}</h6>
      <a v-bind:href="wishlink" class="card-text">klik hier voor de link</a>
      <h6 class="card-subtitle mb-2 text-muted">User id = {{ username }}</h6>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    wishname: String,
    wishtext: String,
    wishlink: String,
    username: String,
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
