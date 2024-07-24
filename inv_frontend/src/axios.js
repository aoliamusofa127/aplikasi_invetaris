import axios from 'axios';

// Buat instance axios
const apiClient = axios.create({
  baseURL: 'http://127.0.0.1:8000/api/', // Ganti dengan URL API Anda
  headers: {
    'Content-Type': 'application/json',
    // Tambahkan header lain jika diperlukan
  }
});

// Tambahkan interceptor untuk menyisipkan token pada setiap permintaan
apiClient.interceptors.request.use(config => {
  const token = localStorage.getItem('token'); // Atau metode lain untuk mendapatkan token
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
}, error => {
  return Promise.reject(error);
});

export default apiClient;