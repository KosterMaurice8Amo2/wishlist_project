<template>
  <v-form v-model="valid">
    <v-container>
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="wishtitle"
            :rules="nameRules"
            :counter="10"
            label="Wish titel"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="wishtext"
            :rules="nameRules"
            :counter="10"
            label="Wish text"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="wishlink"
            :rules="nameRules"
            label="Wish link"
            required
          ></v-text-field>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
  export default {
    data: () => ({
      valid: false,
      wishtitle: '',
      wishtext: '',
      wishlink: '',
      nameRules: [
        v => !!v || 'Items are required',
      ],
    }),
  }
</script>