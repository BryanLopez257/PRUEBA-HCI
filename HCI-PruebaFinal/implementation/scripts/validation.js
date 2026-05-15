// Script de validación en tiempo real (ejemplo)
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('input[data-validate]').forEach(function(input){
    input.addEventListener('input', function(){
      const rule = input.getAttribute('data-validate');
      const target = document.getElementById(input.getAttribute('data-error-id'));
      let valid = true;
      if(rule === 'required') valid = input.value.trim().length > 0;
      if(!valid){
        target && (target.textContent = 'Este campo es obligatorio', target.classList.add('hci-error'));
      } else {
        target && (target.textContent = '', target.classList.remove('hci-error'));
      }
    });
  });
});
