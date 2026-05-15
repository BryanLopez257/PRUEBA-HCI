<?php

namespace App\Traits;

use Illuminate\Validation\Validator;

/**
 * Trait para Validaciones en Tiempo Real
 * 
 * Mejora UX HCI-005: Prevención de errores
 * Proporciona validaciones claras y mensajes contextuales
 * 
 * @package App\Traits
 */
trait FormValidationTrait
{
    /**
     * Validación de email en tiempo real
     * 
     * @param string $email Email a validar
     * @return array ['valid' => bool, 'message' => string, 'icon' => string]
     */
    public static function validateEmail(string $email): array
    {
        if (empty($email)) {
            return [
                'valid' => null,
                'message' => 'Ingrese un email',
                'icon' => 'pending'
            ];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'valid' => false,
                'message' => 'Formato de email inválido',
                'icon' => 'error',
                'severity' => 'error'
            ];
        }

        return [
            'valid' => true,
            'message' => 'Email válido',
            'icon' => 'success',
            'severity' => 'success'
        ];
    }

    /**
     * Validación de contraseña en tiempo real
     * 
     * Requisitos:
     * - Mínimo 8 caracteres
     * - Al menos 1 mayúscula
     * - Al menos 1 número
     * - Al menos 1 carácter especial
     * 
     * @param string $password Contraseña a validar
     * @return array Resultado detallado de validación
     */
    public static function validatePassword(string $password): array
    {
        $response = [
            'valid' => true,
            'message' => '',
            'requirements' => [],
            'icon' => 'pending'
        ];

        // Validar longitud
        if (strlen($password) < 8) {
            $response['valid'] = false;
            $response['requirements']['length'] = [
                'met' => false,
                'text' => 'Mínimo 8 caracteres'
            ];
        } else {
            $response['requirements']['length'] = [
                'met' => true,
                'text' => 'Mínimo 8 caracteres'
            ];
        }

        // Validar mayúscula
        if (!preg_match('/[A-Z]/', $password)) {
            $response['valid'] = false;
            $response['requirements']['uppercase'] = [
                'met' => false,
                'text' => 'Al menos 1 mayúscula'
            ];
        } else {
            $response['requirements']['uppercase'] = [
                'met' => true,
                'text' => 'Al menos 1 mayúscula'
            ];
        }

        // Validar número
        if (!preg_match('/[0-9]/', $password)) {
            $response['valid'] = false;
            $response['requirements']['number'] = [
                'met' => false,
                'text' => 'Al menos 1 número'
            ];
        } else {
            $response['requirements']['number'] = [
                'met' => true,
                'text' => 'Al menos 1 número'
            ];
        }

        // Validar carácter especial
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $response['valid'] = false;
            $response['requirements']['special'] = [
                'met' => false,
                'text' => 'Al menos 1 carácter especial (!@#$%^&*)'
            ];
        } else {
            $response['requirements']['special'] = [
                'met' => true,
                'text' => 'Al menos 1 carácter especial (!@#$%^&*)'
            ];
        }

        // Establecer mensaje e icono
        if ($response['valid']) {
            $response['message'] = 'Contraseña fuerte';
            $response['icon'] = 'success';
            $response['severity'] = 'success';
        } else {
            $response['message'] = 'Contraseña débil';
            $response['icon'] = 'error';
            $response['severity'] = 'error';
        }

        return $response;
    }

    /**
     * Validación de nombre en tiempo real
     * 
     * @param string $name Nombre a validar
     * @return array Resultado de validación
     */
    public static function validateName(string $name): array
    {
        if (empty($name)) {
            return [
                'valid' => null,
                'message' => 'Ingrese un nombre',
                'icon' => 'pending'
            ];
        }

        if (strlen($name) < 3) {
            return [
                'valid' => false,
                'message' => 'Mínimo 3 caracteres',
                'icon' => 'error',
                'severity' => 'error'
            ];
        }

        if (strlen($name) > 100) {
            return [
                'valid' => false,
                'message' => 'Máximo 100 caracteres',
                'icon' => 'error',
                'severity' => 'error'
            ];
        }

        return [
            'valid' => true,
            'message' => 'Nombre válido',
            'icon' => 'success',
            'severity' => 'success'
        ];
    }

    /**
     * Validación de teléfono en tiempo real
     * 
     * @param string $phone Teléfono a validar
     * @return array Resultado de validación
     */
    public static function validatePhone(string $phone): array
    {
        if (empty($phone)) {
            return [
                'valid' => null,
                'message' => 'Ingrese un teléfono',
                'icon' => 'pending'
            ];
        }

        // Remover caracteres especiales
        $clean = preg_replace('/[^0-9+]/', '', $phone);

        if (strlen($clean) < 10) {
            return [
                'valid' => false,
                'message' => 'Teléfono muy corto',
                'icon' => 'error',
                'severity' => 'error'
            ];
        }

        if (strlen($clean) > 15) {
            return [
                'valid' => false,
                'message' => 'Teléfono muy largo',
                'icon' => 'error',
                'severity' => 'error'
            ];
        }

        return [
            'valid' => true,
            'message' => 'Teléfono válido',
            'icon' => 'success',
            'severity' => 'success'
        ];
    }

    /**
     * Generar mensaje de error contextual
     * 
     * @param string $field Campo del formulario
     * @param string $rule Regla de validación fallida
     * @return string Mensaje amigable
     */
    public static function getContextualErrorMessage(string $field, string $rule): string
    {
        $messages = [
            'required' => "El campo {$field} es obligatorio",
            'email' => "Ingrese un email válido en {$field}",
            'min' => "El campo {$field} es muy corto",
            'max' => "El campo {$field} excede el límite de caracteres",
            'unique' => "Este {$field} ya existe en el sistema",
            'confirmed' => "Los {$field} no coinciden",
            'numeric' => "El campo {$field} debe ser un número",
            'date' => "Ingrese una fecha válida en {$field}",
        ];

        return $messages[$rule] ?? "Error en el campo {$field}";
    }
}
