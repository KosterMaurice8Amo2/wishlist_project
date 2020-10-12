<template>
  <div class="card mb-3">
    <div v-if="!editable">
      <div class="card-header">
        <h4 class="text-dark">{{ wishname }}</h4>
      </div>
      <div class="card-body">
        <h6 class="=mb-2 card-text text-dark">{{ wishtext }}</h6>
        <a v-bind:href="wishlink" class="btn btn-primary"
          >{{ wishprice }}</a
        >
        <div class="text-center mt-3">
          <img :src="wishimage" class="rounded img-fluid" alt="..." />
        </div>
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
            aria-label="Basic example"
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
            \aria-label="Basic example"
          />
        </div>
        <div class="input-group mb-3 mt-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Wish price</span>
          </div>
          <input
            type="text"
            name="wishprice"
            class="form-control"
            v-bind:value="wishprice"
            aria-label="Basic example"
          />
        </div>
        <div class="input-group mb-3 mt-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Wish image</span>
          </div>
          <input
            type="file"
            name="wishimage"
            class="form-control"
            aria-label="Basic example"
          />
          <input type="hidden" name="oldwishimage" :value="wishimage" />
        </div>
      </div>
      <div class="card-footer text-muted">
        <span>Username: {{ username }}</span>
      </div>
    </div>
    <div
      v-if="editable"
      class="btn-group"
      role="group"
      aria-label="Basic example"
    >
      <button
        type="submit"
        name="submit-edit-wish"
        class="btn btn-primary text-white"
        v-bind:value="id"
      >
        Update
      </button>
      <button
        type="submit"
        name="submit-delete-wish"
        class="btn btn-danger text-white"
        v-bind:value="id"
      >
        Delete
      </button>
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
    wishprice: String,
    wishimage: String,
    userid: Number,
    username: String,
    editable: Boolean,
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
