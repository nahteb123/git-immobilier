<template>
  <div class="contenant_tri">
    <button class="bouton_mobile_affichage" type="button" @click="toggleTextVisibility" v-show="isButtonVisible">Afficher les tri</button>
    <h3 class="titre_tri" v-show="isTextVisible">Trier par:</h3>
  </div>
</template>

<script>
export default {
  name: 'RechercheTri',
  data() {
    return {
      isTextVisible: true,
      isButtonVisible: false
    };
  },
  methods: {
    toggleTextVisibility() {
      this.isTextVisible = !this.isTextVisible;
    },
    handleResize() {
      if (window.innerWidth <= 991) {
        this.isButtonVisible = true;
        this.isTextVisible = false;
      } else {
        this.isButtonVisible = false;
        this.isTextVisible = true;
      }
    }
  },
  mounted() {
    window.addEventListener('resize', this.handleResize);
    this.handleResize();
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.handleResize);
  }
};
</script>

<style>
.contenant_tri { 
  display: flex;
  background-color: #D9D9D9;
  padding: 1% 10% 3% 10%;
  margin-top: 1%;
}


.titre_tri {
  margin: 0;
}

.bouton_mobile_affichage {
  display: none;
}

@media (max-width: 991px) {
  .bouton_mobile_affichage {
    display: inline-block;
  }
  .contenant_tri { 
  display: flex;
  background-color: #D9D9D9;
  padding: 0%;
  margin-top: 1%;
}
}
</style>