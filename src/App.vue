<template>
  <nav>
    <router-link to="/">Accueil</router-link> |
    <router-link to="/resultat_recherche">Tous les appartements</router-link>|
    <router-link to="/appart_favori">Voir les appartements favoris</router-link>|
    <router-link to="/crea_appart">Créer un appartement</router-link>|
    <router-link to="/profil">Voir son profil</router-link>|
    <router-link to="/discussion">Voir ses discussions</router-link>|
    <router-link to="/connexion">Connexion</router-link>|
   
  </nav>
  <router-view/>
</template>

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
</style>
