<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmaVida - Tu Farmacia de Confianza</title>
    <!-- Estilos FarmaVida -->
    <link rel="stylesheet" href="../public2/pharma-styles.css?v=<?php echo time(); ?>">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="pharma-bg">
    <div class="topbar">
        <div class="topbar-content">
            <a class="topbar-item" href="https://wa.me/543644112233" target="_blank" rel="noopener">
                <i class="fab fa-whatsapp"></i> +54 3644-112233
            </a>
            <span class="topbar-item"><i class="fas fa-map-marker-alt"></i> Quitilipi, Chaco</span>
            <div class="topbar-socials">
                <a href="https://wa.me/543644112233" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <div class="container">
        <header>
            <div class="header-content">
                <div class="logo">
                   FarmaVida
                </div>
                <div class="search-bar">
                    <input type="text" id="searchInput" class="search-input" placeholder="Buscar vitaminas, cuidado personal...">
                    <button onclick="searchProducts()" class="btn btn-primary">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
                <div class="header-actions">
                    <button class="header-cart-btn" onclick="viewCart()">
                        <i class="fas fa-shopping-cart"></i> Carrito <span id="cartCount" class="cart-count">0</span>
                    </button>
                </div>
            </div>
            <nav class="category-nav" id="categoryNav" aria-label="Navegación de categorías">
                <span class="category-pill active" data-idcategoria="" onclick="filtrarPorPill(this,'')">Todas</span>
            </nav>
        </header>

        <section class="hero">
            <div class="hero-content">
                <h1>Tu salud, nuestra prioridad</h1>
                <p>Marroquinería, vitaminas y cuidado personal, con la atención profesional que te merecés.</p>
                <a href="#productsContainer" class="btn btn-primary hero-btn">Ver productos</a>
            </div>
        </section>

        <div class="filters">
            <h3>Filtros de Búsqueda</h3>
            <div class="filter-group">
                <select id="categoryFilter" class="filter-select" onchange="loadProducts()">
                    <option value="">Todas las categorías</option>
                    <!-- Las categorías se cargan dinámicamente desde la base de datos -->
                </select>
                <select id="marcaFilter" class="filter-select" onchange="loadProducts()">
                    <option value="">Todas las marcas</option>
                    <!-- Las marcas se cargan dinámicamente desde la base de datos -->
                </select>
                <select id="priceFilter" class="filter-select" onchange="loadProducts()">
                    <option value="">Filtrar por Precios</option>
                    <option value="0-2000">$0 - $2.000</option>
                    <option value="2000-5000">$2.000 - $5.000</option>
                    <option value="5000-10000">$5.000 - $10.000</option>
                    <option value="10000-20000">$10.000 - $20.000</option>
                    <option value="20000-99999999">Más de $20.000</option>
                </select>
                <select id="sortFilter" class="filter-select" onchange="loadProducts()">
                    <option value="">Ordenar por</option>
                    <option value="name_asc">Nombre A-Z</option>
                    <option value="name_desc">Nombre Z-A</option>
                    <option value="price_asc">Precio menor a mayor</option>
                    <option value="price_desc">Precio mayor a menor</option>
                </select>
                <button onclick="clearFilters()" class="btn btn-success">
                    <i class="fas fa-times"></i> Limpiar filtros
                </button>
            </div>
        </div>

        <!-- Mensajes de estado -->
        <div id="loadingMessage" class="loading" style="display: none;">
            Cargando productos... ⏳
        </div>

        <div id="errorMessage" class="error-message" style="display: none;"></div>
        <div id="successMessage" class="success-message" style="display: none;"></div>

        <!-- Contenedor de productos - se llena dinámicamente -->
        <div id="productsContainer" class="products-grid">
            <!-- Los productos se cargan aquí dinámicamente -->
        </div>

        <!-- Paginación -->
        <div id="pagination" class="pagination">
            <!-- La paginación se genera dinámicamente -->
        </div>
    </div>

    <!-- Botón flotante de WhatsApp -->
    <a class="whatsapp-float" href="https://wa.me/x" target="_blank" rel="noopener" aria-label="Escribinos por WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>FarmaVida</h3>
                <p>Tu farmacia de confianza. Encontrá vitaminas, cuidado personal y mucho más, con la atención profesional que tu salud merece.</p>
            </div>
            <div class="footer-section">
                <h3>Ubicación</h3>
                <p>Quitilipi, Chaco</p>
                <p>Argentina</p>
            </div>
            <div class="footer-section">
                <h3>Contacto</h3>
                <p><a href="mailto:ssrdos@hotmail.com">ssrdos@hotmail.com</a></p>
                <p>Tel: +54 3644-112233</p>
            </div>
            <div class="footer-section">
                <h3>Horarios</h3>
                <p>Lunes a Viernes: 9:30 a 18hs</p>
                <p>Sábados: 9:30 a 14hs</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 FarmaVida. Todos los derechos reservados.</p>
            <div class="footer-socials">
                <a href="https://wa.me/543644692408" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:ssrdos@hotmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script type="text/javascript" src="scripts/tienda.js?v=<?php echo time(); ?>"></script>
    
    <!-- Script de Verificación y Carga de Marcas -->
    <script>
        console.log('🔍 indexTienda.php cargado');
        console.log('jQuery disponible:', typeof jQuery !== 'undefined');
        console.log('Función init disponible:', typeof init !== 'undefined');
        console.log('Función cargarMarcas disponible:', typeof cargarMarcas !== 'undefined');
        
        // Si cargarMarcas no existe, la creamos aquí directamente
        if (typeof cargarMarcas === 'undefined') {
            console.warn('⚠️ cargarMarcas no está definida, creándola ahora...');
            
            function cargarMarcas() {
                console.log('🔍 [INLINE] Iniciando carga de marcas...');
                $.ajax({
                    url: '../ajax/tienda.php?op=listarMarcas',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log('✓ [INLINE] Marcas recibidas:', data);
                        console.log('Total de marcas:', data.length);
                        
                        var select = $('#marcaFilter');
                        select.html('<option value="">Todas las marcas</option>');
                        
                        if (data.length === 0) {
                            console.warn('⚠️ No se encontraron marcas en la base de datos');
                            select.append('<option value="" disabled>No hay marcas disponibles</option>');
                        } else {
                            $.each(data, function(index, item) {
                                console.log('Agregando marca:', item.marca);
                                select.append('<option value="' + item.marca + '">' + item.marca + '</option>');
                            });
                            console.log('✓ [INLINE] Marcas cargadas correctamente en el select');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('✗ [INLINE] Error al cargar marcas:', error);
                        console.error('Status:', status);
                        console.error('Response:', xhr.responseText);
                    }
                });
            }
            
            // Ejecutar inmediatamente
            $(document).ready(function() {
                console.log('📄 Documento listo, ejecutando cargarMarcas...');
                cargarMarcas();
            });
        }
        
        // Forzar verificación después de 2 segundos
        setTimeout(function() {
            console.log('⏱️ Verificando select de marcas...');
            var marcaSelect = document.getElementById('marcaFilter');
            if (marcaSelect) {
                console.log('Select encontrado, opciones:', marcaSelect.options.length);
                for (var i = 0; i < marcaSelect.options.length; i++) {
                    console.log('  Opción ' + i + ':', marcaSelect.options[i].text);
                }
            } else {
                console.error('✗ Select #marcaFilter NO encontrado');
            }
        }, 3000);
    </script>
    
    <!-- Interacciones de la interfaz -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn, .add-to-cart');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = 'slideInUp 0.8s ease forwards';
                    }
                });
            }, observerOptions);

            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>