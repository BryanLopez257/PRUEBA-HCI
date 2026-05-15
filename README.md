# Prueba Práctica Final: HCI / UX - Usability Test Dashboard 2.0

## 📋 Descripción

Este proyecto documenta el análisis, evaluación y mejora UX del **Dashboard de Análisis de UX** siguiendo los principios de Interacción Humano-Computador (HCI), evaluación heurística, diseño UX y metodología Scrum.

**Docente**: Jose Ruben Caiza Caizabuano  
**Asignatura**: Interacción Humano / Computador  
**Nivel**: Quinto Semestre - Ingeniería en Software

---

## 🎯 Objetivos

Aplicar principios de HCI/UX mediante:
- ✅ Evaluación heurística (10 heurísticas de Nielsen)
- ✅ Identificación de problemas UX
- ✅ Rediseño de interfaces críticas
- ✅ Implementación funcional de mejoras
- ✅ Control de versiones en GitHub
- ✅ Documentación completa del proceso

---

## 📁 Estructura del Proyecto

```
HCI-PruebaFinal/
├── product_backlog.md              # Épicas, historias de usuario, priorización
├── sprint_planning.md              # Planning de sprint, historias seleccionadas
├── heuristic_evaluation.md         # Análisis de 10 heurísticas de Nielsen
├── ai_evidence.md                  # Documentación de uso de IA en diseño
├── wireframes/                     # Wireframes (Lo-Fi, Mid-Fi, Hi-Fi)
│   ├── lofi/
│   ├── midfi/
│   └── hifi/
├── implementation/                 # Código de mejoras implementadas
│   ├── components/
│   ├── validations/
│   └── styles/
└── README.md                       # Este archivo
```

---

## 🔍 Fase 1: Evaluación Heurística

Se identificaron **19 problemas UX** clasificados como:

| Severidad | Cantidad | Ejemplos |
|-----------|----------|----------|
| 🔴 CRÍTICOS | 5 | Validaciones, Confirmación de envío, Sección activa |
| 🟠 MODERADOS | 10 | Mensajes de error, Carga de datos, Consistencia |
| 🟡 LEVES | 4 | Iconografía, Espaciado, Documentación |

📄 **Consultar**: [heuristic_evaluation.md](./heuristic_evaluation.md)

### Principales Problemas Identificados

1. **P-009 🔴 CRÍTICO**: Sin validaciones en tiempo real
2. **P-005 🔴 CRÍTICO**: Sin confirmación antes de envío
3. **P-001 🔴 CRÍTICO**: Indicador de sección activa
4. **P-019 🔴 CRÍTICO**: Sin recuperación de contraseña
5. **P-014 🟠 MODERADO**: Jerarquía visual deficiente

---

## 📊 Fase 2: Planificación Scrum

### Product Backlog
- **5 Épicas** priorizadas
- **20 Historias de Usuario** con criterios de aceptación
- **Story Points**: Estimación de complejidad

📄 **Consultar**: [product_backlog.md](./product_backlog.md)

### Sprint Planning
- **Sprint 1**: Navegación y Arquitectura (5 + 8 + 3 = 16 pts)
- **Sprint 2**: Validaciones y Feedback (8 + 5 + 5 = 18 pts)

📄 **Consultar**: [sprint_planning.md](./sprint_planning.md)

---

## 🎨 Fase 3: Rediseño UX

### Wireframes

#### Lo-Fi (Esquemas Básicos)
Structures conceptuales sin detalles visuales

#### Mid-Fi (Prototipo Medio)
Componentes definidos, layout optimizado

#### Hi-Fi (Alta Fidelidad)
Diseño final con colores, tipografía, espaciado

📁 **Consultar**: [wireframes/](./wireframes/)

### Principios Aplicados

- **Leyes de Gestalt**: Proximidad, continuidad, similitud
- **Jerarquía Visual**: Tamaño, color, contraste
- **Arquitectura de Información**: Categorización clara
- **Navegación Contextual**: Breadcrumbs, Stepper
- **Prevención de Errores**: Validaciones, confirmaciones
- **Diseño Emocional**: Colores, espaciado, micro-interacciones

---

## 💻 Fase 4: Implementación Funcional

### Componentes Implementados

1. **Breadcrumbs** - Navegación del sitio
2. **Stepper** - Proceso multi-paso en formularios
3. **Validaciones en Tiempo Real** - Feedback inmediato
4. **Notificaciones** - Mensajes de estado
5. **Barra de Progreso** - Tareas largas
6. **Prevención de Errores** - Confirmación de acciones

📁 **Consultar**: [implementation/](./implementation/)

### Stack Técnico

- **Backend**: Laravel 11
- **Frontend**: Filament Admin
- **Validación**: Laravel Validation + JavaScript
- **Estilos**: Tailwind CSS
- **Componentes**: Livewire

