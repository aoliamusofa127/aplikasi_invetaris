<template>
  <main>
      <div class="max-w-lg p-6 bg-white mx-auto mt-10 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">UPDATE RUANG</h5>
          <form class="max-w-sm mx-auto" @submit.prevent="updateRuangById">
              <div class="mb-5">
                  <label for="nama_ruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama_ruang</label>
                  <input type="text" id="nama_ruang" v-model="ruang.nama_ruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
              </div>
              <div class="mb-5">
                  <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">keterangan</label>
                  <input type="keterangan" id="keterangan" v-model="ruang.keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
              </div>
              <RouterLink to="/ruang" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-3">Kembali</RouterLink>
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-3">Simpan</button>
          </form>
      </div>
  </main>
</template>

<script>
import { updateRuang, getRuangById } from '../../services/ruangService';
  export default {
  props: ['ruangId'],
  data() {
    return {
      ruang:{
        nama_ruang: '',
        keterangan: ''
      }
    };
  },
  async created() {
    try {
      const ruang = await getRuangById(this.ruangId);
      this.ruang = ruang;
    } catch (error) {
      console.error('Failed to fetch ruang:', error);
    }
  },
  methods: {
    async updateRuangById() {
      try {
        const updateData = {
          nama_ruang: this.ruang.nama_ruang,
          keterangan: this.ruang.keterangan,
        };
        await updateRuang(this.ruangId, updateData);
        alert('Data berhasil diupdate!');
        this.nama_ruang = '';
        this.keterangan = '';
        this.$router.push('/ruang');
      } catch (error) {
        console.error('Gagal mengupdate data:', error);
        alert('Gagal mengupdate data');
      }
    }
  }
};
</script>
