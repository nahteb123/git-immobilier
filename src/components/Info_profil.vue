<template>
  <div class="contenant_description_profil">
    <h2 class="titre_description_profil">Informations personnelles :</h2>
    <div v-for="client in clients" :key="client.adresse_mail" class="resultat_info_profil">
      <div class="detail_appartement1">
        <h2 class="info_detail_appartement">Mail: {{ client.adresse_mail }}</h2>
        <h2 class="info_detail_appartement">Téléphone: {{ client.numéro_tel }}</h2>
      </div>
      <div class="detail_appartement2">
        <h2 class="info_detail_appartement">Ville: {{ client.nom_ville }}</h2>
        <h2 class="info_detail_appartement">Code postal: {{ client.code_postal }}</h2>
      </div>
    </div>
    <div v-for="vendeur in vendeurs" :key="vendeur.adresse_mail" class="resultat_info_profil">
      <div class="detail_appartement1">
        <h2 class="info_detail_appartement">Mail: {{ vendeur.adresse_mail }}</h2>
        <h2 class="info_detail_appartement">Téléphone: {{ vendeur.numéro_tel }}</h2>
      </div>
      <div class="detail_appartement2">
        <h2 class="info_detail_appartement">Ville: {{ vendeur.nom_ville }}</h2>
        <h2 class="info_detail_appartement">Code postal: {{ vendeur.code_postal }}</h2>
      </div>
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
        const response = await fetch('http://localhost/projet_immobilier/php/info_profil.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ userId: this.userId })
        });
        const data = await response.json();
        if (data.success) {
          this.clients = data.results; // Mettre à jour la liste des clients avec les résultats de l'API
        } else {
          this.error = data.message || 'Une erreur est survenue lors de la récupération des données.';
        }
      } catch (err) {
        console.error(err);
        this.error = 'Une erreur est survenue. Veuillez réessayer.';
      }
    },
    async fetchVendeurInfo() {
      console.log(JSON.stringify({ vendeurId: this.vendeurId }));
      try {
        const response = await fetch('http://localhost/projet_immobilier/php/info_vendeur.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ vendeurId: this.vendeurId })
        });
        const data = await response.json();
        if (data.success) {
          this.vendeurs = data.results; // Mettre à jour la liste des vendeurs avec les résultats de l'API
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
      if (typeUser === 'vendeur') {
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