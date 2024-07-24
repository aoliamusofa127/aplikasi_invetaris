import apiClient from "@/axios";
export const getDataRuang = async () => {
    try {
      const response = await apiClient.get('/allruang');
      return response.data.data;
    } catch (error) {
      console.error('Error fetching data ruang:', error);
      throw error;
    }
}

export const addRuang = async(RuangData)=>{
    try{
        const response = await apiClient.post('/addruang',RuangData)
        return response.data.data;
    }catch(error){
        console.error("data gagal ditambahkan",error)
        throw error
    }
}

export async function getRuangById(ruangId) {
    try {
      const response = await apiClient.get(`/ruang/${ruangId}`);
      return response.data.data;
    } catch (error) {
      console.error('Failed to fetch ruang:', error);
      throw error;
    }
}
  
export async function updateRuang(ruangId, updateData) {
    try {
        const response = await apiClient.post(`/updateruang/${ruangId}`, updateData);
        return response.data.data;
    } catch (error) {
        console.error('Failed to update ruang:', error);
        throw error;
    }
}

export async function deleteRuangById(ruangId) {
    try {
        const response = await apiClient.delete(`/deleteruang/${ruangId}`);
        return response.data.data;
    } catch (error) {
        console.error('Failed to delete ruang:', error);
        throw error;
    }
}