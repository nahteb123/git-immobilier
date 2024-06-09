<template>
    <div class="connexion">
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