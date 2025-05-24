self.addEventListener('install', function (event) {
    console.log('Service Worker instalado');
  });
  
  self.addEventListener('fetch', function (event) {
    // Aqui você pode fazer cache das requisições se quiser
  });