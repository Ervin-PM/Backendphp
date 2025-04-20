<?php
// Iniciamos la sesión
session_start();

// Obtenemos la ruta de la solicitud
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Coningenio - Consultoría y Desarrollo de Software</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #003366;
      --secondary-color: #006699;
      --background-color: #f8f9fa;
      --text-color: #333;
    }

    [data-theme="dark"] {
      --primary-color: #222;
      --secondary-color: #444;
      --background-color: #121212;
      --text-color: #f8f9fa;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: var(--background-color);
      color: var(--text-color);
      margin-top: 0px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    header {
      background-color: var(--primary-color);
      color: #fff;
      padding: 15px 0;
    }

    .logo-large {
      display: block;
      margin: 0 auto 15px;
      max-width: 400px;
      transition: opacity 0.3s ease;
    }

    .navbar-brand img {
      height: 40px;
      transition: opacity 0.3s ease;
    }

    .btn-toggle-theme {
      background-color: var(--secondary-color);
      color: #fff;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }

    .btn-toggle-theme:hover {
      background-color: var(--primary-color);
    }

    footer {
      background-color: var(--primary-color);
      color: #fff;
      text-align: center;
      padding: 10px 0; /* Footer más delgado */
    }

    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
      transform: translateY(-5px);
      transition: transform 0.3s ease;
    }

    .form-control:invalid {
      border-color: red;
    }

    .form-control:valid {
      border-color: green;
    }

    /* Estilos para el mapa */
    #map iframe {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Estilos para el pie de página */
    footer .contact-info {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      text-align: center;
    }

    footer .contact-info div {
      flex: 1 1 200px;
      margin: 10px;
    }

    footer .contact-info a {
      color: #fff;
      text-decoration: none;
    }

    footer .contact-info a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body data-theme="light">
  <header>
    <!-- Logo grande sobre la navbar -->
    <img id="logo-large" class="logo-large" src="http://localhost/backend/img/logo-grande.png" alt="Logo Grande Coningenio">

    <nav class="navbar navbar-expand-lg navbar-dark container">
      <a class="navbar-brand d-flex align-items-center" href="#home">
        <!-- Logo dinámico -->
        <img id="logo" src="http://localhost/backend/img/con-ingenio-solo-blanco.png" alt="Logo Coningenio">
        <span id="typing-effect" class="ms-3 text-light"></span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Nuestros Servicios</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
        </ul>
        <!-- Botón Día/Noche -->
        <button class="btn btn-toggle-theme ms-3" onclick="toggleTheme()">Modo Día/Noche</button>
      </div>
    </nav>
  </header>

  <main class="container my-5">
    <!-- Slider para "Nuestros Servicios" -->
    <section id="services" class="mb-5">
      <div class="container">
        <h2 class="text-center mb-4">Nuestros Servicios</h2>
        <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel">
          <div id="services-content" class="carousel-inner"></div>
          <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </section>

    <!-- Slider para "Nosotros" -->
    <section id="about" class="mb-5">
      <h2 class="text-center mb-4">Nosotros</h2>
      <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
        <div id="about-content" class="carousel-inner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </section>

    <!-- Formulario de contacto -->
    <section id="contact" class="py-5">
      <h2 class="text-center mb-4">Contáctanos</h2>
      <form id="contactForm" class="row g-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Nombre Completo</label>
          <input type="text" id="name" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="service" class="form-label">Selecciona un Servicio</label>
          <select id="service" class="form-select" required>
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="Consultoría Digital">Consultoría Digital</option>
            <option value="Soluciones Multiexperiencia">Soluciones Multiexperiencia</option>
          </select>
        </div>
        <div class="col-12">
          <label for="message" class="form-label">Mensaje</label>
          <textarea id="message" class="form-control" rows="4" required></textarea>
        </div>
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </section>

    <!-- Mapa de Google Maps -->
    <section id="map" class="py-5">
      <div class="container">
        <h2 class="text-center mb-4">Ubicación</h2>
        <div class="d-flex justify-content-center">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.7788022525247!2d-70.62355162415234!3d-33.42901079641479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf62a2cb75c3%3A0x6c84dd8e2bc13a00!2sAv.%20Providencia%201234%2C%207500571%20Providencia%2C%20Santiago%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses!2scl!4v1745116208811!5m2!1ses!2scl" 
            width="100%" 
            height="350" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </section>
  </main>

  <!-- Pie de página -->
  <footer class="py-2">
    <div class="container">
      <div class="contact-info">
        <div>
          <h6>Dirección</h6>
          <p>Av. Providencia 1234, Oficina 601<br>Providencia, Santiago<br>Chile</p>
        </div>
        <div>
          <h6>Teléfono</h6>
          <p>+56 2 1234 5678</p>
        </div>
        <div>
          <h6>Página web</h6>
          <p><a href="http://www.coningenio.cl" target="_blank">www.coningenio.cl</a></p>
        </div>
        <div>
          <h6>Correo electrónico</h6>
          <p><a href="mailto:info@coningenio.cl">info@coningenio.cl</a></p>
        </div>
      </div>
      <p class="mt-3">&copy; <?php echo date("Y"); ?> Coningenio. Todos los derechos reservados.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Alternar entre modo día y noche
    function toggleTheme() {
      const body = document.body;
      const currentTheme = body.getAttribute('data-theme');
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      body.setAttribute('data-theme', newTheme);

      // Cambiar el logo según el tema
      const logo = document.getElementById('logo');
      const logoLarge = document.getElementById('logo-large');
      if (newTheme === 'dark') {
        logo.src = 'http://localhost/backend/img/con-ingenio-solo-blanco.png'; // Logo pequeño para tema oscuro
        logoLarge.src = 'http://localhost/backend/img/logo-grande-letras-blanco.png'; // Logo grande para tema oscuro
      } else {
        logo.src = 'http://localhost/backend/img/con-ingenio-solo-colores.png'; // Logo pequeño para tema claro
        logoLarge.src = 'http://localhost/backend/img/logo-grande.png'; // Logo grande para tema claro
      }
    }

    // Efecto de tipado
    function typeEffect(element, text, speed) {
      let i = 0;
      element.innerHTML = ''; // Limpia el contenido antes de cada ejecución
      function typing() {
        if (i < text.length) {
          element.innerHTML += text.charAt(i);
          i++;
          setTimeout(typing, speed);
        }
      }
      typing();
    }

    document.addEventListener('DOMContentLoaded', function () {
      const typingElement = document.getElementById('typing-effect');
      const text = 'ConIngenio.cl';
      const speed = 100;

      // Efecto de tipado cada 5 segundos
      typeEffect(typingElement, text, speed);
      setInterval(() => {
        typeEffect(typingElement, text, speed);
      }, 5000);

      loadServices();
      loadAboutUs();
    });

    // Validar y mostrar datos del formulario en la consola
    document.getElementById('contactForm').addEventListener('submit', function (event) {
      event.preventDefault();

      const name = document.getElementById('name').value.trim();
      const service = document.getElementById('service').value;
      const message = document.getElementById('message').value.trim();

      if (!name || !service || !message) {
        alert('Por favor, completa todos los campos.');
        return;
      }

      console.log('Formulario Enviado:');
      console.log('Nombre:', name);
      console.log('Servicio:', service);
      console.log('Mensaje:', message);
      alert('Formulario enviado correctamente.');
    });

    // Función para realizar solicitudes a la API con proxy
    async function fetchData(endpoint) {
      const proxyURL = "https://cors-anywhere.herokuapp.com/"; // Proxy para evitar problemas de CORS
      try {
        const response = await fetch(proxyURL + endpoint, {
          method: 'GET',
          headers: { 'Authorization': 'Bearer ciisa' }
        });
        if (!response.ok) {
          throw new Error('Error en la solicitud: ' + response.status);
        }
        return await response.json();
      } catch (error) {
        console.error(error);
        return null;
      }
    }

    // Cargar servicios dinámicamente desde la API
    async function loadServices() {
      const data = await fetchData('https://ciisa.coningenio.cl/v1/services/');
      const container = document.getElementById('services-content');
      if (data && Array.isArray(data.data)) {
        let html = '';
        data.data.forEach((service, index) => {
          html += `
            <div class="carousel-item ${index === 0 ? 'active' : ''}">
              <div class="card h-100 d-flex justify-content-center align-items-center text-center">
                <div class="card-body">
                  <h5 class="card-title">${service.titulo.esp}</h5>
                  <p class="card-text">${service.descripcion.esp}</p>
                </div>
              </div>
            </div>
          `;
        });
        container.innerHTML = html;
      } else {
        container.innerHTML = '<div class="carousel-item active"><p class="text-danger">No se pudieron cargar los servicios.</p></div>';
      }
    }

    // Cargar información de "Nosotros" desde la API
    async function loadAboutUs() {
      const data = await fetchData('https://ciisa.coningenio.cl/v1/about-us/');
      const container = document.getElementById('about-content');
      if (data && Array.isArray(data.data)) {
        let html = '';
        data.data.forEach((about, index) => {
          html += `
            <div class="carousel-item ${index === 0 ? 'active' : ''}">
              <div class="card h-100 d-flex justify-content-center align-items-center text-center">
                <div class="card-body">
                  <h5 class="card-title">${about.titulo.esp}</h5>
                  <p class="card-text">${about.descripcion.esp}</p>
                </div>
              </div>
            </div>
          `;
        });
        container.innerHTML = html;
      } else {
        container.innerHTML = '<div class="carousel-item active"><p class="text-danger">No se pudo cargar la información.</p></div>';
      }
    }
  </script>
</body>
</html>