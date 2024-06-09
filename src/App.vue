<router-link to="/connexion">Connexion</router-link>|

<template>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <nav class="version_ordinateur">
    <router-link to="/">Accueil</router-link> |
    <router-link to="/resultat_recherche">Tous les appartements</router-link>|
    <router-link to="/appart_favori">Voir les appartements favoris</router-link>|
    <router-link to="/crea_appart">Créer un appartement</router-link>|
    <router-link to="/profil">Voir son profil</router-link>|
    <router-link to="/discussion">Voir ses discussions</router-link>|
    <router-link to="/connexion">Connexion</router-link>|
    <button @click="deconnexion">Déconnexion</button>
  </nav>
  <nav class="version_mobile">
    <button class="favorite styled" type="button" @click="toggleMobileMenu">Menu</button>
    <div class="menu_mobile" v-show="isMobileMenuVisible">
      <router-link to="/">Accueil</router-link> 
      <router-link to="/resultat_recherche">Tous les appartements</router-link>
      <router-link to="/appart_favori">Voir les appartements favoris</router-link>
      <router-link to="/crea_appart">Créer un appartement</router-link>
      <router-link to="/profil">Voir son profil</router-link>
      <router-link to="/discussion">Voir ses discussions</router-link>
      <router-link to="/connexion">Connexion</router-link>
      <button @click="deconnexion">Déconnexion</button>
    </div>
  </nav>
  <router-view/>
</template>

<script>
export default {
  data() {
    return {
      isMobileMenuVisible: false
    };
  },
  methods: {
    toggleMobileMenu() {
      this.isMobileMenuVisible = !this.isMobileMenuVisible;
    },
    deconnexion() {
     
      this.loggedIn = false;
      localStorage.removeItem('token');
      localStorage.removeItem('tokenExpiration');
      localStorage.removeItem('userId');
    }
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

@media screen and (max-width: 992px) {
  .version_ordinateur {
     display: none;
  }
  nav.version_mobile {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
  }
  .menu_mobile a {
    width: 100%;
    display: inline-block;
  }
}

@media screen and (min-width: 991px) {
  .version_ordinateur {
    display: block;
  }
  .version_mobile {
    display: none;
  }
}
</style>