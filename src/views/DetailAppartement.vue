<template>
    <div class="Conteneur_appart">
    <PhotoAppartementDetail></PhotoAppartementDetail>
    <DescriptionAppartementDetail></DescriptionAppartementDetail>
    
    </div>
  </template>
  
  

<script>
import DescriptionAppartementDetail from '@/components/Detail_appartement_description.vue'
import PhotoAppartementDetail from '@/components/Detail_appartement_photo.vue'

export default {
  name: 'DetailAppartement',
  components: {
    DescriptionAppartementDetail,
    PhotoAppartementDetail

    }
}
</script>