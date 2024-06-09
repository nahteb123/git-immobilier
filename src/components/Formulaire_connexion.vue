
<template>
  <div id="app">
    <div v-if="!loggedIn">
      <h1 class="titre_connexion">Page Connexion Client</h1>
      <form class="connexion_formulaire" @submit.prevent="login">
        <div>
          <label class="label_connexion" for="username">Email:</label>
          <input class="texte_connexion" type="text" v-model="username" required>
        </div>
        <div>
          <label for="password">Password:</label>
          <input class="texte_connexion" type="password" v-model="password" required>
        </div>
        <div class="menu_connexion">
          <router-link to="/inscription">S'inscrire</router-link>
          <router-link to="/connexion_vendeur">Voir la page Vendeur</router-link>
          <button type="submit">Login</button>
        </div>
       
      </form>
      <p v-if="error">{{ error }}</p>
    </div>
    <div v-else>
      <h2>Welcome, {{ username }}!</h2>
      <button @click="logout">Logout</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: '',
      password: '',
      loggedIn: false,
      error: null
    };
  },
  methods: {
    async login() {
      this.error = null;
      try {
        const response = await fetch('http://localhost/projet_immobilier/php/connexion.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ username: this.username, password: this.password })
        });
        const data = await response.json();
        if (data.success) {
          this.loggedIn = true;
          const now = new Date();
          const expirationDate = new Date(now.getTime() + 60000*15);
          localStorage.setItem('token', data.token);
          localStorage.setItem('tokenExpiration', expirationDate.toISOString());
          localStorage.setItem('type_user', "client"); 
          localStorage.setItem('userId', data.userId); 
         
          this.$router.push({ name: 'home' });

        } else {
          this.error = data.message;
        }
      } catch (err) {
        this.error = 'An error occurred. Please try again.';
      }
    },
    logout() {
      this.loggedIn = false;
      localStorage.removeItem('token');
      localStorage.removeItem('tokenExpiration');
      localStorage.removeItem('userId');
      this.$router.push({ name: 'login' });
    }
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