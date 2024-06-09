<template>
    <div class="conteneur_resultat_recherche">
      <div v-for="client in clients" :key="client.date_message" class="resultat_recherche">
        <h1>Date: {{ client.date_message }}  </h1>
        <h1>Message: {{ client.contenu_message }}  </h1>
        <h1>Message: {{ client.personne_envoye }}  </h1>


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
        const response = await fetch('http://localhost/projet_immobilier/php/Contenu_discussion.php', {
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