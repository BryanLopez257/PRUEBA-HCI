<template>
  <!-- 
    Componente Confirmation Modal
    
    Mejora UX HCI-006: Control del usuario y prevención de errores
    Cumple con heurística Nielsen #3: Control del usuario y libertad
    
    Uso:
    <ConfirmationModal 
      :show="showModal"
      title="¿Eliminar prueba?"
      message="Esta acción no se puede deshacer"
      @confirm="handleDelete"
      @cancel="showModal = false"
    />
  -->

  <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center">
    <!-- Backdrop oscuro -->
    <transition name="fade">
      <div
        v-if="show"
        class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"
        @click="handleCancel"
      />
    </transition>

    <!-- Modal -->
    <transition name="modal">
      <div
        v-if="show"
        class="relative bg-white rounded-lg shadow-xl max-w-md w-full mx-4 overflow-hidden"
        role="alertdialog"
        :aria-labelledby="titleId"
        :aria-describedby="messageId"
        aria-modal="true"
      >
        <!-- Encabezado con icono -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-red-50 to-orange-50">
          <div class="flex items-start">
            <!-- Icono de alerta -->
            <svg class="w-6 h-6 text-red-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>

            <!-- Título -->
            <h3 :id="titleId" class="text-lg font-semibold text-gray-900">
              {{ title }}
            </h3>
          </div>
        </div>

        <!-- Contenido -->
        <div class="px-6 py-4">
          <p :id="messageId" class="text-gray-600 text-sm leading-relaxed">
            {{ message }}
          </p>

          <!-- Detalles adicionales si existen -->
          <div v-if="$slots.details" class="mt-4 p-3 bg-gray-50 rounded border border-gray-200">
            <slot name="details" />
          </div>
        </div>

        <!-- Footer con botones -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex gap-3 justify-end">
          <!-- Botón Cancelar -->
          <button
            class="
              px-4 py-2 text-sm font-medium text-gray-700 bg-white
              border border-gray-300 rounded-lg
              hover:bg-gray-50 hover:border-gray-400
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500
              transition-all duration-200
            "
            @click="handleCancel"
            @keydown.enter="handleCancel"
          >
            Cancelar
          </button>

          <!-- Botón Confirmar (Destructivo) -->
          <button
            class="
              px-4 py-2 text-sm font-medium text-white bg-red-600
              rounded-lg hover:bg-red-700 hover:shadow-lg
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500
              transition-all duration-200
              disabled:opacity-50 disabled:cursor-not-allowed
            "
            @click="handleConfirm"
            @keydown.enter="handleConfirm"
            :disabled="confirmLoading"
          >
            <span v-if="!confirmLoading" class="flex items-center">
              {{ confirmLabel }}
            </span>
            <span v-else class="flex items-center gap-2">
              <svg class="w-4 h-4 animate-spin" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.5 1.5a8.5 8.5 0 100 17 8.5 8.5 0 000-17zM0 10a10 10 0 1120 0 10 10 0 01-20 0z" fill-opacity="0.3" />
                <path d="M10 3a7 7 0 110 14 7 7 0 010-14z" fill-opacity="0.3" />
              </svg>
              Procesando...
            </span>
          </button>
        </div>

        <!-- Cerrar con ESC hint -->
        <div class="absolute top-4 right-4">
          <button
            class="
              text-gray-400 hover:text-gray-600
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500
              rounded
            "
            @click="handleCancel"
            aria-label="Cerrar"
            title="Presione ESC"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: 'ConfirmationModal',
  props: {
    show: {
      type: Boolean,
      required: true
    },
    title: {
      type: String,
      default: '¿Está seguro?'
    },
    message: {
      type: String,
      default: 'Esta acción no se puede deshacer.'
    },
    confirmLabel: {
      type: String,
      default: 'Eliminar'
    },
    cancelLabel: {
      type: String,
      default: 'Cancelar'
    },
    confirmLoading: {
      type: Boolean,
      default: false
    },
    dangerMode: {
      type: Boolean,
      default: true
    }
  },
  emits: ['confirm', 'cancel'],
  data() {
    return {
      titleId: `modal-title-${Math.random().toString(36).substr(2, 9)}`,
      messageId: `modal-message-${Math.random().toString(36).substr(2, 9)}`
    };
  },
  watch: {
    show(newVal) {
      if (newVal) {
        // Prevenir scroll del body
        document.body.style.overflow = 'hidden';
        // Focus en el modal
        this.$nextTick(() => {
          this.$el.querySelector('button[type="button"]:last-of-type')?.focus();
        });
      } else {
        document.body.style.overflow = 'auto';
      }
    }
  },
  mounted() {
    window.addEventListener('keydown', this.handleKeydown);
  },
  beforeUnmount() {
    window.removeEventListener('keydown', this.handleKeydown);
    document.body.style.overflow = 'auto';
  },
  methods: {
    handleConfirm() {
      if (!this.confirmLoading) {
        this.$emit('confirm');
      }
    },
    handleCancel() {
      this.$emit('cancel');
    },
    handleKeydown(event) {
      if (this.show && event.key === 'Escape') {
        this.handleCancel();
      }
    }
  }
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.modal-enter-active,
.modal-leave-active {
  transition: all 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
  transform: scale(0.95);
}

/* Animación de entrada */
@keyframes modalSlideIn {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
