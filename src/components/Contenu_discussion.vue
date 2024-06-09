<template>
  <div class="conteneur_resultat_recherche">
    <div v-for="client in clients" :key="client.date_message" :class="{ 'resultat_recherche_client': client.personne_envoye == 1, 'resultat_recherche_vendeur': client.personne_envoye == 0 }">
      <h1>Date: {{ client.date_message }}</h1>
      <h1>Message: {{ client.contenu_message }}</h1>
    </div>
    <form @submit.prevent="sendMessage">
       <input type="text" v-model="newMessage" placeholder="Votre message...">
       <button type="submit">Envoyer</button>
   </form>
  </div>
  <div class="error-message" v-if="error">{{ error }}</div>
</template>

<script>
export default {
  name: 'RechercheContenu',
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
      newMessage: ''
    };
  },

  mounted() {
    this.fetchClients();
  },
  methods: {
    async fetchClients() {
      try { 
        const typeUser = localStorage.getItem('type_user');
        console.log(JSON.stringify({ userId: this.userId, vendeurId: this.vendeurId, typeUser: typeUser }));
        const response = await fetch('http://localhost/projet_immobilier/php/Contenu_discussion.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ userId: this.userId, vendeurId: this.vendeurId, typeUser: typeUser })
        });
        const data = await response.json();
        if (data.success) {
          this.clients = data.results;
          this.resultCount = this.clients.length;
        } else {
          this.error = data.message || 'Une erreur est survenue lors de la récupération des données.';
        }
      } catch (err) {
        console.error(err);
        this.error = 'Une erreur est survenue. Veuillez réessayer.';
      }
    },
    async sendMessage() {
      try {
       
        const typeUser = localStorage.getItem('type_user'); 
        console.log(JSON.stringify({ message: this.newMessage, userId: this.userId, vendeurId: this.vendeurId,typeUser: typeUser }));
        const response = await fetch('http://localhost/projet_immobilier/php/envoyer_message.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ message: this.newMessage, userId: this.userId, vendeurId: this.vendeurId,typeUser: typeUser })
        });
        const data = await response.json();
        if (data.success) {
          // Réactualiser les messages après l'envoi du nouveau message
          this.fetchClients();
          this.newMessage = ''; // Effacer le champ d'entrée après l'envoi du message
        } else {
          this.error = data.message || 'Une erreur est survenue lors de l\'envoi du message.';
        }
      } catch (err) {
        console.error(err);
        this.error = 'Une erreur est survenue. Veuillez réessayer.';
      }
    }
  }
};
</script>

<style scoped>
.conteneur_resultat_recherche {
  display: flex;
  flex-wrap: wrap;
  background-color: #cccccc;
  flex-direction: column;
  width: 70%;
}

.resultat_recherche {
  width: 300px;
  margin: 10px;
  padding: 10px;
  border: 1px solid #ccc;
}

.resultat_recherche_client {
  background-color: #dff0d8; /* Couleur pour les messages du client */
  width: 50%;
  align-self: flex-end;
  padding: 5%;
}

.resultat_recherche_vendeur {
  background-color: #f2dede; /* Couleur pour les messages du vendeur */
  width: 50%;
  align-self: flex-start;
  padding: 5%;
}

.error-message {
  color: red;
  margin-top: 10px;
}
</style>