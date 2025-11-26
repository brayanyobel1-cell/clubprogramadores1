<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevClub - Club de Programadores</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            color: #fff;
            line-height: 1.6;
        }

        /* Navbar */
        nav {
            background: rgba(15, 12, 41, 0.95);
            padding: 1rem 5%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        nav .logo {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(45deg, #00d4ff, #7b2ff7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
            margin: 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        nav a:hover {
            background: rgba(123, 47, 247, 0.2);
            transform: translateY(-2px);
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn-login {
            background: transparent;
            border: 2px solid #00d4ff;
            color: #00d4ff;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #00d4ff;
            color: #0f0c29;
            transform: translateY(-2px);
        }

        .btn-register {
            background: linear-gradient(45deg, #7b2ff7, #00d4ff);
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            transition: all 0.3s;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(123, 47, 247, 0.4);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-name {
            color: #00d4ff;
            font-weight: 600;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
            margin-top: 60px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(123, 47, 247, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            top: -200px;
            right: -200px;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .hero-content {
            max-width: 800px;
            z-index: 1;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #00d4ff, #7b2ff7, #ff006e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            color: #b8b8d1;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .btn {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .btn-primary {
            background: linear-gradient(45deg, #7b2ff7, #00d4ff);
            color: #fff;
            box-shadow: 0 5px 20px rgba(123, 47, 247, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(123, 47, 247, 0.6);
        }

        /* Section Styles */
        section {
            padding: 5rem 5%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #00d4ff, #7b2ff7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Members Section */
        .members-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .member-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .member-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 10px 40px rgba(123, 47, 247, 0.3);
        }

        .member-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            background: linear-gradient(45deg, #7b2ff7, #00d4ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: bold;
        }

        .member-name {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .member-role {
            color: #00d4ff;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .member-tech {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .tech-badge {
            background: rgba(123, 47, 247, 0.3);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        /* Events Section */
        .events-container {
            display: grid;
            gap: 1.5rem;
        }

        .event-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            border-left: 4px solid #00d4ff;
            transition: all 0.3s;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 2rem;
        }

        .event-card:hover {
            transform: translateX(10px);
            border-left-color: #7b2ff7;
        }

        .event-date {
            background: linear-gradient(45deg, #7b2ff7, #00d4ff);
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            min-width: 100px;
        }

        .event-day {
            font-size: 2rem;
            font-weight: bold;
        }

        .event-month {
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .event-info h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .event-info p {
            color: #b8b8d1;
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .project-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(0, 212, 255, 0.3);
        }

        .project-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #7b2ff7 0%, #00d4ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
        }

        .project-content {
            padding: 1.5rem;
        }

        .project-content h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
        }

        .project-content p {
            color: #b8b8d1;
            margin-bottom: 1rem;
        }

        .project-stack {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        /* Contact Section */
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 3rem;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #00d4ff;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #7b2ff7;
            background: rgba(255, 255, 255, 0.08);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Footer */
        footer {
            background: rgba(15, 12, 41, 0.95);
            text-align: center;
            padding: 2rem;
            margin-top: 5rem;
        }

        footer p {
            color: #b8b8d1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            nav ul {
                gap: 1rem;
            }

            .event-card {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="logo">{'<DevClub/>'}</div>
            <div class="nav-links">
                <ul>
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#miembros">Miembros</a></li>
                    <li><a href="#eventos">Eventos</a></li>
                    <li><a href="#proyectos">Proyectos</a></li>
                    <li><a href="#contacto">Únete</a></li>
                </ul>
                <div class="auth-buttons">
                    @auth
                        <div class="user-menu">
                            <span class="user-name">{{ Auth::user()->us_nombre }}</span>
                            <a href="{{ route('dashboard') }}" class="btn-login">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn-register" style="border: none; cursor: pointer;">Cerrar Sesión</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn-register">Registrarse</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="inicio">
        <div class="hero-content">
            <h1>Bienvenido a DevClub</h1>
            <p>Donde los programadores se conectan, aprenden y crean juntos. Únete a nuestra comunidad y lleva tus habilidades al siguiente nivel.</p>
            <a href="#contacto" class="btn btn-primary">Únete Ahora</a>
        </div>
    </section>

    <!-- Members Section -->
    <section id="miembros">
        <h2 class="section-title">Nuestros Miembros</h2>
        <div class="members-grid">
            @foreach($miembros as $miembro)
            <div class="member-card">
                <div class="member-avatar">
                    {{ strtoupper(substr($miembro->us_nombre, 0, 1) . substr($miembro->us_apellido, 0, 1)) }}
                </div>
                <h3 class="member-name">{{ $miembro->us_nombre }} {{ $miembro->us_apellido }}</h3>
                <p class="member-role">{{ $miembro->rol->us_nombre ?? 'Miembro' }}</p>
                <div class="member-tech">
                    <span class="tech-badge">Laravel</span>
                    <span class="tech-badge">PHP</span>
                    <span class="tech-badge">MySQL</span>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Events Section -->
    <section id="eventos">
        <h2 class="section-title">Próximos Eventos</h2>
        <div class="events-container">
            @foreach($eventos as $evento)
            <div class="event-card">
                <div class="event-date">
                    <div class="event-day">{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d') }}</div>
                    <div class="event-month">{{ strtoupper(\Carbon\Carbon::parse($evento->fecha_inicio)->locale('es')->format('M')) }}</div>
                </div>
                <div class="event-info">
                    <h3>{{ $evento->titulo }}</h3>
                    <p>{{ $evento->descripcion }}</p>
                    <p><strong>Lugar:</strong> {{ $evento->lugar }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Projects Section -->
    <section id="proyectos">
        <h2 class="section-title">Proyectos Destacados</h2>
        <div class="projects-grid">
            @foreach($proyectos as $proyecto)
            <div class="project-card">
                <div class="project-image">🚀</div>
                <div class="project-content">
                    <h3>{{ $proyecto->us_nombre }}</h3>
                    <p>{{ $proyecto->descripcion }}</p>
                    <p><strong>Creador:</strong> {{ $proyecto->creador->us_nombre ?? 'Desconocido' }}</p>
                    <p><strong>Equipo:</strong> {{ $proyecto->equipo->nombre_equipo ?? 'Sin equipo' }}</p>
                    <div class="project-stack">
                        <span class="tech-badge">Laravel</span>
                        <span class="tech-badge">MySQL</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto">
        <h2 class="section-title">Únete al Club</h2>
        <div class="contact-form">
            @if(session('success'))
                <div style="background: rgba(0, 212, 255, 0.2); padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #00d4ff;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contacto.guardar') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
                    @error('nombre')
                        <span style="color: #ff006e; font-size: 0.9rem;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="tu@email.com" required>
                    @error('email')
                        <span style="color: #ff006e; font-size: 0.9rem;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tecnologias">Tecnologías que manejas</label>
                    <input type="text" id="tecnologias" name="tecnologias" placeholder="Laravel, React, Python...">
                    @error('tecnologias')
                        <span style="color: #ff006e; font-size: 0.9rem;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mensaje">¿Por qué quieres unirte?</label>
                    <textarea id="mensaje" name="mensaje" placeholder="Cuéntanos sobre ti..." required></textarea>
                    @error('mensaje')
                        <span style="color: #ff006e; font-size: 0.9rem;">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar Solicitud</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 DevClub - Club de Programadores. Construyendo el futuro juntos.</p>
    </footer>
</body>
</html>
