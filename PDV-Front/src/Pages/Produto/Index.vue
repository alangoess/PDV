<script setup>
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

import { ref, onMounted } from 'vue';
import axios from 'axios';

const produtos = ref([])

onMounted(async () =>{
    const response = await axios.get('http://127.0.0.1:8000/api/produto')
    produtos.value = response.data;
});
</script>

<template>
    <div >
        <h1>Lista de Produtos</h1>
        

<ol class="list-group list-group-numbered" v-for=" produto in produtos" :key = "produto.id">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold"><p>{{ produto.nome }}</p></div>
      <p>Quantidade: {{ produto.estoque }}</p>
    </div>
    <span class="badge text-bg-primary rounded-pill">R$ {{ produto.preco }}</span>
  </li>
</ol>
        
    </div>

</template>
