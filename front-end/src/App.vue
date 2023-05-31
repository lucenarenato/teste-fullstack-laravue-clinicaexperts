<script setup lang="ts">
import Home from './components/Home.vue';
import TheUrl from './components/TheUrl.vue';

</script>

<template>
  <header>
    

    <div class="wrapper">
      <Home msg="ShortLink" />
    </div>

    <!-- <div class="Listar">
      <List />
    </div> -->
  </header>

  <main>
    <TheUrl />
  </main>

  <footer>
    <!-- <ProjectAuthor /> -->
  </footer>
</template>

<style>
@import "./assets/base.css";

/* #app {
  max-width: 1280px;
  margin: 0 auto;
  padding: 2rem;
  font-weight: normal;
} */

header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

/* .green {
  text-decoration: none;
  color: rgb(177, 27, 27);
} */

/* @media (min-width: 1024px) { */
  /* body {
    display: grid;
    place-items: center;
  } */
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

  

  /* header {
    grid-area: header;
    display: grid;
    grid-template-areas:
      "logo"
      "wrapper"
      "Listar";
    grid-auto-flow: row;
    grid-template-rows: auto;
    align-items: center;
    border-right: 2px dashed rgb(238, 36, 36);
  } */

  /* .logo {
    grid-area: logo;
    margin: 1rem 6rem;
  } */

  header .wrapper {
    grid-area: wrapper;
    margin: 0 40px 0 0;
  }

  .Listar {
    grid-area: Listar;
    margin: 0 40px 0 0;
    align-self: start;
  }

  main {
    grid-area: main;
  }

  footer {
    grid-area: footer;
  }
/* } */
</style>
