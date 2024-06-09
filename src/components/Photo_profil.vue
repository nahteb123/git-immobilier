<template>
  <div class="contenant_photo_profil">
    <div v-for="client in clients" :key="client.Nom_Client" class="resultat_profil_photo">
      <img :src="client.chemin_photo" alt="Photo d'appartement" class="recherche_photo" />
      <h1 class="profil_identité">{{ client.Nom_Client }} {{ client.Prenom_Client }} </h1>
    </div>
    <div v-for="vendeur in vendeurs" :key="vendeur.Nom_Client" class="resultat_profil_photo">
      <img :src="vendeur.chemin_photo" alt="Photo d'appartement" class="recherche_photo" />
      <h1 class="profil_identité">{{ vendeur.Nom_Vendeur }} {{ vendeur.Prenom_Vendeur }} </h1>
    </div>
    <div v-if="error" class="error-message">{{ error }}</div>
  </div>
</template>

<script>
export default {
  name: 'ProfilPhoto',
  props: {
    userId: {
      type: String
    },
    vendeurId: {
      type: String
    }
  },
  data() {
    return {
      resultCount: 0,
      error: '',
      clients: [],
      vendeurs: []
    };
  },
  mounted() {
    this.fetchUserProfile();
  },
  methods: {
    async fetchClientsInfo() {
      try {
        const response = await fetch('http://localhost/projet_immobilier/php/profil_photo.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ userId: this.userId })
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
    async fetchVendeurInfo() {
      
      try {
        const response = await fetch('http://localhost/projet_immobilier/php/profil_photo_vendeur.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ vendeurId: this.vendeurId })
        });
        const data = await response.json();
        if (data.success) {
          this.vendeurs = data.results; // Mettez à jour la liste des vendeurs avec les résultats de l'API
          this.resultCount = this.vendeurs.length; // Mettez à jour le nombre total de vendeurs trouvés
        } else {
          this.error = data.message || 'Une erreur est survenue lors de la récupération des données.';
        }
      } catch (err) {
        console.error(err);
        this.error = 'Une erreur est survenue. Veuillez réessayer.';
      }
    },
    fetchUserProfile() {
      const typeUser = localStorage.getItem('type_user');
      if (typeUser === 'vendeur' && this.vendeurId) {
        this.fetchVendeurInfo();
      } else {
        this.fetchClientsInfo();
      }
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