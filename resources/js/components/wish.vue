<template>
  <div class="card mb-3">
    <div v-if="!editable">
      <div class="card-header">
        {{ wishname }}
      </div>
      <div class="card-body">
        <h6 class="=mb-2 card-text">{{ wishtext }}</h6>
        <a v-bind:href="wishlink" class="btn btn-primary"
          >klik hier voor de link</a
        >
      </div>
      <div class="card-footer text-muted">Username: {{ username }}</div>
    </div>
    <div v-if="editable">
      <div class="card-header">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Wish titel</span>
          </div>
          <input
            type="text"
            class="form-control"
            name="wishname"
            v-bind:value="wishname"
            v-bind:aria-label="wishname"
          />
        </div>
      </div>
      <div class="card-body">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Wish tekst</span>
          </div>
          <textarea
            class="form-control"
            name="wishtext"
            aria-label="With textarea"
            v-bind:value="wishtext"
          ></textarea>
        </div>
        <div class="input-group mb-3 mt-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Wish link</span>
          </div>
          <input
            type="text"
            name="wishlink"
            class="form-control"
            v-bind:value="wishlink"
            v-bind:aria-label="wishlink"
          />
        </div>
      </div>
      <div class="card-footer text-muted">
        <span>Username: {{ username }}</span>
      </div>
    </div>
    <div v-if="editable" class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" name="submit-edit-wish" class="btn btn-primary text-white" v-bind:value="id">Update</button>
        <button type="submit" name="submit-delete-wish" class="btn btn-danger text-white" v-bind:value="id">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: Number,
    wishname: String,
    wishtext: String,
    wishlink: String,
    userid: Number,
    username: String,
    editable: Boolean,
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
