<template>
    <div class="connexion">
      <h1 class="titre_connexion">Page Connexion</h1>
      <ConnexionFormulaire></ConnexionFormulaire>
    </div>
</template>



<script>
import ConnexionFormulaire from '@/components/Formulaire_connexion.vue'
export default {
  name: 'UserConnexion',
  components: {
    ConnexionFormulaire

    }
  
}</script>