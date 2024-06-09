<template>
  <div>
    <form @submit.prevent="submitClient">
      <div class="crea_appart1">
        <label for="description">Description:</label>
        <input type="text" id="description" class="input_appart" v-model="newClient.description" required>
      </div>
      <div class="crea_appart1">
        <label for="adresse1">Adresse 1:</label>
        <input type="text" id="adresse1" class="input_appart" v-model="newClient.adresse1" required>
      </div>
      <div class="crea_appart1">
        <label for="adresse2">Adresse 2:</label>
        <input type="text" id="adresse2" class="input_appart" v-model="newClient.adresse2">
      </div>
      <div class="crea_appart1">
        <label for="surface">Surface:</label>
        <input type="number" id="surface" class="input_appart" v-model="newClient.surface" required>
      </div>
      <div class="crea_appart1">
        <label for="type_appartement">Type Appartement:</label>
        <input type="text" id="type_appartement" class="input_appart" v-model="newClient.type_appartement" required>
      </div>
      <div class="crea_appart1">
        <label for="loyer">Loyer:</label>
        <input type="number" id="loyer" class="input_appart" v-model="newClient.loyer" required>
      </div>
      <div class="crea_appart1">
        <label for="nom_ville">Ville:</label>
        <input type="text" id="nom_ville" class="input_appart" v-model="newClient.nom_ville" required>
      </div>
      <div class="crea_appart1">
        <label for="code_postal">Code Postal:</label>
        <input type="text" id="code_postal" class="input_appart" v-model="newClient.code_postal" required>
      </div>
      
      <button class="crea_appart1" type="submit">Ajouter</button>
    </form>

    <div v-if="error" class="error-message">{{ error }}</div>
    <div v-if="success" class="success-message">{{ success }}</div>
  </div>
</template>

<script>
export default {
  name: 'InsertionClient',
  data() {
    return {
      newClient: {
        description: '',
        adresse1: '',
        adresse2: '',
        surface: 0,
        type_appartement: '',
        loyer: 0,
        nom_ville: '',
        code_postal: ''
      },
      error: '',
      success: ''
    };
  },
  methods: {
    async submitClient() {
      try {
        const response = await fetch('http://localhost/projet_immobilier/php/creation_appartement_description.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(this.newClient)
        });
        const data = await response.json();
        if (data.success) {
          this.success = 'Les données ont été ajoutées avec succès.';
          this.newClient = { // Réinitialiser le formulaire
            description: '',
            adresse1: '',
            adresse2: '',
            surface: 0,
            type_appartement: '',
            loyer: 0,
            nom_ville: '',
            code_postal: ''
          };
        } else {
          this.error = data.message || 'Une erreur est survenue lors de l\'ajout des données.';
          this.success = '';
        }
      } catch (err) {
        console.error(err);
        this.error = 'Une erreur est survenue. Veuillez réessayer.';
        this.success = '';
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