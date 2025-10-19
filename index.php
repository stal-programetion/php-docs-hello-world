<?php

/**
 * Módulo de Flores Visuales en PHP
 * Genera un sitio web hermoso con rosas negras y tulipanes
 * Autor: stal-programetion
 * Fecha: 2025-10-19
 */

class JardinVisual {
    
    private $titulo = "🌹 Jardín de Rosas Negras y Tulipanes 🌷";
    
    /**
     * Genera el HTML completo del sitio
     */
    public function generarSitio() {
        ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->titulo; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Estrellas de fondo */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
        
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        header {
            text-align: center;
            padding: 40px 20px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            margin-bottom: 40px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            color: #fff;
            font-size: 3em;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            margin-bottom: 10px;
            animation: glow 2s ease-in-out infinite;
        }
        
        @keyframes glow {
            0%, 100% { text-shadow: 0 0 20px rgba(255, 255, 255, 0.5); }
            50% { text-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 40px rgba(255, 182, 193, 0.6); }
        }
        
        .subtitle {
            color: #ffc8dd;
            font-size: 1.2em;
            font-style: italic;
        }
        
        .jardin {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .flor-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .flor-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.5s;
        }
        
        .flor-card:hover::before {
            left: 100%;
        }
        
        .flor-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
            border-color: rgba(255, 255, 255, 0.3);
        }
        
        .flor-nombre {
            color: #fff;
            font-size: 1.5em;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        .flor-descripcion {
            color: #b8c1ec;
            font-size: 0.95em;
            line-height: 1.6;
        }
        
        /* Animaciones para las flores */
        .rosa-negra {
            animation: float 3s ease-in-out infinite;
        }
        
        .tulipan {
            animation: sway 2.5s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes sway {
            0%, 100% { transform: rotate(-2deg); }
            50% { transform: rotate(2deg); }
        }
        
        /* Pétalos cayendo */
        .petal {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #ffb3c1;
            border-radius: 50%;
            opacity: 0.7;
            animation: fall linear infinite;
            z-index: 0;
        }
        
        @keyframes fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 0.7;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
        
        footer {
            text-align: center;
            margin-top: 60px;
            padding: 30px;
            color: #b8c1ec;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }
        
        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .stat-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px 40px;
            border-radius: 15px;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .stat-number {
            font-size: 2.5em;
            color: #ffc8dd;
            font-weight: bold;
        }
        
        .stat-label {
            color: #fff;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <!-- Estrellas de fondo -->
    <div class="stars" id="stars"></div>
    
    <!-- Pétalos cayendo -->
    <?php $this->generarPetalos(15); ?>
    
    <div class="container">
        <header>
            <h1><?php echo $this->titulo; ?></h1>
            <p class="subtitle">Un jardín místico donde florecen las rosas más oscuras y los tulipanes más hermosos</p>
        </header>
        
        <div class="stats">
            <div class="stat-box">
                <div class="stat-number"><?php echo $this->contarFlores('rosa'); ?></div>
                <div class="stat-label">Rosas Negras</div>
            </div>
            <div class="stat-box">
                <div class="stat-number"><?php echo $this->contarFlores('tulipan'); ?></div>
                <div class="stat-label">Tulipanes</div>
            </div>
            <div class="stat-box">
                <div class="stat-number"><?php echo $this->contarFlores('total'); ?></div>
                <div class="stat-label">Total de Flores</div>
            </div>
        </div>
        
        <div class="jardin">
            <?php $this->generarRosasNegras(4); ?>
            <?php $this->generarTulipanes(5); ?>
        </div>
        
        <footer>
            <p>🌸 Creado con amor por <strong>stal-programetion</strong> 🌸</p>
            <p style="margin-top: 10px; font-size: 0.9em;">19 de Octubre, 2025</p>
            <p style="margin-top: 15px; font-style: italic;">"En un jardín nocturno, las rosas negras brillan más que las estrellas"</p>
        </footer>
    </div>
    
    <script>
        // Generar estrellas
        const starsContainer = document.getElementById('stars');
        for (let i = 0; i < 100; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            star.style.width = Math.random() * 3 + 'px';
            star.style.height = star.style.width;
            star.style.left = Math.random() * 100 + '%';
            star.style.top = Math.random() * 100 + '%';
            star.style.animationDelay = Math.random() * 3 + 's';
            starsContainer.appendChild(star);
        }
        
        // Efecto de hover en las flores
        document.querySelectorAll('.flor-card').forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(1.1) rotate(5deg)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 300);
            });
        });
    </script>
