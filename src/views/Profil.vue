<template>
  <div class="home">
    <ProfilPhoto :userId="userId" :vendeurId="vendeurId"></ProfilPhoto>
    <DescriptionProfil :userId="userId" :vendeurId="vendeurId"></DescriptionProfil>
    <AppartementProfil :userId="userId" :vendeurId="vendeurId"></AppartementProfil>
  </div>
</template>

<script>
import ProfilPhoto from '@/components/Photo_profil.vue'
import DescriptionProfil from '@/components/Info_profil.vue'
import AppartementProfil from '@/components/Appartement_profil.vue'

export default {
  name: 'UserProfil',
  components: {
    ProfilPhoto,
    DescriptionProfil,
    AppartementProfil
  },
  data() {
    return {
      userId: null,
      vendeurId: null
    }
  },
  methods: {
    // Fonction pour obtenir le token
    getToken() {
      const token = localStorage.getItem('token');
      const expirationDate = new Date(localStorage.getItem('tokenExpiration'));
      const now = new Date();

      if (!token || !expirationDate || now > expirationDate) {
        // Token est expiré ou non défini
        localStorage.removeItem('token');
        localStorage.removeItem('tokenExpiration');
        return null;
      }

      // Token est valide
      return token;
    }
  },
  created() {
    const token = this.getToken();
    if (token) {
      this.userId = localStorage.getItem('userId'); 
      this.vendeurId = localStorage.getItem('vendeurId'); 
      console.log('Token est valide :', token, this.userId, this.vendeurId);
      // Vous pouvez faire d'autres actions ici avec le token valide
    } else {
      this.$router.push({ name: 'UserConnexion' });
      // Gérer le cas où le token est expiré ou non défini
    }
  }
}
</script>