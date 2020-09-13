<template>
  <v-container class="mx-auto overflow-hidden">
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">User</th>
            <th class="text-left">Wish</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in wishes" :key="item.name">
            <td>{{ item.name }}</td>
            <td>{{ item.wish }}</td>
            <td>{{ item.link }}</td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </v-container>
</template>

<script>
export default {
    data () {
      return {
        wishes: [
          {
            name: 'Frozen Yogurt',
            wish: 159,
            link: 'test'
          },
        ],
      }
    },
  }
</script>

<style scoped>



</style>