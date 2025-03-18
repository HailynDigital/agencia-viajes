// Sistema de objetos: Paquetes turísticos
const paquetes = [
    {
      destino: "Tokio",
      fecha: "2025-03-15",
      precio: 1500,
      disponibilidad: true,
      descripcion: "Explora la vibrante cultura japonesa en Tokio.",
    },
    {
      destino: "Nueva York",
      fecha: "2025-04-10",
      precio: 1200,
      disponibilidad: true,
      descripcion: "Descubre la ciudad que nunca duerme.",
    },
    {
      destino: "París",
      fecha: "2025-05-05",
      precio: 1300,
      disponibilidad: true,
      descripcion: "La ciudad del amor te espera.",
    },
  ];
  
  // Mostrar resultados en la página
  function search() {
    const destinationInput = document.getElementById("destination").value.toLowerCase();
    const travelDateInput = document.getElementById("travel-date").value;
  
    const resultados = paquetes.filter(paquete => {
      const coincideDestino = paquete.destino.toLowerCase().includes(destinationInput);
      const coincideFecha = paquete.fecha === travelDateInput;
      return coincideDestino && coincideFecha && paquete.disponibilidad;
    });
  
    const resultsContainer = document.getElementById("results-container");
    resultsContainer.innerHTML = ""; // Limpiar resultados anteriores
  
    if (resultados.length > 0) {
      resultados.forEach(paquete => {
        const paqueteElement = document.createElement("div");
        paqueteElement.className = "result";
        paqueteElement.innerHTML = `
          <h3>${paquete.destino}</h3>
          <p>Fecha: ${paquete.fecha}</p>
          <p>Precio: $${paquete.precio}</p>
          <p>${paquete.descripcion}</p>
        `;
        resultsContainer.appendChild(paqueteElement);
      });
    } else {
      resultsContainer.innerHTML = "<p>No se encontraron resultados.</p>";
    }
  }
  
  // Notificaciones en tiempo real
  const notificationContainer = document.createElement("div");
  notificationContainer.id = "notification-container";
  document.body.appendChild(notificationContainer);
  
  function mostrarNotificacion(mensaje, tipo = "info") {
    const notificacion = document.createElement("div");
    notificacion.className = `notification ${tipo}`;
    notificacion.innerText = mensaje;
  
    notificationContainer.appendChild(notificacion);
  
    setTimeout(() => {
      notificacion.remove();
    }, 5000);
  }
  
  function iniciarActualizacionesEnTiempoReal() {
    setInterval(() => {
      const ofertas = [
        "¡Oferta especial! 20% de descuento en viajes a Tokio.",
        "¡Promoción! 15% de descuento en paquetes a Nueva York.",
        "Reserva ahora y obtén un tour gratis en París.",
      ];
      const ofertaAleatoria = ofertas[Math.floor(Math.random() * ofertas.length)];
      mostrarNotificacion(ofertaAleatoria, "success");
    }, 10000);
  
    setInterval(() => {
      const actualizaciones = [
        "Nuevas fechas para París: 2025-04-01 al 2025-04-10.",
        "Últimos cupos para Nueva York.",
        "Tokio: Nuevos paquetes disponibles.",
      ];
      const actualizacionAleatoria = actualizaciones[Math.floor(Math.random() * actualizaciones.length)];
      mostrarNotificacion(actualizacionAleatoria, "warning");
    }, 15000);
  }
  
  document.addEventListener("DOMContentLoaded", iniciarActualizacionesEnTiempoReal);
  