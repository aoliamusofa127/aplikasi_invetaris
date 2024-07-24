
<template>
    <div>
        <h1 class="text-center text-green-700 text-lg mt-5 mb-5">DATA USER</h1>
        <div>
            <!-- modal add -->
            <RouterLink to="/adduser" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">
                Tambah data
            </RouterLink>
            <!-- end-modal add -->
        </div>
        
        <div class="overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Password
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in dataUser" :key="user.id_user" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ user.username }}
                        </th>
                        <td class="px-6 py-4">
                            {{ user.password }}
                        </td>
                        <td class="px-6 py-4">
                            <RouterLink :to="`/updateuser/${user.id_user}`" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Edit</RouterLink>
                            <button @click="deleteUser(user.id_user)" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </template>
  
<script>
import { getDataUser, deleteUserById} from '@/services/dataService';
  export default {
    name: 'Dashboard',
    data(){
        return{
            dataUser:null
        }
    },
    async created(){
        try {
            this.dataUser = await getDataUser();
        } catch (error) {
            console.error('gagal load data user:', error);
        }
    },
    methods: {
    logout() {
      localStorage.removeItem('token');
      this.$router.push('/');
    },

    async deleteUser(id) {
      try {
        await deleteUserById(id);
        this.dataUser = this.dataUser.filter(user => user.id_user !== id);
      } catch (error) {
        console.error('gagal hapus data user:', error);
      }
    }
  },
  mounted(){
    this.created
  }
};
  </script>