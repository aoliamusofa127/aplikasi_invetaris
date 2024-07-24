import apiClient from "@/axios";
export const getDataInventaris = async () => {
    try {
      const response = await apiClient.get('/allinventaris');
      return response.data.data;
    } catch (error) {
      console.error('Error fetching data inventaris:', error);
      throw error;
    }
}