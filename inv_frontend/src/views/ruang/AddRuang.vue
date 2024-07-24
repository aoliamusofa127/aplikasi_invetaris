<template>
    <main>
        <div class="max-w-lg p-6 bg-white mx-auto mt-10 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">TAMBAH RUANG</h5>
            <form class="max-w-sm mx-auto" @submit.prevent="addNewRuang">
                <div class="mb-5">
                    <label for="nama_ruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama_ruang</label>
                    <input type="text" id="nama_ruang" v-model="nama_ruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="masukkan nama ruang" required />
                </div>
                <div class="mb-5">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">keterangan</label>
                    <input type="keterangan" id="keterangan" v-model="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="masukkan keterangan" required />
                </div>
                <RouterLink to="/ruang" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-3">Kembali</RouterLink>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-3">Simpan</button>
            </form>
        </div>
    </main>

</template>

<script>
import { addRuang } from '../../services/ruangService';

export default {
  data() {
    return {
      nama_ruang: '',
      keterangan: ''
    };
  },
  methods: {
    async addNewRuang() {
      try {
        const addData = {
          nama_ruang: this.nama_ruang,
          keterangan: this.keterangan,
        };
        await addRuang(addData);
        alert('data berhasil ditambahkan!');
        // Reset form fields
        this.nama_ruang = '';
        this.keterangan = '';
      } catch (error) {
        console.error('gagal menambahkan data:', error);
      }
    }
  }
};
</script>