<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://v3.vuejs.org/api/sfc-script-setup.html#sfc-script-setup
import Navbar from './components/Navbar.vue'
import Sidebar from './components/Sidebar.vue'
import Container from './components/Container.vue'
</script>

<template>
  
  <Navbar />
  
  <div class="container-fluid">
    <div class="row">

      <Sidebar />

      <Container />
    
    </div>
  </div>
</template>

<style>
</style>