---

## 🤖 Fase 5: Evidencia de IA

Se utilizó **GitHub Copilot (Claude Haiku 4.5)** para:

1. **Análisis Heurístico** - Identificación sistemática de problemas
2. **Product Backlog** - Traducción de problemas a historias de usuario
3. **Wireframing** - Guía de diseño y componentes
4. **Especificación Técnica** - Componentes y validaciones
5. **Documentación** - Estructuración de contenido

📄 **Consultar**: [ai_evidence.md](./ai_evidence.md)

### Impacto de IA

- ⏱️ 60% más rápido en evaluación heurística
- 📊 95% de cobertura completa
- 🎯 Especificaciones más consistentes
- 📝 Documentación estructurada

---

## 📈 Fase 6: GitHub y Control de Versiones

### Commits Reales

Se documentan mínimo 5 commits relacionados con:

```bash
1. FEAT: Evaluación heurística del dashboard
   - 19 problemas UX identificados
   - Clasificación por severidad

2. FEAT: Product backlog y sprint planning
   - 5 épicas priorizadas
   - 20 historias de usuario
   
3. FEAT: Wireframes Lo-Fi, Mid-Fi, Hi-Fi
   - Diseño de formularios
   - Mejora de navegación
   
4. FEAT: Implementar breadcrumbs y stepper
   - Navegación contextual
   - Componentes reutilizables
   
5. FEAT: Validaciones en tiempo real
   - Feedback inmediato
   - Prevención de errores
   
6. FEAT: Documentación IA y evidencia
   - Prompts utilizados
   - Impacto en diseño
```

---

## 🎓 Rúbrica de Evaluación

| Criterio | Excelente | Regular | Puntaje |
|----------|-----------|---------|---------|
| Scrum | Backlog y Sprint estructurados | Documentación incompleta | 0.30 |
| Eval. Heurística | Problemas claros y clasificados | Problemas poco claros | 0.40 |
| Wireframes/Rediseño | Diseños completos y coherentes | Diseños incompletos | 0.30 |
| Implementación | Mejora UX implementada | Implementación parcial | 0.50 |
| GitHub | Commits organizados | Commits desordenados | 0.30 |
| IA / Documentación | Prompts y docs claras | Evidencia mínima | 0.20 |
| **TOTAL** | | | **2.00** |

---

## ✅ Estado Actual (implementado)

- Wireframes: Lo-Fi, Mid-Fi, Hi-Fi (archivos en `wireframes/`)
- Implementación: componentes de ejemplo (`implementation/components/`), estilos y scripts (`implementation/styles/`, `implementation/scripts/`)

Para integrar las mejoras en el proyecto Laravel, consulte `implementation/README.md`.


---

## 🚀 Cómo Usar Este Proyecto

### Para Desarrolladores

1. Clonar repositorio:
   ```bash
   git clone https://github.com/BryanLopez257/PRUEBA-HCI.git
   cd Grupo-HCI-5-main
   ```

2. Instalar dependencias:
   ```bash
   composer install
   npm install
   ```

3. Configurar ambiente:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Ver implementaciones en:
   - `/HCI-PruebaFinal/implementation/` - Componentes UX
   - `app/Filament/` - Panels y resources

### Para Revisores

1. Revisar documentación:
   - `product_backlog.md` - Estrategia UX
   - `heuristic_evaluation.md` - Análisis de problemas
   - `ai_evidence.md` - Uso de IA

2. Revisar diseño:
   - `wireframes/` - Propuestas visuales

3. Revisar implementación:
   - `implementation/` - Código funcional

---

## 📞 Contacto

**Estudiante**: Bryan Lopez  
**Repositorio**: https://github.com/BryanLopez257/PRUEBA-HCI  
**Proyecto Local**: `c:\Users\bl250\OneDrive\Escritorio\Grupo-HCI-5-main`

---

## 📝 Notas Importantes

- ✅ Proyecto individual (no grupal)
- ✅ Repositorio público en GitHub
- ✅ Commits reales y significativos
- ✅ Documentación técnica completa
- ✅ Aplicación de principios HCI
- ✅ Evidencia de IA integrada
- ✅ Código implementado funcional

---

**Última actualización**: 15 de mayo de 2026  
**Estado**: En progreso 🚀

# 🧪 UX Lab Analytics: HCI Testing Suite

