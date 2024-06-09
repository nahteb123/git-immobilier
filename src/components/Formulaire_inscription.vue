
<template>
  <div id="app">
    <div v-if="!loggedIn">
      <form class="connexion_formulaire" @submit.prevent="login">
        <div>
          <label class="label_connexion" for="username">Email:</label>
          <input class="texte_connexion" type="text" v-model="username" required>
        </div>
        <div>
          <label for="password">Password:</label>
          <input class="texte_connexion" type="password" v-model="password" required>
        </div>
        <div>
          <label for="Nom">Nom:</label>
          <input class="texte_connexion" type="text" v-model="Nom" required>
        </div>
        <div>
          <label for="Prenom">Prenom:</label>
          <input class="texte_connexion" type="text" v-model="Prenom" required>
        </div>
        <div>
          <label for="Tel">N°Tel:</label>
          <input class="texte_connexion" type="text" v-model="Tel" required>
        </div>
        <div>
           <button type="submit">Valider</button>
          <router-link to="/connexion">Retour à la page de connexion</router-link>
          
        </div>
       
      </form>
      <p v-if="error">{{ error }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: '',
      password: '',
      Nom: '',
      Prenom: '',
      Tel: '',
      loggedIn: false,
      error: null
    };
  },
 
  methods: {
    async login() {
      this.error = null;
      try {
        console.log(JSON.stringify({ username: this.username, password: this.password, Nom: this.Nom,Prenom: this.Prenom,Tel: this.Tel }))
        const response = await fetch('http://localhost/projet_immobilier/php/inscription.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ username: this.username, password: this.password, Nom: this.Nom,Prenom: this.Prenom,Tel: this.Tel })
          
        });
        console.log(response);
        const data = await response.json();
        if (data.success) {
          this.$router.push({ name: 'UserConnexion' });

        } else {
          this.error = data.message;
        }
      } catch (err) {
        this.error = 'An error occurred. Please try again.';
      }
    },
    
  }
};
</script>

<style scoped>


label {
  display: block;
  margin-top: 10px;
}

button {
  margin-top: 20px;
}

p {
  color: red;
}
</style>