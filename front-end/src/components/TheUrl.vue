<script setup lang="ts">
import UrlItem from './UrlItem.vue'
import List from './List.vue';
import UrlCreate from './UrlCreate.vue';
import UrlRoleRecoverData from './UrlRoleRecoverData.vue';
import UrlExcluir from './UrlExcluir.vue';
// import Vuetable from './Vuetable.vue';


</script>

<template>
  <UrlItem>
    <template #icon>
      <!-- <CommunityIcon /> -->
    </template>
   
    <UrlCreate />
  </UrlItem>

  <UrlItem>
    <template #icon>
      <!-- <DocumentationIcon /> -->
    </template>
    <template #heading>Resgatar informações das URLs</template>
    <UrlRoleRecoverData />
  </UrlItem>

  <UrlItem>
    <template #icon>
      <!-- <EcosystemIcon /> -->
    </template>
    <template #heading>Excluir informações das URLs curtas</template>
    <br>
    <br>
    <UrlExcluir />
  </UrlItem>

  <UrlItem>
    
    <br>
    <List />
  </UrlItem>
  
</template>