</body>
</html>
        <?php
    }
    
    /**
     * Genera rosas negras SVG
     */
    private function generarRosasNegras($cantidad) {
        for ($i = 1; $i <= $cantidad; $i++) {
            ?>
            <div class="flor-card">
                <svg class="rosa-negra" width="150" height="150" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <!-- Pétalos exteriores -->
                    <ellipse cx="100" cy="80" rx="30" ry="35" fill="#1a1a1a" opacity="0.9" transform="rotate(-30 100 80)"/>
                    <ellipse cx="100" cy="80" rx="30" ry="35" fill="#2a2a2a" opacity="0.9" transform="rotate(30 100 80)"/>
                    <ellipse cx="100" cy="80" rx="30" ry="35" fill="#1a1a1a" opacity="0.9" transform="rotate(90 100 80)"/>
                    <ellipse cx="100" cy="80" rx="30" ry="35" fill="#2a2a2a" opacity="0.9" transform="rotate(150 100 80)"/>
                    <ellipse cx="100" cy="80" rx="30" ry="35" fill="#1a1a1a" opacity="0.9" transform="rotate(210 100 80)"/>
                    <ellipse cx="100" cy="80" rx="30" ry="35" fill="#2a2a2a" opacity="0.9" transform="rotate(270 100 80)"/>
                    
                    <!-- Pétalos interiores -->
                    <circle cx="100" cy="80" r="25" fill="#0a0a0a"/>
                    <circle cx="100" cy="80" r="15" fill="#3a0a0a"/>
                    
                    <!-- Tallo -->
                    <rect x="95" y="110" width="10" height="80" fill="#1a4d1a" rx="5"/>
                    
                    <!-- Hojas -->
                    <ellipse cx="85" cy="140" rx="20" ry="10" fill="#2d5a2d" transform="rotate(-30 85 140)"/>
                    <ellipse cx="115" cy="160" rx="20" ry="10" fill="#2d5a2d" transform="rotate(30 115 160)"/>
                    
                    <!-- Espinas -->
                    <polygon points="95,130 92,135 95,135" fill="#0f3a0f"/>
                    <polygon points="105,150 108,155 105,155" fill="#0f3a0f"/>
                    <polygon points="95,170 92,175 95,175" fill="#0f3a0f"/>
                </svg>
                <div class="flor-nombre">Rosa Negra #<?php echo $i; ?></div>
                <div class="flor-descripcion">Misteriosa y elegante, esta rosa negra simboliza el misterio y la pasión eterna. Sus pétalos oscuros guardan secretos del jardín nocturno.</div>
            </div>
            <?php
        }
    }
    
    /**
     * Genera tulipanes SVG en diferentes colores
     */
    private function generarTulipanes($cantidad) {
        $colores = [
            ['principal' => '#ff1744', 'sombra' => '#c51162', 'nombre' => 'Rojo Pasión'],
            ['principal' => '#ffd600', 'sombra' => '#ffab00', 'nombre' => 'Amarillo Sol'],
            ['principal' => '#ff4081', 'sombra' => '#f50057', 'nombre' => 'Rosa Encanto'],
            ['principal' => '#7c4dff', 'sombra' => '#651fff', 'nombre' => 'Púrpura Real'],
            ['principal' => '#ff6e40', 'sombra' => '#ff3d00', 'nombre' => 'Naranja Fuego']
        ];
        
        for ($i = 0; $i < $cantidad; $i++) {
            $color = $colores[$i % count($colores)];
            ?>
            <div class="flor-card">
                <svg class="tulipan" width="150" height="150" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <!-- Pétalos del tulipán -->
                    <ellipse cx="100" cy="70" rx="25" ry="40" fill="<?php echo $color['principal']; ?>" transform="rotate(-15 100 70)"/>
                    <ellipse cx="100" cy="70" rx="25" ry="40" fill="<?php echo $color['sombra']; ?>" transform="rotate(15 100 70)"/>
                    <ellipse cx="100" cy="65" rx="20" ry="35" fill="<?php echo $color['principal']; ?>"/>
                    
                    <!-- Borde superior del tulipán -->
                    <path d="M 75 50 Q 100 40 125 50" stroke="<?php echo $color['sombra']; ?>" stroke-width="2" fill="none"/>
                    
                    <!-- Tallo -->
                    <rect x="95" y="100" width="10" height="85" fill="#4caf50" rx="5"/>
                    
                    <!-- Hojas largas del tulipán -->
                    <ellipse cx="70" cy="130" rx="15" ry="50" fill="#66bb6a" transform="rotate(-25 70 130)"/>
                    <ellipse cx="130" cy="140" rx="15" ry="50" fill="#66bb6a" transform="rotate(25 130 140)"/>
                    
                    <!-- Detalles de las hojas -->
                    <line x1="70" y1="100" x2="70" y2="160" stroke="#4caf50" stroke-width="1" opacity="0.5"/>
                    <line x1="130" y1="110" x2="130" y2="170" stroke="#4caf50" stroke-width="1" opacity="0.5"/>
                </svg>
                <div class="flor-nombre">Tulipán <?php echo $color['nombre']; ?></div>
                <div class="flor-descripcion">Delicado y vibrante, este tulipán <?php echo strtolower($color['nombre']); ?> ilumina el jardín con su belleza única y su gracia natural.</div>
            </div>
            <?php
        }
    }
    
    /**
     * Genera pétalos cayendo
     */
    private function generarPetalos($cantidad) {
        for ($i = 0; $i < $cantidad; $i++) {
            $left = rand(0, 100);
            $delay = rand(0, 5);
            $duration = rand(10, 20);
            ?>
            <div class="petal" style="left: <?php echo $left; ?>%; animation-delay: <?php echo $delay; ?>s; animation-duration: <?php echo $duration; ?>s;"></div>
            <?php
        }
    }
    
    /**
     * Cuenta las flores generadas
     */
    private function contarFlores($tipo) {
        $rosas = 4;
        $tulipanes = 5;
        
        switch($tipo) {
            case 'rosa':
                return $rosas;
            case 'tulipan':
                return $tulipanes;
            case 'total':
                return $rosas + $tulipanes;
            default:
                return 0;
        }
    }
}

// ============================================
// Ejecutar el módulo
// ============================================

$jardin = new JardinVisual();
$jardin->generarSitio();

?>
