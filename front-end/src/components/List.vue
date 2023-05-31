<script setup lang="ts">
import api from '@/services/api';
import { ref } from 'vue';

let data = ref<object[]>([])
let topOne = ref<object[]>([])
let topTwo = ref<object[]>([])
let topThree = ref<object[]>([])
let topFour = ref<object[]>([])
let topFive = ref<object[]>([])
let topSix = ref<object[]>([])
let topSeven = ref<object[]>([])
let topEight = ref<object[]>([])
let topNine = ref<object[]>([])
let topTen = ref<object[]>([])

const axiosUrlGet = async (e: Event) => {

    e.preventDefault();

    await api.get("/short/list")
        .then(async response => {
            data.value = response.data;

            topOne.value = Object.values(data.value[0]);
            topTwo.value = Object.values(data.value[1]);
            topThree.value = Object.values(data.value[2]);
            topFour.value = Object.values(data.value[3]);
            topFive.value = Object.values(data.value[4]);
            topSix.value = Object.values(data.value[5]);
            topSeven.value = Object.values(data.value[6]);
            topEight.value = Object.values(data.value[7]);
            topNine.value = Object.values(data.value[8]);
            topTen.value = Object.values(data.value[9]);
        })
        .catch(function (error) {
            console.error(error);
        });
}
</script>

<template>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <p>Listar as URLs!</p>
            </div>
            <div class="modal-body">
                <ul class="dashboard-modal" v-show="data.at(0)">
                    <button class="closed-btn" type="button" @click="data = []">Fechar</button>
                    <li>
                        <span><em>TÍTULO -</em> {{ topOne.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topOne.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topOne.at(2) }}</span>
                    </li>
                    <li>
                       
                        <span><em>TÍTULO -</em> {{ topTwo.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topTwo.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topTwo.at(2) }}</span>
                    </li>
                    <li>
                      
                        <span><em>TÍTULO -</em> {{ topThree.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topThree.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topThree.at(2) }}</span>
                    </li>
                    <li>
                       
                        <span><em>TÍTULO -</em> {{ topFour.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topFour.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topFour.at(2) }}</span>
                    </li>
                    <li>
                        
                        <span><em>TÍTULO -</em> {{ topFive.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topFive.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topFive.at(2) }}</span>
                    </li>
                    <li>
                        
                        <span><em>TÍTULO -</em> {{ topSix.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topSix.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topSix.at(2) }}</span>
                    </li>
                    <li>
                       
                        <span><em>TÍTULO -</em> {{ topSeven.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topSeven.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topSeven.at(2) }}</span>
                    </li>
                    <li>
                        
                        <span><em>TÍTULO -</em> {{ topEight.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topEight.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topEight.at(2) }}</span>
                    </li>
                    <li>
                       
                        <span><em>TÍTULO -</em> {{ topNine.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topNine.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topNine.at(2) }}</span>
                    </li>
                    <li>
                       
                        <span><em>TÍTULO -</em> {{ topTen.at(0) }}</span>
                        <span><em>URL CURTA -</em> {{ topTen.at(1) }}</span>
                        <span><em>VISITAS -</em> {{ topTen.at(2) }}</span>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="url-get-btn" type="button" @click="axiosUrlGet">Listar</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.url-get-btn {
    background-color: transparent;
    cursor: pointer;
    transition-duration: 0.3s;
    height: 2rem;
    padding: 0 2%;
    /* border-radius: 0 20px 0 20px; */
    border: 3px outset rgb(27, 177, 147);
    color: rgb(27, 177, 147);
    font-weight: bold;
    border-radius: 25px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

.url-get-btn:hover {
    background-color: #96ceb4ff;
    font-weight: bold;
}

.closed-btn {
    background-color: transparent;
    cursor: pointer;
    transition-duration: 0.3s;
    height: 2rem;
    padding: 0 2%;
    /* border-radius: 0 20px 0 20px; */
    border: 3px outset rgb(27, 177, 147);
    color: rgb(27, 177, 147);
    font-weight: bold;
    border-radius: 25px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

.closed-btn:hover {
    background-color: #96ceb4ff;
    font-weight: bold;
    border-radius: 25px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

.modal {
    width: 100%;
    height: 100%;
    padding-top: 40px;
    border-radius: 25px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

.modal-header {
    background-color: #b6b9ba;
    color: rgb(54, 121, 145);
    padding: 8px 16px;
    border-radius: 25px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

.modal-body {
    text-align: left;
    color: black;
    padding: 2px 12px;
}

.modal-footer {
    border-radius: 25px;    
}

.modal-content {
    text-align: center;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    box-shadow: -8px 9px 10px 1px rgb(27, 177, 147);
    border-radius: 25px;
    background-color: #fdfdfd;
    box-shadow: 0px 0px 15px #ccc;
}

.dashboard-modal {
    list-style: none;
    margin: 1% 0;
    padding: 0;
}

li {
    display: grid;
    margin: 2% 0;
    padding: 2% 2%;
    border-radius: 4px;
    border: 2px solid rgb(7, 87, 112);
}

.title {
    font-weight: bold;
    color: rgba(13, 71, 90, 0.959);
}

@media (min-width: 1024px) {
    .modal {
        padding-top: 0;
    }
}
</style>
