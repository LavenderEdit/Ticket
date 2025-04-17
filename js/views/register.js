import { registrarUsuario } from '../api/usuarioService.js?v=1';
import { togglePasswordVisibility } from '../lib/utils/script-functions.js';
import { openNotificationModal } from '../components/modal-notification.js';

export function initRegisterForm() {
  togglePasswordVisibility();

  const form = document.getElementById('formRegister');
  if (!form) {
    console.error('No se encontró el formulario de registro (formRegister).');
    return;
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const pass = document.getElementById('contrasena').value;
    const passConfirm = document.getElementById('contrasena_confirm').value;

    if (pass !== passConfirm) {
      openNotificationModal({
        title: "Error",
        message: "Las contraseñas no coinciden. Verifica por favor."
      });
      return;
    }

    const data = {
      nombre: document.getElementById('nombre').value.trim(),
      telefono: document.getElementById('telefono').value.trim(),
      email: document.getElementById('email').value.trim(),
      fecha_logeo: '',
      contrasena: pass,
      id_rol: document.getElementById('id_rol').value
    };

    try {
      const result = await registrarUsuario(data);
      openNotificationModal({
        title: result.message.toLowerCase().includes('creado') ? "Registro Exitoso" : "Error",
        message: result.message,
        onClose: () => {
          if (result.message.toLowerCase().includes('creado')) {
            window.location.href = './views/auth/login.php';
          }
        }
      });
    } catch (error) {
      console.error('Error en el registro:', error);
      openNotificationModal({
        title: "Error",
        message: "Error en el registro. Intenta nuevamente."
      });
    }
  });
}
