<script setup lang="ts">
import api from '@/services/api';
import { provide, ref } from 'vue';
import UrlRoleRecoverDataDashboard from './UrlRoleRecoverDataDashboard.vue';

let encurt_url = ref()

let dataTotalVisits = ref()

let dataKey = ref()

let dataTitle = ref()

let warning = ref()

const axiosUrlPost = async (e: Event) => {

    e.preventDefault();
    console.log(encurt_url);
    var part = encurt_url.value.split("/");
    console.log(part[3]);
    await api.post("/short/link/" + part[3], {
        part: part[3]
    })
        .then(response => {
            if (response.status === 201) {
                dataTotalVisits.value = response.data.total_visits,
                    dataKey.value = response.data.chave,
                    dataTitle.value = response.data.title
            } else if (response.status === 200) {
                warning.value = response.data,
                    dataTotalVisits.value = "",
                    dataKey.value = "",
                    dataTitle.value = ""

                setTimeout(() => {
                    warning.value = "";
                }, 4000);
            }
        })
        .catch(function (error) {
            console.error(error);
        });
}

provide("dataTotalVisits", dataTotalVisits)
provide("dataKey", dataKey)
provide("dataTitle", dataTitle)
provide("warning", warning)
</script>

<template>
    <form class="url-form-recover" method="post" @submit="axiosUrlPost">
        <input id="url-encurt-recover" class="url-post" placeholder="Cole a URL curta aqui" type="url"
            v-model="encurt_url" required>
        <button class="url-post-btn" type="submit">Enviar</button>
    </form>
    <br>
    <UrlRoleRecoverDataDashboard />
</template>

<style scoped>
.url-post {
    width: 70%;
    height: 2rem;
    border: 2px solid rgb(27, 100, 177);
}

.url-post-btn {
    background-color: transparent;
    cursor: pointer;
    transition-duration: 0.3s;
    height: 2rem;
    margin: 0 0 0 1%;
    padding: 0 2%;
    /* border-radius: 0 20px 0 20px; */
    border: 2px outset rgb(27, 177, 147);
    color: rgb(27, 177, 147);
    font-weight: bold;
    border-radius: 25px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

.url-post-btn:hover {
    background-color: #96ceb4ff;
    font-weight: bold;
}
</style>
