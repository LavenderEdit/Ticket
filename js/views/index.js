import { deslogearUsuario } from '../api/authService.js?v=3';
import { openNotificationModal } from '../components/modal-notification.js';
import { openConfirmModal } from '../components/modal-confirm.js';

export function initLogoutButton() {
    const btnLogout = document.getElementById('btnLogout');
    if (!btnLogout) return;

    btnLogout.addEventListener('click', (e) => {
        e.preventDefault();

        openConfirmModal({
            title: 'Confirmar cierre de sesión',
            message: '¿Estás seguro de que deseas cerrar sesión?',
            confirmText: 'Sí, cerrar sesión',
            cancelText: 'No, cancelar',
            onConfirm: async () => {
                try {
                    await deslogearUsuario();
                    openNotificationModal({
                        title: 'Sesión cerrada',
                        message: 'Has cerrado sesión correctamente.',
                        onClose: () => {
                            window.location.href = './views/auth/login.php';
                        }
                    });
                } catch (err) {
                    console.error(err);
                    openNotificationModal({
                        title: 'Error',
                        message: 'No se pudo cerrar la sesión. Intenta nuevamente más tarde.'
                    });
                }
            }
        });
    });
}
