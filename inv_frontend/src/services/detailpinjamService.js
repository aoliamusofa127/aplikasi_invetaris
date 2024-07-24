import apiClient from "@/axios";
export const getDataDetailPinjam = async () => {
    try {
      const response = await apiClient.get('/alldetailpinjam');
      return response.data.data;
    } catch (error) {
      console.error('Error fetching data detail pinjaman:', error);
      throw error;
    }
}