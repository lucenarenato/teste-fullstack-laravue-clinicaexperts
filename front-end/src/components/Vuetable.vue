

<template>
   
   <div id="app">
  <div class="text-end">
    <button class="btn btn-primary" type="button" v-on:click="addItem">
        Adicionar
    </button>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>título</th>
        <th>foto</th>
        <th>status de vendas</th>
        <th>editar</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in products" :key="item.id" :class="{'table-success': item.onStock}">
        <!-- v-bind:class="{'table-success':item.onStock} 判斷式-->
        <td>{{ item.name }}</td>
        <td>
          <img :src="item.imageUrl" alt="" height="100" />
        </td>
        <td>
          <input type="checkbox" v-model="item.onStock" />
        </td>
        <td>
          <button type="button" class="btn btn-outline-primary" v-on:click="editItem(item)" >
            
            Rever
          </button>
          <button type="button" class="btn btn-outline-danger" v-on:click="deleteItem(item)" >
            excluir
          </button>
        </td>
      </tr>
    </tbody>
  </table>
  <!-- <form >
    <div class="mb-3">
      <label for="productName" class="form-label">Nome do Produto</label>
      <input type="text" id="productName" class="form-control" />
    </div>
    <div class="mb-3">
      <label for="productImage" class="form-label">Imagem do Produto</label>
    
      <img >
      <input type="text" id="productImage" class="form-control" />
    </div>
    <button type="button" class="btn btn-secondary" v-on:click="confirmEdit">
        renovar
    </button>
  </form> -->
</div>

</template>
  
<script setup lang="ts">


// Vue.createApp(app).mount("#app");


</script>

<style scoped>

html,body{
  margin: 0;
  padding: 0;
}

#app{
  width: 80%;
  height: auto;
  margin: auto;
  margin-top: 5%;
  padding: 20px;
  border-radius: 25px;
  background-color: #fdfdfd;
  box-shadow: 0px 0px 15px #ccc;
}

input[type="checkbox"]{
  width: 20px;
  height: 20px;
}

td > button{
  margin-left: 5px;
}


</style>