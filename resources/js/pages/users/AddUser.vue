<template>
    <card :title="$t('your_info')">
    <form @submit.prevent="addUser" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('info_updated')" />

      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
          <has-error :form="form" field="name" />
        </div>
      </div>

      <!-- Email -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
        <div class="col-md-7">
          <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
          <has-error :form="form" field="email" />
        </div>
      </div>
 <!-- Password -->
        <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
        <div class="col-md-7">
            <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
            <has-error :form="form" field="password" />
        </div>
        </div>

      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button :loading="form.busy" type="success">
            {{ $t('create') }}
          </v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
import Form from 'vform'
export default {
       middleware: 'auth',

  scrollToTop: false,

  metaInfo () {
    return { title: this.$t('add_user') }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: '',
       password: ''
    })
  }),
    methods: {
        async addUser () {
      // Submit the form.
      await this.form.post(route('add.user'))

      this.$router.push({ name: 'users' })
    },
    }
    }
</script>