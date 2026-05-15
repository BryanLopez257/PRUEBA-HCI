# Wireframes - Usability Test Dashboard 2.0

## 📐 Wireframes de Rediseño UX

Documentación de los wireframes Lo-Fi, Mid-Fi y Hi-Fi para la mejora del Dashboard.

---

## 1️⃣ WIREFRAMES LO-FI (Baja Fidelidad)

### 1.1 Dashboard Principal - Lo-Fi

```
┌─────────────────────────────────────────────────────┐
│ LOGO  [  Menu  ]  [Perfil] [Salir]                  │
├─────────────────────────────────────────────────────┤
│ Home > Dashboard > Análisis                          │  <- BREADCRUMBS
├──────────────────┬──────────────────────────────────┤
│                  │                                   │
│  SIDEBAR MENU    │     DASHBOARD PRINCIPAL           │
│  --------        │     ┌─────────────────┐           │
│  • Inicio        │     │ Métricas Clave  │           │
│  • Pruebas       │     │ [Tarjetas de    │           │
│  • Hallazgos     │     │  datos]         │           │
│  • Reportes      │     └─────────────────┘           │
│  • Usuarios      │                                   │
│                  │     ┌─────────────────┐           │
│                  │     │ Gráficos        │           │
│                  │     │ [Charts]        │           │
│                  │     └─────────────────┘           │
│                  │                                   │
│                  │     ┌─────────────────┐           │
│                  │     │ Listado         │           │
│                  │     │ [Tablas]        │           │
│                  │     └─────────────────┘           │
└──────────────────┴──────────────────────────────────┘
```

**Cambios Clave:**
- ✅ Breadcrumbs visibles
- ✅ Sidebar fijo y claro
- ✅ Sección activa destacada
- ✅ Layout de 3 columnas

---

### 1.2 Formulario Multi-paso - Lo-Fi

```
┌──────────────────────────────────────────────┐
│ LOGO  [Menu]  [Perfil] [Salir]               │
├──────────────────────────────────────────────┤
│ Home > Pruebas > Nueva Prueba                │ <- BREADCRUMBS
├──────────────────────────────────────────────┤
│                                              │
│ STEPPER:                                     │
│ [1.Básica] → [2.Participantes] → [3.Tareas]│
│  ✓ ACTUAL       SIGUIENTE       SIGUIENTE   │
│                                              │
├──────────────────────────────────────────────┤
│                                              │
│ PASO 1: INFORMACIÓN BÁSICA                   │
│                                              │
│ Nombre: [________________]                   │
│ ? Información para identificar la prueba     │ <- TOOLTIP
│                                              │
│ Descripción: [________________]              │
│ ? Detalles sobre los objetivos              │
│                                              │
│ [Cancelar]  [Siguiente →]                    │
│                                              │
└──────────────────────────────────────────────┘
```

**Cambios Clave:**
- ✅ Stepper/Pasos visible
- ✅ Breadcrumbs activos
- ✅ Tooltips informativos
- ✅ Botones: Cancelar y Siguiente
- ✅ Barra de progreso

---

### 1.3 Validaciones y Errores - Lo-Fi

```
┌──────────────────────────────────────────────┐
│ Email: [usuario@email.com] ✓                 │ <- VÁLIDO
│                                              │
│ Teléfono: [123___] ⚠                        │ <- EN PROGRESO
│ Formato esperado: (XXX) XXX-XXXX            │
│                                              │
│ Contraseña: [password] ✗                    │ <- ERROR
│ ⛔ Mínimo 8 caracteres, 1 mayúscula,       │
│    1 número                                  │
│                                              │
│ [Enviar]  [Cancelar]                         │
└──────────────────────────────────────────────┘
```

**Cambios Clave:**
- ✅ Iconos de validación (✓, ⚠, ✗)
- ✅ Mensajes contextuales claros
- ✅ Validación en tiempo real
- ✅ Colores diferenciados

---

## 2️⃣ WIREFRAMES MID-FI (Fidelidad Media)

### 2.1 Dashboard Principal - Mid-Fi

```
┌────────────────────────────────────────────────────────────────┐
│ 🏠 LOGO    [≡ Menu] [🔍 Buscar] [🔔 Notificaciones] [👤 Admin] │
├────────────────────────────────────────────────────────────────┤
│ Home › Dashboard › Análisis UX                                  │ <- Navegación
├─────────────────┬────────────────────────────────────────────┤
│                 │                                            │
│  📋 NAVEGACIÓN  │  CONTENIDO PRINCIPAL                       │
│  ────────────   │  ════════════════════                      │
│  • 🏠 Inicio    │                                            │
│  • 📊 Pruebas   │  ┌─────────┬─────────┬─────────┐          │
│  • 🐛 Hallazgos │  │ Pruebas │ Usuarios│ Hallazgos           │
│  • 📈 Reportes  │  │   42    │   15    │   128    │          │
│  • 👥 Usuarios  │  │ Activas │ Totales │ Pendientes           │
│  • ⚙️ Config    │  └─────────┴─────────┴─────────┘          │
│                 │                                            │
│  [+ Nuevo]      │  📊 Gráfico de Tendencias                 │
│                 │  ┌──────────────────────────┐             │
│                 │  │ [Línea ascendente]       │             │
│                 │  │ Pruebas por Mes          │             │
│                 │  └──────────────────────────┘             │
│                 │                                            │
│                 │  📋 Últimas Pruebas                        │
│                 │  ┌────────────────────────┐               │
│                 │  │ ID │ Nombre │ Estado   │               │
│                 │  ├────┼────────┼──────────┤               │
│                 │  │ 001│ Prueba1│ ✓ Activa │               │
│                 │  │ 002│ Prueba2│ ⏸ Pausa │               │
│                 │  │ 003│ Prueba3│ ✓ Activa │               │
│                 │  └────────────────────────┘               │
│                 │                                            │
└─────────────────┴────────────────────────────────────────────┘
```

