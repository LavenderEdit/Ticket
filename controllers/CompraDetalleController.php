<?php
namespace Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/CompraDetalle.php';

use Database\Database;
use Models\CompraDetalle;
use Controllers\Controller;

class CompraDetalleController extends Controller
{
    private CompraDetalle $compraDetalleModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->compraDetalleModel = new CompraDetalle($pdo);
    }

    protected function getAll(): void
    {
        $compraDetalles = $this->compraDetalleModel->visualizarCompraDetalles();
        $this->sendResponse(200, $compraDetalles);
    }

    protected function get(int $id): void
    {
        $compraDetalle = $this->compraDetalleModel->visualizarCompraDetallePorId($id);
        if ($compraDetalle) {
            $this->sendResponse(200, $compraDetalle);
        } else {
            $this->sendResponse(404, ['message' => 'CompraDetalle no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos.']);
            return;
        }

        $compra_id = isset($data['compra_id']) ? intval($data['compra_id']) : 0;
        $componente = $data['componente'] ?? '';
        $cantidad = isset($data['cantidad']) ? intval($data['cantidad']) : 0;
        $precio = isset($data['precio']) ? floatval($data['precio']) : 0.0;

        $resultado = $this->compraDetalleModel->insertarCompraDetalle($compra_id, $componente, $cantidad, $precio);

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'CompraDetalle creado correctamente.' : 'Error al crear CompraDetalle.'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos.']);
            return;
        }

        $compra_id = isset($data['compra_id']) ? intval($data['compra_id']) : 0;
        $componente = $data['componente'] ?? '';
        $cantidad = isset($data['cantidad']) ? intval($data['cantidad']) : 0;
        $precio = isset($data['precio']) ? floatval($data['precio']) : 0.0;
        $activo = isset($data['activo']) ? (bool) $data['activo'] : true;

        $resultado = $this->compraDetalleModel->editarCompraDetalle($id, $compra_id, $componente, $cantidad, $precio, $activo);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'CompraDetalle actualizado correctamente.' : 'Error al actualizar CompraDetalle.'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->compraDetalleModel->eliminarCompraDetalle($id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'CompraDetalle eliminado correctamente.' : 'Error al eliminar CompraDetalle.'
        ]);
    }
}