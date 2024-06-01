
<template>
    <form class="connexion_formulaire" @submit.prevent="sendData">
      <label class="label_connexion">Email</label>
      <input type="text" class="texte_connexion" v-model="email"  />
      <label class="label_connexion">Mot de passe</label>
      <input type="password" class="texte_connexion" v-model="password"/>
      <input type="submit" class="Valider_connexion"/>
    </form>
    <router-link to="/connexion_vendeur">Connexion</router-link>|

  </template>
<script>
export default {
  name: 'ConnexionFormulaire',
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    async sendData() {
      const data = {
        email: this.email,
        password: this.password
      };
      
        console.log(JSON.stringify(data));
        const response = await fetch('http://localhost/php/connexion.php', {
          method: 'POST',
          mode: "no-cors",
          body: JSON.stringify(data)
        });
        console.log(response);
      } 
    }
  
};
</script>