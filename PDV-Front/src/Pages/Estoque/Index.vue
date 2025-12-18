<script setup>
    import 'bootstrap/dist/css/bootstrap.min.css';
    import 'bootstrap';
    import {ref, onMounted} from 'vue';
    import axios from 'axios';

    const estoques = ref([]);

    onMounted(async() =>{
        const response = await axios.get('http://127.0.0.1:8000/api/estoque');
        estoques.value = response.data;
    })
</script>

<template>
    <div class="list-group" v-for="estoque in estoques" :key="estoque.id">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <small>{{ estoque.data }}</small>
    </div>
    <p class="mb-1">{{ estoque.tipo }}</p>
    <p class="mb-1">{{ estoque.quantidade }}</p>
    <small>{{ estoque.motivo }}</small>
  </a>
</div>
</template>