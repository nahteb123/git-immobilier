<template>
    <div class="home">
    <FavoriTri></FavoriTri>
    <FavoriContenu></FavoriContenu>
    </div>
  </template>
  
  
  
  <script>
  import FavoriTri from '@/components/Tri_favori.vue'
  import FavoriContenu from '@/components/Contenu_favori.vue'
  
  export default {
  name: 'UserAppartementFavori',
  components: {
    FavoriTri,
    FavoriContenu
  
    }
  }
  </script>
  
