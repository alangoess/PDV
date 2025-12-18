<script setup>
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

import {ref, onMounted } from 'vue';
import axios from 'axios';

const categorias = ref([])

onMounted(async() =>{
 const response = await axios.get('http://127.0.0.1:8000/api/categoria')
 categorias.value = response.data;
});

</script>

<template>
  <div class="container">
    <h1>Categorias</h1>
    <ul class="list-group">
      <li v-for="categoria in categorias" :key="categoria.id" class="list-group-item">
        {{ categoria.tipo }}
      </li>
    </ul>
  </div>
</template>