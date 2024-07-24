import apiClient from "@/axios";
export const getDataUser = async () => {
    try {
      const response = await apiClient.get('/alluser');
      return response.data.data;
    } catch (error) {
      console.error('Error fetching data user:', error);
      throw error;
    }
}

export const addUser = async(UserData)=>{
    try{
        const response = await apiClient.post('/adduser',UserData)
        return response.data.data;
    }catch(error){
        console.error("data gagal ditambahkan",error)
        throw error
    }
}

export async function getUserById(userId) {
    try {
      const response = await apiClient.get(`/user/${userId}`);
      return response.data.data;
    } catch (error) {
      console.error('Failed to fetch user:', error);
      throw error;
    }
}
  
export async function updateUser(userId, updateData) {
    try {
        const response = await apiClient.post(`/updateuser/${userId}`, updateData);
        return response.data.data;
    } catch (error) {
        console.error('Failed to update user:', error);
        throw error;
    }
}

export async function deleteUserById(userId) {
    try {
        const response = await apiClient.delete(`/deleteuser/${userId}`);
        return response.data;
    } catch (error) {
        console.error('Failed to delete user:', error);
        throw error;
    }
}