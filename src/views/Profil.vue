<template>
    <div class="home">
     <ProfilPhoto></ProfilPhoto>
     <DescriptionProfil></DescriptionProfil>
     <AppartementProfil></AppartementProfil>
    </div>
  </template>
  
  

<script>
import ProfilPhoto from '@/components/Photo_profil.vue'
import DescriptionProfil from '@/components/Info_profil.vue'
import AppartementProfil from '@/components/Appartement_profil.vue'
export default {
  name: 'UserProfil',
  components: {
    ProfilPhoto,
    DescriptionProfil,
    AppartementProfil

    }
}
</script>