**Mejoras Aplicadas:**
- ✅ Iconografía consistente
- ✅ Jerarquía visual clara
- ✅ Cards para métricas
- ✅ Navegación destacada
- ✅ Espaciado mejorado

---

### 2.2 Formulario con Stepper - Mid-Fi

```
┌────────────────────────────────────────────────────┐
│ LOGO    [Menu] [👤]                                │
├────────────────────────────────────────────────────┤
│ Home › Nueva Prueba                                 │
├────────────────────────────────────────────────────┤
│                                                    │
│  PASOS:  ④────④────④                             │
│         │    1    │    │    2    │    │    3    │   │
│         └────────┘────────────┘────────────────┘   │
│         Información  Participantes    Tareas       │
│                                                    │
├────────────────────────────────────────────────────┤
│                                                    │
│ PASO 1: INFORMACIÓN DE LA PRUEBA                  │
│                                                    │
│ Nombre de la Prueba *                             │
│ ┌──────────────────────────────────────┐          │
│ │ Ingrese nombre descriptivo           │          │
│ └──────────────────────────────────────┘          │
│ ℹ️ Será visible en reportes y listados             │
│                                                    │
│ Descripción *                                     │
│ ┌──────────────────────────────────────┐          │
│ │ Describa los objetivos...            │          │
│ └──────────────────────────────────────┘          │
│ ℹ️ Máximo 500 caracteres                           │
│                                                    │
│ Tipo de Prueba *                                  │
│ ┌──────────────────────────────────────┐          │
│ │ ▼ Seleccionar tipo                   │          │
│ └──────────────────────────────────────┘          │
│ ℹ️ Usabilidad, A/B Testing, Evaluación...          │
│                                                    │
│                   [← Atrás]  [Siguiente →]        │
│                                                    │
└────────────────────────────────────────────────────┘
```

**Mejoras Aplicadas:**
- ✅ Stepper visible y claro
- ✅ Campos con placeholders
- ✅ Etiquetas claras
- ✅ Iconos informativos
- ✅ Validación por campo
- ✅ Botones contextuales

---

### 2.3 Manejo de Errores - Mid-Fi

```
┌────────────────────────────────────────┐
│ Email *                                │
│ ┌────────────────────────────────────┐ │
│ │ usuario@example.com    ✓           │ │
│ └────────────────────────────────────┘ │
│ Campo válido                            │
│                                        │
│ Teléfono *                             │
│ ┌────────────────────────────────────┐ │
│ │ +34 91 234 5678       ⏳            │ │
│ └────────────────────────────────────┘ │
│ Validando...                            │
│                                        │
│ Contraseña *                           │
│ ┌────────────────────────────────────┐ │
│ │ ••••••••               ✗           │ │
│ └────────────────────────────────────┘ │
│ ⛔️ Error: Mínimo 8 caracteres          │
│    Debe incluir: MAYÚS, números, símb. │
│                                        │
│ [Enviar]  [Cancelar]                   │
└────────────────────────────────────────┘
```

---

## 3️⃣ WIREFRAMES HI-FI (Alta Fidelidad)

### 3.1 Dashboard Principal - Hi-Fi

**Componentes Visuales:**

