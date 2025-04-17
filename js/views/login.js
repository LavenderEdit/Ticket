// /js/views/login.js

import { logearUsuario } from '../api/authService.js?v=1';
import { togglePasswordVisibility } from '../lib/utils/script-functions.js';
import { openNotificationModal } from '../components/modal-notification.js';

export function initLoginForm() {
    togglePasswordVisibility();

    const form = document.getElementById('formLogin');
    if (!form) {
        console.error('No se encontró el formulario de login (formLogin).');
        return;
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const correo = document.getElementById('correo').value.trim();
        const contra = document.getElementById('contra').value;

        if (!correo || !contra) {
            openNotificationModal({
                title: 'Datos requeridos',
                message: 'Por favor ingresa tu usuario y contraseña.'
            });
            return;
        }

        try {
            const result = await logearUsuario({ correo, contra });
            if (result.message.toLowerCase().includes('exitoso') || result.message.toLowerCase().includes('login exitoso')) {
                openNotificationModal({
                    title: 'Bienvenido',
                    message: result.message,
                    onClose: () => {
                        window.location.href = './views/dashboard.php';
                    }
                });
            } else {
                openNotificationModal({
                    title: 'Error',
                    message: result.message
                });
            }
        } catch (err) {
            console.error('Error en la solicitud de login:', err);
            openNotificationModal({
                title: 'Error de conexión',
                message: 'No se pudo conectar al servidor. Intenta nuevamente.'
            });
        }
    });
}
