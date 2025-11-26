<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\Usuario;
use App\Models\Equipo;
use App\Models\Proyecto;
use App\Models\Evento;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear Roles
        $rolAdmin = Rol::create([
            'us_nombre' => 'Administrador',
            'descripcion' => 'Control total del sistema'
        ]);

        $rolDev = Rol::create([
            'us_nombre' => 'Desarrollador',
            'descripcion' => 'Miembro activo del club'
        ]);

        $rolMentor = Rol::create([
            'us_nombre' => 'Mentor',
            'descripcion' => 'Guía y enseña a otros miembros'
        ]);

        // Crear Usuarios
        $usuario1 = Usuario::create([
            'us_nombre' => 'Juan',
            'us_apellido' => 'Pérez',
            'us_email' => 'juan@devclub.com',
            'us_password' => bcrypt('password123'),
            'fecha_registro' => now(),
            'rol_id' => $rolDev->rol_id
        ]);

        $usuario2 = Usuario::create([
            'us_nombre' => 'María',
            'us_apellido' => 'González',
            'us_email' => 'maria@devclub.com',
            'us_password' => bcrypt('password123'),
            'fecha_registro' => now(),
            'rol_id' => $rolDev->rol_id
        ]);

        $usuario3 = Usuario::create([
            'us_nombre' => 'Carlos',
            'us_apellido' => 'Rodríguez',
            'us_email' => 'carlos@devclub.com',
            'us_password' => bcrypt('password123'),
            'fecha_registro' => now(),
            'rol_id' => $rolMentor->rol_id
        ]);

        $usuario4 = Usuario::create([
            'us_nombre' => 'Ana',
            'us_apellido' => 'López',
            'us_email' => 'ana@devclub.com',
            'us_password' => bcrypt('password123'),
            'fecha_registro' => now(),
            'rol_id' => $rolAdmin->rol_id
        ]);

        // Crear Equipos
        $equipo1 = Equipo::create([
            'nombre_equipo' => 'Backend Masters',
            'descripcion' => 'Especialistas en desarrollo backend',
            'fecha_creacion' => now(),
            'us_id' => $usuario1->us_id,
            'rol_id' => $rolDev->rol_id
        ]);

        $equipo2 = Equipo::create([
            'nombre_equipo' => 'Frontend Wizards',
            'descripcion' => 'Expertos en interfaces de usuario',
            'fecha_creacion' => now(),
            'us_id' => $usuario2->us_id,
            'rol_id' => $rolDev->rol_id
        ]);

        // Crear Proyectos
        Proyecto::create([
            'us_nombre' => 'Sistema de Gestión Académica',
            'descripcion' => 'Plataforma completa para administrar estudiantes y cursos',
            'repositorio_url' => 'https://github.com/devclub/gestion-academica',
            'fecha_creacion' => now(),
            'creador_id' => $usuario1->us_id,
            'id_equipo' => $equipo1->id_equipo
        ]);

        Proyecto::create([
            'us_nombre' => 'Chat en Tiempo Real',
            'descripcion' => 'Aplicación de mensajería instantánea con WebSockets',
            'repositorio_url' => 'https://github.com/devclub/chat-realtime',
            'fecha_creacion' => now(),
            'creador_id' => $usuario3->us_id,
            'id_equipo' => $equipo1->id_equipo
        ]);

        Proyecto::create([
            'us_nombre' => 'App de Productividad',
            'descripcion' => 'Gestiona tus tareas y proyectos con interfaz intuitiva',
            'repositorio_url' => 'https://github.com/devclub/productivity-app',
            'fecha_creacion' => now(),
            'creador_id' => $usuario2->us_id,
            'id_equipo' => $equipo2->id_equipo
        ]);

        // Crear Eventos
        Evento::create([
            'titulo' => 'Workshop: Laravel Avanzado',
            'descripcion' => 'Aprende técnicas avanzadas de Laravel incluyendo eventos, colas y testing',
            'fecha_inicio' => now()->addDays(15),
            'fecha_fin' => now()->addDays(15),
            'lugar' => 'Virtual - Zoom'
        ]);

        Evento::create([
            'titulo' => 'Hackathon 2024',
            'descripcion' => '48 horas de código intensivo. Forma equipo y crea algo increíble',
            'fecha_inicio' => now()->addDays(22),
            'fecha_fin' => now()->addDays(24),
            'lugar' => 'Centro Tech - Sala Principal'
        ]);

        Evento::create([
            'titulo' => 'Meetup: Arquitectura de Software',
            'descripcion' => 'Discusión sobre patrones de diseño y mejores prácticas',
            'fecha_inicio' => now()->addMonth()->addDays(8),
            'fecha_fin' => now()->addMonth()->addDays(8),
            'lugar' => 'Híbrido - Presencial y Virtual'
        ]);
    }
}
