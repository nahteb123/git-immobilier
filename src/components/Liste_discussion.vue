
<template>
    <div class="contenu_recherche">
      <div class="conteneur_resultat_recherche">
        <div class="contenu_liste_discussion">
          <h3 class="ajout_discussion"> Ajouter une discussion :</h3>
          <div v-for="client in clients" :key="client.id_vendeur" class="resultat_recherche">
            <h3 class="titre_liste_discussion">Vendeur {{ client.id_vendeur }}  </h3>
          </div>
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
        clients: []
      };
    },
    mounted() {
      this.fetchClients();
    },
    methods: {
      async fetchClients() {
        try {
          const response = await fetch('http://localhost/projet_immobilier/php/liste_discussion.php', {
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