<template>
  <div class="contenu_recherche">
    <h1 class="titre_rechercher">Voici les appartements associés à votre recherche:</h1>
    <h3 class="nbr_resultat_recherche">{{ resultCount }} appartements trouvés</h3>
    <div class="conteneur_resultat_recherche">
      <div v-for="appartement in appartements" :key="appartement.id_appartement" class="resultat_recherche">
        <h1>Appartement N° {{ appartement.id_appartement }}</h1>
        <h2>Adresse {{ appartement.adresse }}</h2>
        <h2>Prix: {{ appartement.loyer }}€</h2>
        <h2>Lieu: {{ appartement.id_ville }}</h2>
        <h2>Image: {{ appartement.chemin_photo }}</h2>
        <button @click="voirDetails(appartement.id_appartement)">Voir Détails</button>
      </div>
    </div>
    <div v-if="error" class="error-message">{{ error }}</div>
  </div>
</template>

<script>
export default {
  name: 'RechercheContenu',
  data() {
    return {
      resultCount: 0,
      error: '',
      appartements: []
    };
  },
  mounted() {
    this.login();
  },
  methods: {
    async login() {
      try {
        const response = await fetch('http://localhost/projet_immobilier/php/preview_recherche.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          }
        });
        const data = await response.json();
        if (data.success) {
          this.appartements = data.results; // Mettez à jour la liste des appartements avec les résultats de l'API
          this.resultCount = this.appartements.length; // Mettez à jour le nombre total d'appartements trouvés
        } else {
          this.error = data.message || 'Une erreur est survenue lors de la récupération des données.';
        }
      } catch (err) {
        console.error(err);
        this.error = 'Une erreur est survenue. Veuillez réessayer.';
      }
    },
    voirDetails(id_appartement) {
      
      this.$router.push({ name: 'DetailAppart', params: { id: id_appartement }});
    }
  }
};
</script>

<style scoped>
.conteneur_resultat_recherche {
  display: flex;
  flex-wrap: wrap;
}

.resultat_recherche {
  width: 300px;
  margin: 10px;
  padding: 10px;
  border: 1px solid #ccc;
}

.error-message {
  color: red;
  margin-top: 10px;
}
</style>