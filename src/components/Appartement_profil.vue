<template>
  <div class="contenant_appartement_profil">
    <div v-for="client in clients" :key="client.id_appartement" class="resultat_appartement_profil">
      <h1>Appartement N° {{ client.id_appartement }}</h1>
      <img :src="client.chemin_photo" alt="Photo d'appartement" class="recherche_photo" />
    </div>
    <div v-for="vendeur in vendeurs" :key="vendeur.id_appartement" class="resultat_appartement_profil">
      <h1>Appartement N° {{ vendeur.id_appartement }}</h1>
      <img :src="vendeur.chemin_photo" alt="Photo d'appartement" class="recherche_photo" />
    </div>
    <router-link to="/crea_appart" class="bouton_lien_crea_appart">Ajouter un nouvel appartement ici</router-link>
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
        const response = await fetch('http://localhost/projet_immobilier/php/liste_appartement_profil.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ userId: this.userId })
        });
        const data = await response.json();
        if (data.success) {
          this.clients = data.results; // Mettez à jour la liste des clients avec les résultats de l'API
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
        const response = await fetch('http://localhost/projet_immobilier/php/liste_appartement_vendeur.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ vendeurId: this.vendeurId })
        });
        const data = await response.json();
        if (data.success) {
          this.vendeurs = data.results; // Mettez à jour la liste des vendeurs avec les résultats de l'API
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