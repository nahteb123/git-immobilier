<template>
    <div class="discussion">
      <DiscussionListe></DiscussionListe>
      <DiscussionContenu></DiscussionContenu>
      <!--<DiscussionInvitation></DiscussionInvitation>-->
    </div>
</template>

<script>
import DiscussionListe from '@/components/Liste_discussion.vue'
import DiscussionContenu from '@/components/Contenu_discussion.vue'
//import DiscussionInvitation from '@/components/Invitation_discussion.vue'



export default {
  name: 'UserDiscussion',
  components: {
    DiscussionListe,
    DiscussionContenu,
    //DiscussionInvitation

    }
}</script>