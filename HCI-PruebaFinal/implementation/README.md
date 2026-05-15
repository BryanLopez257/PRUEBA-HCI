# Implementación: cómo integrar los componentes en Laravel

Archivos incluidos en esta carpeta:
- `components/` -> ejemplos de blades: `breadcrumbs.blade.php`, `stepper.blade.php`, `loader.blade.php`
- `styles/` -> `styles.css` (estilos base)
- `scripts/` -> `validation.js` (validaciones en tiempo real)

Pasos rápidos para integrar en un proyecto Laravel:

1. Copiar los blades a `resources/views/components/` o incluirlos desde tu layout:

   - `resources/views/components/breadcrumbs.blade.php`

2. Incluir los estilos y scripts en tus layouts (ejemplo en `resources/views/layouts/app.blade.php`):

```html
<link rel="stylesheet" href="/path-to/HCI-PruebaFinal/implementation/styles/styles.css">
<script src="/path-to/HCI-PruebaFinal/implementation/scripts/validation.js" defer></script>
```

3. Usar el componente breadcrumbs en una vista:

```php
<?php $breadcrumbs = [['label'=>'Inicio','url'=>route('home')], ['label'=>'Dashboard']]; ?>
@include('components.breadcrumbs', ['breadcrumbs'=>$breadcrumbs])
```

4. Validaciones en formulario (ejemplo):

```html
<input name="email" id="email" data-validate="required" data-error-id="email-error">
<div id="email-error"></div>
```

Notas:
- Estos archivos son ejemplo; adapta rutas y nombres para tu estructura de proyecto.
