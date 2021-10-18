<template>
  <div class="w-100 px-3">
    <h6 style="text-align: center;">Platos en Cocina</h6>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Plato</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, key) in kitchen" :key="key">
            <td>{{ key + 1 }}</td>
            <td>{{ item.name }}</td>
            <td>{{ status[key] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
  import { ref, onMounted, computed, watch } from 'vue'
  const api = import.meta.env.VITE_API_PATH

  const props = defineProps({
    orderFood: {
      type: Boolean
    }
  })

  const kitchen = ref([]);
  const status = computed(() => kitchen.value.map(val => val.status === 0 ? 'En Cocina' : 'Despachado'))

  function inKitchen() {
    fetch(`${api}/in-kitchen`)
      .then(res => res.json())
      .then(res => kitchen.value = res)
      .catch(err => console.error(err))
  }

  onMounted(() => {
    inKitchen()
  })

  watch(() => props.orderFood, (init, next) => inKitchen())
</script>