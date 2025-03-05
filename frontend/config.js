// const API_URL = "http://localhost:8000"; // Mude isso no Docker

const API_URL = window.location.hostname.includes("localhost")
  ? "http://localhost:8000"  // Se estiver rodando localmente
  : "http://backend:80";      // Se estiver rodando dentro do Docker


// const API_URL = "http://backend:80"; // Comunicação interna no Docker

export default API_URL;
