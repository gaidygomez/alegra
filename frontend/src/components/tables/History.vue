<template>
	<div class="w-25 px-3">
    <h6 style="text-align: center;">Historial de Platos</h6>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Plato</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, key) in meals" :key="key">
            <td>{{ key + 1 }}</td>
            <td>{{ item.name }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
	import { ref, onMounted, watch } from 'vue'
  const api = import.meta.env.VITE_API_PATH

  const props = defineProps({
    orderFood: {
      type: Boolean
    }
  })

  const meals = ref([])

  function getMeals() {
    fetch(`${api}/history`)
      .then(res => res.json())
      .then(res => meals.value = res)
      .catch(err => console.error(err))
  }

  onMounted(() => {
    getMeals()
  })

  watch(() => props.orderFood, (init, next) => getMeals())
</script>