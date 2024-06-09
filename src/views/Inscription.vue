<template>
  <div class="connexion">
    <h1 class="titre_connexion">Page Inscription</h1>
    <InscriptionFormulaire></InscriptionFormulaire>
  </div>
</template>



<script>
import InscriptionFormulaire from '@/components/Formulaire_inscription.vue'
export default {
name: 'UserInscription',
components: {
  InscriptionFormulaire

  }

}</script>