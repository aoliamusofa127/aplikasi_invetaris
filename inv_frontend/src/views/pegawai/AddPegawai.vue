<template>
    <main>
        <div class="max-w-lg p-6 bg-white mx-auto mt-10 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">TAMBAH PEGAWAI</h5>
            <form class="max-w-sm mx-auto" @submit.prevent="addNewPegawai">
                <div class="mb-5 max-w-sm mx-auto">
                  <label for="opsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih user</label>
                  <select id="opsi" v-model="id_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <!-- <option disabled value=""> --pilih user-- </option> -->

                    {{ dataUser }}
                    <option v-for="user in dataUser" :key="user.id_user" :value="user.id_user">
                      {{ user.username }}
                    </option>
                  </select>
                </div>
                <div class="mb-5">
                    <label for="nama_pegawai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama pegawai</label>
                    <input type="text" id="nama_pegawai" v-model="nama_pegawai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="masukkan nama pegawai" required />
                </div>
                <div class="mb-5">
                    <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                    <input type="text" id="nip" v-model="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="masukkan nip" required />
                </div>
                <div class="mb-5">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" id="alamat" v-model="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="masukkan alamat" required />
                </div>
                <div class="mb-5">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <input type="text" id="status" v-model="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="masukkan status" required />
                </div>
                <RouterLink to="/pegawai" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-3">Kembali</RouterLink>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-3">Simpan</button>
            </form>
        </div>
    </main>

</template>

<script>
import { addPegawai, getDataUser } from '../../services/pegawaiService';

export default {
  data() {
    return {
      dataUser:null,
      id_user: '',
      nama_pegawai: '',
      nip: '',
      alamat: '',
      status: ''
    };
  },
  methods: {
    async addNewPegawai() {
      try {
        const addData = {
          id_user: this.id_user,
          nama_pegawai: this.nama_pegawai,
          nip: this.nip,
          alamat: this.alamat,
          status: this.status,
        };
        await addPegawai(addData);
        alert('data berhasil ditambahkan!');
        // Reset form fields
        this.id_user = '';
        this.nama_pegawai = '';
        this.nip = '';
        this.alamat = '';
        this.status = '';
      } catch (error) {
        console.error('gagal menambahkan data:', error);
      }
    },
    async allUser(){
        try {
            this.dataUser = await getDataUser();
            console.log(this.dataUser);
        } catch (error) {
            console.error('gagal load data user:', error);
        }
    },
    logout() {
      localStorage.removeItem('token');
      this.$router.push('/');
    },
  }
};
</script>