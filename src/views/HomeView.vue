<template>
  <div class="home">
    <HelloWorld msg="Trouvez ici votre appartement du futur"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/Menu_accueil.vue'

export default {
  name: 'HomeView',
  components: {
    HelloWorld
  }
}
</script>
