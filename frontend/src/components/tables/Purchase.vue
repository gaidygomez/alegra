<template>
  <div class="w-25 px-3">
    <h6 style="text-align: center;">Ingredientes Comprados</h6>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Ingrediente</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, key) in purchases" :key="key">
            <td>{{ key + 1 }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.quantity }}</td>
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

  const purchases = ref([])

  function getPurchases() {
    fetch(`${api}/history-purchase`)
      .then(res => res.json())
      .then(res => purchases.value = res)
      .catch(err => console.error(err))
  }

  onMounted(() => {
    getPurchases()
  })

  watch(() => props.orderFood, (init, next) => getPurchases())
</script>