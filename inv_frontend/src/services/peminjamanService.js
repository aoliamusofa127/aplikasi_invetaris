import apiClient from "@/axios";
export const getDataPeminjaman = async () => {
    try {
      const response = await apiClient.get('/allpeminjaman');
      return response.data.data;
    } catch (error) {
      console.error('Error fetching data peminjaman:', error);
      throw error;
    }
}