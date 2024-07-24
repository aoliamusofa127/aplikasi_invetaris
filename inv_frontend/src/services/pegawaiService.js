import apiClient from "@/axios";
export const getDataPegawai = async () => {
    try {
      const response = await apiClient.get('/allpegawai');
      return response.data.data;
    } catch (error) {
      console.error('Error fetching data pegawai:', error);
      throw error;
    }
}

export const addPegawai = async(PegawaiData)=>{
    try{
        const response = await apiClient.post('/addpegawai',PegawaiData)
        return response.data.data;
    }catch(error){
        console.error("data gagal ditambahkan",error)
        throw error
    }
}

// export async function getPegawaiById(pegawaiId) {
//     try {
//       const response = await apiClient.get(`/pegawai/${pegawaiId}`);
//       return response.data.data;
//     } catch (error) {
//       console.error('Failed to fetch pegawai:', error);
//       throw error;
//     }
// }
  
// export async function updatePegawai(pegawaiId, updateData) {
//     try {
//         const response = await apiClient.post(`/updatepegawai/${pegawaiId}`, updateData);
//         return response.data.data;
//     } catch (error) {
//         console.error('Failed to update pegawai:', error);
//         throw error;
//     }
// }

// export async function deletePegawaiById(pegawaiId) {
//     try {
//         const response = await apiClient.delete(`/deletepegawai/${pegawaiId}`);
//         return response.data;
//     } catch (error) {
//         console.error('Failed to delete pegawai:', error);
//         throw error;
//     }
// }

export const getDataUser = async () => {
  try {
    const response = await apiClient.get('/alluser');
    return response.data.data;
  } catch (error) {
    console.error('Error fetching data user:', error);
    throw error;
  }
}