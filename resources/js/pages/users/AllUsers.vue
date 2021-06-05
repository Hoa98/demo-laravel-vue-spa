<template>
    <card :title="$t('all_users')">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>
                    <router-link :to="{name: 'add.users'}" class="btn btn-primary">Add
                        </router-link>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.created_at }}</td>
                <td>{{ user.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit.users', params: { id: user.id }}" class="btn btn-info">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </card>
</template>

<script>
   export default {
       middleware: 'auth',

	    name: 'List',
        data: function() {
	        return {}
        },
       computed: {
           users () {
               return this.$store.state.user.users;
           }
        },
        created: function () {
            this.$store.dispatch('user/fetch');
        },
        methods: {
            deleteUser: function (id) {
	            let result = confirm('Are you sure');

	            if (!result) {
                    return;
                }

                this.$store.dispatch('user/deleteUser', id);
            }
        }
    }
</script>