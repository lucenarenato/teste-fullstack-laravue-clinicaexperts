<script setup lang="ts">
import { inject, ref } from 'vue';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons';

let serverReponse = inject("serverReponse")

let info = ref(serverReponse)

let confirm = ref()

function copyServerResponse() {
    let text = `${info.value}`;
    navigator.clipboard.writeText(text);
}

function confirmCopy() {
    confirm.value = "Copiado com sucesso!";

    setTimeout(() => {
        confirm.value = "";
    }, 3000);
}
</script>

<template>
    <section>
        
        <br>
        <p class="title-table">Painel de URLs </p>
        <table>
            <tr>
                <th>URL Encurtada</th>
                <th>#</th>
            </tr>
            <tr>
                <td class="td-one">{{ serverReponse }}</td>

                <td class="td-two">
                    <button class="copy-btn" @click="copyServerResponse()" @mouseup="confirmCopy()">Copiar</button>
                </td>
            </tr>
        </table>
        <p class="confirm">{{ confirm }}</p>
    </section>
</template>

<style scoped>
.title-table {
    text-align: center;
    font-weight: bold;
    color: rgba(13, 71, 90, 0.959);
    margin: 1% 0;
}

table {
    border-collapse: collapse;
    width: 100%;
    border-radius: 15px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

td,
th {
    border: 2px solid rgb(62, 186, 224);
    text-align: center;
    padding: 1%;
}

th {
    font-weight: bold;
    color: rgb(1, 6, 7);
}

.td-one {
    width: 60%;
}

.td-two {
    width: 40%;
}

.confirm {
    text-align: right;
    font-weight: bold;
    color: darkgreen;
}

.copy-btn {
    background-color: transparent;
    cursor: pointer;
    transition-duration: 0.3s;
    height: 1.5rem;
    margin: 4% 3%;
    /* border-radius: 0 20px 0 20px; */
    border: 2px outset rgb(27, 177, 147);
    color: rgb(27, 177, 147);
    border-radius: 15px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

.copy-btn:hover {
    background-color: #96ceb4ff;
}

@media (min-width: 1024px) {
    .td-one {
        width: 70%;
    }

    .td-two {
        width: 30%;
    }
}
</style>
