<template>
    <div class="connexion">
      <h1 class="titre_connexion">Page Connexion</h1>
      <ConnexionFormulaireVendeur></ConnexionFormulaireVendeur>
    </div>
</template>



<script>
import ConnexionFormulaireVendeur from '@/components/ConnexionFormulaireVendeur.vue'
export default {
  name: 'ConnexionVendeur',
  components: {
    ConnexionFormulaireVendeur

    }
  
}</script>