```
┌──────────────────────────────────────────────────────────────────┐
│ [Logo] USABILITY DASHBOARD    [🔍] [🔔 3] [👤 Admin ▼] [⏻ Salir] │
├──────────────────────────────────────────────────────────────────┤
│ Home / Dashboard / Análisis UX                                    │
├────────────┬─────────────────────────────────────────────────────┤
│ 📋 Menú    │                                                     │
│            │ MÉTRICAS CLAVE                                     │
│ ✓ Inicio   │ ┌──────────┐ ┌──────────┐ ┌──────────┐             │
│ Pruebas    │ │   📊     │ │   👥     │ │   ✓      │             │
│ Hallazgos  │ │   42     │ │   15     │ │   128    │             │
│ Reportes   │ │ Pruebas  │ │ Usuarios │ │Hallazgos │             │
│ Usuarios   │ │ Activas  │ │ Totales  │ │Pendientes│             │
│ Config     │ └──────────┘ └──────────┘ └──────────┘             │
│            │                                                     │
│ [+ Nueva]  │ TENDENCIA MENSUAL                                  │
│            │ ┌─────────────────────────────────┐                │
│ ────────── │ │  █              Pruebas Mes    │                │
│ Filtros:   │ │  ██  █          ████            │                │
│ [Estado▼]  │ │  ███ ██ ███     ████ █          │                │
│ [Tipo▼]    │ │  ███ ██ ███ ███ ████ █ ████    │                │
│ [Mes▼]     │ │  En  Fe  Ma  Ab  Ma   Ju       │                │
│            │ └─────────────────────────────────┘                │
│            │                                                     │
│            │ ÚLTIMAS PRUEBAS                                    │
│            │ ┌──────────────────────────────────┐               │
│            │ │ ID   │ Nombre       │ Estado    │               │
│            │ ├──────┼──────────────┼───────────┤               │
│            │ │ 001  │ Prueba Login │ ✓ Activa  │               │
│            │ │ 002  │ Dashboard UX │ ⏸ Pausada │               │
│            │ │ 003  │ Forms UX     │ ✓ Activa  │               │
│            │ │ 004  │ Mobile Test  │ ✓ Activa  │               │
│            │ └──────────────────────────────────┘               │
│            │ [Ver Más...]                                       │
│            │                                                     │
└────────────┴─────────────────────────────────────────────────────┘
```

**Paleta de Colores Hi-Fi:**
- Primario: #0066CC (Azul profesional)
- Éxito: #22C55E (Verde)
- Error: #EF4444 (Rojo)
- Advertencia: #F59E0B (Naranja)
- Fondo: #F9FAFB (Gris claro)
- Texto: #1F2937 (Gris oscuro)

---

### 3.2 Formulario Mejorado Hi-Fi

```
┌─────────────────────────────────────────────────────┐
│ NUEVA PRUEBA DE USABILIDAD                          │
├─────────────────────────────────────────────────────┤
│                                                     │
│ PASOS: ◉─────◯─────◯                               │
│        1      2      3                              │
│     Básica  Participantes  Tareas                   │
│                                                     │
├─────────────────────────────────────────────────────┤
│                                                     │
│ INFORMACIÓN BÁSICA                                  │
│                                                     │
│ Nombre de Prueba *                                 │
│ ┌─────────────────────────────────────┐            │
│ │ Título descriptivo...               │ ✓         │
│ └─────────────────────────────────────┘            │
│ 💡 Máximo 100 caracteres                            │
│                                                     │
│ Descripción *                                      │
│ ┌─────────────────────────────────────┐            │
│ │ Describa los objetivos de la prueba │            │
│ │ (Máximo 500 caracteres)             │            │
│ │                                     │            │
│ │                              0/500  │            │
│ └─────────────────────────────────────┘            │
│                                                     │
│ Tipo de Prueba *                                   │
│ ┌─────────────────────────────────────┐            │
│ │ ▼ Seleccionar tipo...               │            │
│ └─────────────────────────────────────┘            │
│                                                     │
│ Aplicativo Objetivo *                              │
│ ┌─────────────────────────────────────┐            │
│ │ ▼ Dashboard UX Análisis             │            │
│ └─────────────────────────────────────┘            │
│                                                     │
│                                                     │
│              [← Atrás]  [Siguiente →]              │
│                                                     │
└─────────────────────────────────────────────────────┘
```

---

## 📐 Leyes de Gestalt Aplicadas

### 1. Proximidad
- Campos agrupados por secciones
- Espacio entre grupos diferentes
- Botones de acción juntos

### 2. Similitud
- Iconos consistentes
- Colores significativos
- Tipografía uniforme

### 3. Continuidad
- Líneas guía en stepper
- Flujo visual claro
- Navegación progresiva

### 4. Cierre
- Tarjetas definidas
- Bordes claros
- Agrupación visual

### 5. Figura-Fondo
- Contraste entre elementos
- Jerarquía visual clara
- Elementos activos destacados

---

## 🎨 Guía de Estilos Hi-Fi

| Elemento | Especificación |
|----------|----------------|
| **Tipografía** | Títulos: 24px Bold, Body: 14px Regular, Labels: 12px Medium |
| **Colores** | Primario: #0066CC, Éxito: #22C55E, Error: #EF4444 |
| **Espaciado** | Padding: 16px, Margin: 24px, Gap: 12px |
| **Bordes** | Border-radius: 8px, Stroke: 1px #E5E7EB |
| **Sombras** | Box-shadow: 0 1px 3px rgba(0,0,0,0.1) |
| **Transiciones** | Duración: 200ms, Easing: ease-in-out |

---

## ✅ Validación de Wireframes

- ✓ Lo-Fi: Estructura y flujo definidos
- ✓ Mid-Fi: Componentes y estilos detallados
- ✓ Hi-Fi: Paleta completa y especificaciones finales
- ✓ Accesibilidad: Contraste WCAG AA mínimo
- ✓ Responsividad: Desktop, Tablet, Mobile considerados
