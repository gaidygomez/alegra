<template>
	<div class="w-25 px-3">
    <h6 style="text-align: center;">Productos en Bodega</h6>
		<div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, key) in storage" :key="key">
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
  import { onMounted, ref, watch } from 'vue'
  const api = import.meta.env.VITE_API_PATH

  const props = defineProps({
    orderFood: {
      type: Boolean
    }
  })

  const storage = ref([])
  
  function inStorage() {
    fetch(`${api}/available`)
      .then(res => res.json())
      .then(res => storage.value = res)
      .catch(err => console.error(err))
  }


  onMounted(() => {

    inStorage()

  })

  watch(() => props.orderFood, (init, next) => inStorage())
</script>