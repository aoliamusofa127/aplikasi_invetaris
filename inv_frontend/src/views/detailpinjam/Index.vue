<template>
    <div>
        <h1 class="text-center text-green-700 text-lg mt-5 mb-5">DATA DETAIL PEMINJAMAN</h1>
        <div>
            <!-- modal add -->
            <RouterLink to="/addpeminjaman" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">
                Tambah data
            </RouterLink>
            <!-- end-modal add -->
        </div>
        
        <div class="overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama pegawai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tannggal pinjam
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal kembali
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="detailpinjam in dataDetailPinjam" :key="detailpinjam.id_pinjam" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ detailpinjam.join_to_peminjaman.join_to_pegawai.nama_pegawai }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ detailpinjam.join_to_peminjaman.tanggal_pinjam }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ detailpinjam.join_to_peminjaman.tanggal_kembali }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ detailpinjam.join_to_inventaris.nama }}
                        </th>
                        <td class="px-6 py-4">
                            {{ detailpinjam.jumlah }}
                        </td>
                        <td class="px-6 py-4">
                            <RouterLink :to="`/updatedetailpinjam/${detailpinjam.id_pinjam}`" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Edit</RouterLink>
                            <button @click="deletePeminjaman(detailpinjam.id_pinjam)" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </template>
  <script>
  import { getDataDetailPinjam} from '@/services/detailpinjamService';
    export default {
      name: 'Dashboard',
      data(){
          return{
            dataDetailPinjam:null
          }
      },
      async created(){
          try {
              this.dataDetailPinjam = await getDataDetailPinjam();
              console.log(this.dataDetailPinjam);
          } catch (error) {
              console.error('gagal load data peminjaman:', error);
          }
      },
      methods: {
      logout() {
        localStorage.removeItem('token');
        this.$router.push('/');
      },
    },
    mounted(){
      this.created
    }
  };
    </script>