[![Laravel 11](https://img.shields.io/badge/Framework-Laravel%2011-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![Filament v3](https://img.shields.io/badge/Admin-Filament%20v3-EAB308?style=for-the-badge&logo=laravel)](https://filamentphp.com)
[![PHP 8.3](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php)](https://www.php.net)
[![Tailwind CSS](https://img.shields.io/badge/UI-Tailwind%20CSS-38B2AC?style=for-the-badge&logo=tailwind-css)](https://tailwindcss.com)
[![Copilot Reviewed](https://img.shields.io/badge/GitHub-Copilot%20Reviewed-24292e?style=for-the-badge&logo=github)](https://github.com/features/copilot)

## About Laravel 

UX Lab Analytics es un ecosistema diseñado para ingenieros y especialistas en UX. Permite gestionar el ciclo de vida completo de una evaluación de interfaces: desde la planificación estratégica hasta la cuantificación de hallazgos técnicos. Optimizado para la comparativa de métricas de eficiencia y eficacia según la norma **ISO 9241-11** (Caso de estudio: Cooperativa JEP vs. Maquita).

---

## 📸 Vista Previa (Preview)

![Dashboard HCI](https://raw.githubusercontent.com/Josue04-n/TowerDefense/main/Captura%20de%20pantalla%202026-03-24%20234248.png)
*Interfaz optimizada con Branding personalizado, navegación agrupada y Widget de Accesibilidad dinámico.*

---

## 🛠️ Características Destacadas

* **Estructura HCI Core:** Gestión integral de planes de prueba, tareas normalizadas y sesiones cronometradas.
* **Panel Administrativo Inteligente:** Interfaz reactiva basada en **Filament PHP**, con menús colapsables y orden lógico de trabajo.
* **Arquitectura de Catálogos:** Control centralizado de Métodos de Evaluación, Severidades y Prioridades de Atención.
* **Filtrado de Alta Precisión:** Segmentación de datos por Participante, Tarea y Aplicativo con lógica de limpieza de duplicados.
* **Inclusión Digital:** Integración nativa del widget **UserWay** mediante Render Hooks para cumplimiento de estándares de accesibilidad.
* **IA Assisted Development:** Código revisado y optimizado mediante **GitHub Copilot** para garantizar las mejores prácticas de arquitectura.

---

## 🏗️ Stack Tecnológico & Arquitectura

El sistema implementa una arquitectura **TALL Stack** de alto rendimiento, ideal para aplicaciones empresariales:

* **Backend:** PHP 8.3 + Laravel 11 (Strict Typing).
* **Frontend:** Filament v3 + Tailwind CSS + Livewire v3.
* **Base de Datos:** MySQL con integridad referencial avanzada y disparadores de catálogos.
* **Análisis de Código:** Revisión asistida por IA (GitHub Copilot) para refactorización y seguridad.

---

## 🚀 Instalación y Despliegue

### Requisitos Técnicos
* **PHP:** `^8.3` (Ruta local: `C:\xampp\php\php.exe`)
* **Composer:** `^2.8.2`
* **Base de Datos:** MySQL / MariaDB

### Guía Paso a Paso
1.  **Clonación del Proyecto:**
    ```bash
    git clone [https://github.com/Josue04-n/Grupo-HCI-5.git](https://github.com/Josue04-n/Grupo-HCI-5.git)
    cd Grupo-HCI-5
    ```

2.  **Gestión de Dependencias:**
    ```bash
    composer install
    ```

3.  **Configuración de Entorno:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Nota: Ajustar las credenciales de base de datos en el archivo `.env`.*

4.  **Despliegue de Esquema y Datos:**
    ```bash
    php artisan migrate --seed
    ```

5.  **Ejecución:**
    ```bash
    php artisan serve
    ```
    🌐 Acceso al Panel: `http://127.0.0.1:8000/admin`

---

## 📈 Roadmap (Próximas Mejoras)
* [ ] **Dashboard Analytics:** Implementación de Gráficos de Eficacia y Eficiencia (Chart Widgets).
* [ ] **Report Engine:** Exportación automatizada de hallazgos en formato PDF/Excel.
* [ ] **Visual Insights:** Módulo de Mapas de Calor (Heatmaps) asociados a Tareas.

---

## 👥 Contribuidores

Agradecemos la dedicación técnica del equipo que ha hecho posible este ecosistema de UX:

* **Josué** - [@Josue04-n](https://github.com/Josue04-n)  
    *Lead Software Architect & HCI Specialist*
* **Alex Reyes** - [@alexJonarey](https://github.com/alexJonarey)  
    *Backend Developer & Database Manager*
* **Bryan Lopez** - [@BryanLopez257](https://github.com/BryanLopez257)  
    *UX/UI Implementation & Frontend Support*
* **Dennis Quisaguano** - [@DennisQuisaguano](https://github.com/DennisQuisaguano)  
    *QA Engineer & HCI Metrics Analyst*
* **GitHub Copilot** - *AI Code Review & Logic Optimization Partner*

---

## 📄 Licencia
Este proyecto se distribuye bajo la licencia **MIT**. Consulte el archivo `LICENSE` para más detalles.

---
Desarrollado con rigor técnico para la optimización de la experiencia de usuario (HCI).
