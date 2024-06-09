

 <template>
  
  <div class="contenant_appart_image">
    <div v-for="client in clients" :key="client.chemin_photo" class="resultat_photo">
      <input type="file" class="importer_image_apartement" accept="image/png, image/jpeg" />
      <img :src="client.chemin_photo" alt="Photo d'appartement" class="recherche_photo" />
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
        const response = await fetch('http://localhost/projet_immobilier/php/creation_appartement_image.php', {
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