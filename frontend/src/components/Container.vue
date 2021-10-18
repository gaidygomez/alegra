<template>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Haga su Pedido</h1>
      <div class="btn-toolbar mb-2 mb-md-0 w-25">
        <button @click="orderFood" class="btn btn-success btn-lg btn-block">Pedir</button>
      </div>
    </div>

    <h2>Información</h2>
    <div class="row">
      <div class="col-6">
        
        <Kitchen :orderFood="food"/>

      </div>

      <Storage :orderFood="food"/>

      <Purchase :orderFood="food"/>

      <History :orderFood="food"/>

      <Meal :orderFood="food"/>

    </div>
  </main>
</template>

<script setup>
  import { ref } from 'vue'
  import Kitchen from './tables/Kitchen.vue'
  import Storage from './tables/Storage.vue'
  import Purchase from './tables/Purchase.vue'
  import History from './tables/History.vue'
  import Meal from './tables/Meal.vue'
  const api = import.meta.env.VITE_API_PATH

  const food = ref(false)

  function orderFood () {
    fetch(`${api}/food`)
    .then(res => res.json())
    .then(res => {
      if(res.plato) {
        alert(`Se ha pedido el siguiente plato: ${res.plato.name}`)

        food.value = ! food.value
      }

      if(res.error) {

        alert(`No se puede servir en este momento`)

        food.value = ! food.value

        console.error(res.error)
      }
    })
    .catch(err => console.error(err))
  }

</script>