<template>
    <div class="conteneur_detail_appartement">
      <div v-for="client in clients" :key="client.description" class="resultat_detail_appartement">
        <h1 class="detail_description">Description: {{ client.description }}  </h1>
        <h2 class="titre_info_appartement"> Info de l'appartement :</h2>
        <div class="detail_appartement1">
           <h1 class="info_detail_appartement">Adresse: {{ client.adresse1 }}{{ client.adresse2 }}  </h1>
           <h1 class="info_detail_appartement">Surface: {{ client.surface }} m² </h1>
        </div>
        <div class="detail_appartement2">
          <h1 class="info_detail_appartement">Type Appartement: {{ client.type_appartement }}  </h1>
          <h1 class="info_detail_appartement">Loyer: {{ client.loyer }} € </h1>
        </div>
        <div class="detail_appartement3">
          <h1 class="info_detail_appartement">Ville: {{ client.nom_ville }} </h1>
          <h1 class="info_detail_appartement">Code Postal: {{ client.code_postal }}  </h1>
        </div>
      </div>
    </div>
    <div v-if="error" class="error-message">{{ error }}</div>

</template>

<script>
export default {
  name: 'RechercheContenu',
  data() {
    return {
      resultCount: 0,
      error: '',
      clients: []
    };
  },
  mounted() {
    this.fetchClients();
  },
  methods: {
    async fetchClients() {
      try {
        const response = await fetch('http://localhost/projet_immobilier/php/appartement_description.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          }
        });
        const data = await response.json();
        if (data.success) {
          this.clients = data.results; // Mettez à jour la liste des clients avec les résultats de l'API
          this.resultCount = this.clients.length; // Mettez à jour le nombre total de clients trouvés
        } else {
          this.error = data.message || 'Une erreur est survenue lors de la récupération des données.';
        }
      } catch (err) {
        console.error(err);
        this.error = 'Une erreur est survenue. Veuillez réessayer.';
      }
    },
  
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