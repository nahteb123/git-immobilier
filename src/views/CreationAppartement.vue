<template>
    <div class="about">
      
      <ImageAppartCrea></ImageAppartCrea>
      <DescriptionAppartCrea></DescriptionAppartCrea>

    </div>
</template>




<script>
import ImageAppartCrea from '@/components/Crea_appart_image.vue'
import DescriptionAppartCrea from '@/components/Crea_appart_description.vue'

export default {
  name: 'UserCreaAppartement',
  components: {
    ImageAppartCrea,
    DescriptionAppartCrea

    }
  
}</script>