
<template>
  <h1>{{ msg }}</h1>
  <div class="menu_action">
      <a class="bouton_acceuil1" href="https://vitejs.dev/" target="_blank" rel="noopener">Acheter</a> 
      <a class="bouton_acceuil2" href="https://vuejs.org/" target="_blank" rel="noopener">Louer</a>
      <a class="bouton_acceuil3" href="https://vitejs.dev/" target="_blank" rel="noopener">Vendre</a> 
  </div>

  <div class="conteneur_formulaire">
    <form class="formulaire_accueil">
        <label>Où souhaiter vous acheter?</label>
        <div class="input_accueil">
          <input class="input_accueil" type="text" name="name" id="name" />
        <input class="submit_accueil" type="submit" value="Rechercher" />
      </div>
    </form>
        
        
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
