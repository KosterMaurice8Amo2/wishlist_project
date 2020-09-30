<template>
  <div class="card-body">
    <ul class="list-group list-group-flush">
      <li
        class="list-group-item d-flex justify-content-between align-items-center"
      >
        <div class="text-dark">{{ username }}</div>
        <div class="text-dark">Role: {{ permission }}</div>
        <button
          type="submit"
          name="submit-edit-admin"
          v-bind:value="id"
          class="btn btn-dark text-white"
          v-if="permission == 'user'"
        >
          Make admin
        </button>
        <button
          type="submit"
          name="submit-edit-user"
          v-bind:value="id"
          class="btn btn-dark text-white"
          v-if="permission == 'admin'"
        >
          Make user
        </button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    id: Number,
    username: String,
    permission: String,
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
