<template>
  <div class="w-25 px-3">
    <h6 style="text-align: center;">Recetas</h6>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Plato</th>
            <th>Receta</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, key) in recipes" :key="key">
            <td>{{ key + 1 }}</td>
            <td>{{ item.name }}</td>
            <td> 
              <p v-for="(recipe, k) in item.recipe" :key="k">
                Ingrediente: {{ k }} Cantidad: {{ recipe }}
              </p>
            </td>
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

  const recipes = ref([])

  function getRecipes() {
    fetch(`${api}/meals`)
      .then(res => res.json())
      .then(res => recipes.value = res)
      .catch(err => console.error(err))
  }

  onMounted(() => {
    getRecipes()
  })
  
  watch(() => props.orderFood, (init, next) => getRecipes())
</script>