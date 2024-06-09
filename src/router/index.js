import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ResultatRecherche  from '../views/ResultatRecherche.vue'
import UserConnexion  from '../views/Connexion.vue'
import UserProfil  from '../views/Profil.vue'
import UserCreaAppartement  from '../views/CreationAppartement.vue'
import UserDiscussion from '../views/Discussion.vue'
import UserAppartementFavori  from '../views/AppartementFavori.vue'
import ConnexionVendeur  from '../views/Connexion_vendeur.vue'
import DetailAppartement  from '../views/DetailAppartement.vue'
import UserInscription  from '../views/Inscription.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/resultat_recherche',
    name: 'ResultatRecherche',
    component: ResultatRecherche
  },
  {
    path: '/connexion',
    name: 'UserConnexion',
    component: UserConnexion
  },
  {
    path: '/connexion_vendeur',
    name: 'VendeurConnexion',
    component: ConnexionVendeur
  },
  {
    path: '/profil',
    name: 'Profil',
    component: UserProfil
  },
  {
    path: '/crea_appart',
    name: 'UserCreaAppartement',
    component: UserCreaAppartement
  },
  {
    path: '/discussion',
    name: 'Discussion',
    component: UserDiscussion
  },
  {
    path: '/appart_favori',
    name: 'AppartFavori',
    component: UserAppartementFavori
  },
  {
    path: '/detail_appart',
    name: 'DetailAppart',
    component: DetailAppartement
  },
  {
    path: '/inscription',
    name: 'Inscription',
    component: UserInscription
  },
  
  
 
  
 
  
  
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
