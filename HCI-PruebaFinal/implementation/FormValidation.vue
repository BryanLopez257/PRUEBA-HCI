<template>
  <!-- 
    Componente Vue para Validación en Tiempo Real
    
    Mejora UX HCI-005: Validaciones claras y retroalimentación inmediata
    Cumple con heurística Nielsen #5: Prevención de errores
    
    Uso:
    <FormValidation field="email" :value="form.email" @update="form.email = $event" />
  -->
  
  <div class="form-group mb-4">
    <!-- Etiqueta del campo -->
    <label :for="fieldId" class="block text-sm font-medium text-gray-700 mb-2">
      {{ label }}
      <span v-if="required" class="text-red-500">*</span>
    </label>

    <!-- Campo de entrada -->
    <div class="relative">
      <input
        :id="fieldId"
        :type="inputType"
        :value="value"
        :placeholder="placeholder"
        :disabled="disabled"
        class="
          w-full px-4 py-2 border rounded-lg text-sm
          transition-all duration-200 focus:outline-none focus:ring-2
          focus:ring-offset-0
          aria-disabled:opacity-50 aria-disabled:cursor-not-allowed
        "
        :class="[
          inputClasses,
          getInputBorderClass()
        ]"
        @input="handleInput"
        @blur="handleBlur"
        :aria-label="label"
        :aria-invalid="validationStatus === 'error' ? 'true' : 'false'"
        :aria-describedby="validationMessage ? `${fieldId}-message` : null"
      />

      <!-- Icono de validación -->
      <div v-if="validationStatus" class="absolute right-3 top-1/2 transform -translate-y-1/2">
        <svg
          v-if="validationStatus === 'success'"
          class="w-5 h-5 text-green-500"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            fill-rule="evenodd"
            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
            clip-rule="evenodd"
          />
        </svg>

        <svg
          v-else-if="validationStatus === 'error'"
          class="w-5 h-5 text-red-500"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>

        <svg
          v-else-if="validationStatus === 'warning'"
          class="w-5 h-5 text-yellow-500 animate-pulse"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            fill-rule="evenodd"
            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
            clip-rule="evenodd"
          />
        </svg>
      </div>
    </div>

    <!-- Mensaje de validación -->
    <div
      v-if="validationMessage"
      :id="`${fieldId}-message`"
      :class="[
        'mt-1 text-sm flex items-start',
        validationStatus === 'success' && 'text-green-600',
        validationStatus === 'error' && 'text-red-600',
        validationStatus === 'warning' && 'text-yellow-600'
      ]"
      role="alert"
    >
      <span class="flex-1">{{ validationMessage }}</span>
    </div>

    <!-- Requisitos (para contraseña) -->
    <div v-if="showRequirements && validationData.requirements" class="mt-3 space-y-2">
      <div
        v-for="(req, key) in validationData.requirements"
        :key="key"
        class="flex items-center text-xs"
        :class="req.met ? 'text-green-600' : 'text-red-600'"
      >
        <svg v-if="req.met" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <svg v-else class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
        <span>{{ req.text }}</span>
      </div>
    </div>

    <!-- Contador de caracteres (si aplica) -->
    <div v-if="maxLength" class="mt-2 text-xs text-gray-500 text-right">
      {{ value.length }} / {{ maxLength }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'FormValidation',
  props: {
    label: {
      type: String,
      required: true
    },
    value: {
      type: String,
      required: true
    },
    fieldType: {
      type: String,
      default: 'text' // text, email, password, phone, etc.
    },
    placeholder: {
      type: String,
      default: ''
    },
    required: {
      type: Boolean,
      default: false
    },
    disabled: {
      type: Boolean,
      default: false
    },
    maxLength: {
      type: Number,
      default: null
    },
    inputClasses: {
      type: String,
      default: ''
    }
  },
  emits: ['update:value', 'validation-change'],
  data() {
    return {
      validationStatus: null, // 'success', 'error', 'warning', null
      validationMessage: '',
      validationData: {},
      showRequirements: false,
      debounceTimer: null,
      inputType: this.fieldType
    };
  },
  computed: {
    fieldId() {
      return `field-${this.label.toLowerCase().replace(/\s+/g, '-')}`;
    }
  },
  watch: {
    value(newVal) {
      this.validateField(newVal);
    }
  },
  methods: {
    handleInput(event) {
      let value = event.target.value;

      // Aplicar máximo de caracteres
      if (this.maxLength && value.length > this.maxLength) {
        value = value.substring(0, this.maxLength);
      }

      this.$emit('update:value', value);

      // Debounce validación
      clearTimeout(this.debounceTimer);
      this.debounceTimer = setTimeout(() => {
        this.validateField(value);
      }, 300);
    },
    handleBlur() {
      this.validateField(this.value);
    },
    validateField(value) {
      // Limpiar estado anterior
      this.validationStatus = null;
      this.validationMessage = '';
      this.validationData = {};
      this.showRequirements = false;

      // Validación según tipo
      switch (this.fieldType) {
        case 'email':
          this.validateEmail(value);
          break;
        case 'password':
          this.validatePassword(value);
          break;
        case 'phone':
          this.validatePhone(value);
          break;
        case 'text':
          this.validateText(value);
          break;
        default:
          this.validateText(value);
      }

      this.$emit('validation-change', {
        field: this.label,
        status: this.validationStatus,
        value: value
      });
    },
    validateEmail(email) {
      if (!email) {
        this.validationStatus = null;
        this.validationMessage = 'Ingrese un email';
        return;
      }

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        this.validationStatus = 'error';
        this.validationMessage = 'Formato de email inválido';
      } else {
        this.validationStatus = 'success';
        this.validationMessage = 'Email válido';
      }
    },
    validatePassword(password) {
      if (!password) {
        this.validationStatus = null;
        this.validationMessage = 'Ingrese una contraseña';
        this.showRequirements = true;
        return;
      }

      this.showRequirements = true;
      const requirements = {
        length: {
          met: password.length >= 8,
          text: 'Mínimo 8 caracteres'
        },
        uppercase: {
          met: /[A-Z]/.test(password),
          text: 'Al menos 1 mayúscula'
        },
        number: {
          met: /[0-9]/.test(password),
          text: 'Al menos 1 número'
        },
        special: {
          met: /[!@#$%^&*(),.?":{}|<>]/.test(password),
          text: 'Al menos 1 carácter especial'
        }
      };

      this.validationData = { requirements };

      const allMet = Object.values(requirements).every(req => req.met);
      if (allMet) {
        this.validationStatus = 'success';
        this.validationMessage = 'Contraseña fuerte';
      } else {
        this.validationStatus = 'error';
        this.validationMessage = 'Contraseña débil';
      }
    },
    validatePhone(phone) {
      if (!phone) {
        this.validationStatus = null;
        this.validationMessage = 'Ingrese un teléfono';
        return;
      }

      const clean = phone.replace(/[^0-9+]/g, '');
      if (clean.length < 10) {
        this.validationStatus = 'warning';
        this.validationMessage = 'Teléfono muy corto';
      } else if (clean.length > 15) {
        this.validationStatus = 'error';
        this.validationMessage = 'Teléfono muy largo';
      } else {
        this.validationStatus = 'success';
        this.validationMessage = 'Teléfono válido';
      }
    },
    validateText(text) {
      if (this.required && !text) {
        this.validationStatus = 'error';
        this.validationMessage = `${this.label} es obligatorio`;
        return;
      }

      if (text.length < 3 && text.length > 0) {
        this.validationStatus = 'warning';
        this.validationMessage = 'Mínimo 3 caracteres';
        return;
      }

      if (text) {
        this.validationStatus = 'success';
        this.validationMessage = 'Válido';
      }
    },
    getInputBorderClass() {
      if (this.validationStatus === 'success') {
        return 'border-green-500 focus:ring-green-500 focus:border-green-500';
      }
      if (this.validationStatus === 'error') {
        return 'border-red-500 focus:ring-red-500 focus:border-red-500';
      }
      if (this.validationStatus === 'warning') {
        return 'border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500';
      }
      return 'border-gray-300 focus:ring-blue-500 focus:border-blue-500';
    }
  }
};
</script>

<style scoped>
.form-group {
  animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
