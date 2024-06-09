<template>
    <div class="Recherche">
    <!--<RechercheTri></RechercheTri>-->
    <RechercheContenu></RechercheContenu>
    </div>
  </template>
  
  

<script>
//import RechercheTri from '@/components/Tri_recherche.vue'
import RechercheContenu from '@/components/Contenu_recherche.vue'

export default {
  name: 'ResultatRecherche',
  components: {
    //RechercheTri,
    RechercheContenu

    }
}
</script>