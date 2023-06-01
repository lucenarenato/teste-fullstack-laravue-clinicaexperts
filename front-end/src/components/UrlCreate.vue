<script setup lang="ts">
import api from '@/services/api';
import { provide, ref } from 'vue';
import UrlDashboard from './UrlDashboard.vue';

let link = ref()
let identificador = ref()
let serverReponse = ref()

const axiosUrlForm = async (e: Event) => {

    e.preventDefault();

    await api.post("/short/link", {
        link: link.value,
        identificador: identificador.value
    })
        .then(response => (serverReponse.value = response.data))
        .catch(function (error) {
            console.error(error)
        })
}

provide("serverReponse", serverReponse)
</script>

<template>
    <form class="url-form" method="post" @submit="axiosUrlForm">
        <label for="url-original" class="url-rotulo">Cole a URL longa aqui</label>
        <br />
        <input id="url-original" class="url-entrada" placeholder=" https://www.exemplo.com.br/url-gigante"
            type="url" v-model="link" required>
        <br/>
        <label for="identificador-original" class="identificador">Identificador</label>
        <br/>
        <input id="identificador-original" class="identificador-entrada" placeholder="  teste"
            type="text" v-model="identificador"><br/>
        <button class="url-form-btn" type="submit">+</button>
    </form>

    <UrlDashboard />
</template>
 
<style scoped>

.url-form {
    margin: 1% 0 5% 0;
}

.url-rotulo {
    font-weight: bold;
    color: rgba(13, 71, 90, 0.959);
}
.identificador {
    font-weight: bold;
    color: rgba(13, 71, 90, 0.959);
}
.url-entrada {
    border-radius: 15px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
    width: 70%;
    margin: 1% 0 0;
    height: 2rem;
    border: 2px solid rgb(27, 100, 177);
}

.identificador-entrada {
    border-radius: 15px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
    width: 25%;
    margin:1% 0 0;
    height: 2rem;
    border: 2px solid rgb(27, 100, 177);
}

.url-form-btn {
    background-color: transparent;
    cursor: pointer;
    transition-duration: 0.3s;
    height: 2rem;
    margin: 2% 0 0 0;
    padding: 0 2%;
    border-radius: 15px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
    /* border-radius: 0 20px 0 20px; */
    border: 2px outset rgb(27, 177, 147);
    color: rgb(27, 177, 147);
    font-weight: bold;
}

.url-form-btn:hover {
    background-color: #96ceb4ff;
    font-weight: bold;
}

@media (min-width: 1024px) {
    .url-form {
        margin: 1% 0 3% 0;
    }

    .url-form-btn {
        margin: 1% 0 0 0;
    }
}
</style>
