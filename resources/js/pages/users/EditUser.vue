<template>
      <card :title="$t('your_info')">
    <form @submit.prevent="updateUser">

      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input v-model="user.name" class="form-control" type="text" name="name">
        </div>
      </div>

      <!-- Email -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
        <div class="col-md-7">
          <input v-model="user.email" class="form-control" type="email" name="email">
        </div>
      </div>
 
      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button type="success">
            {{ $t('update') }}
          </v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
       middleware: 'auth',
    metaInfo () {
    return { title: this.$t('update_user') }
  },

  data: function() {
	        return {

          }
        },
    computed: mapGetters({
      user: 'user/user'
  }),
   
   created()  {
       this.$store.dispatch('user/fetchOne',this.$route.params.id);
    },
    methods: {
        updateUser () {
        // Submit the form.
        this.$store.dispatch('user/editUser',this.user);

        // Redirect home.
        this.$router.push({ name: 'users' })
        },
    }
  }
</script>