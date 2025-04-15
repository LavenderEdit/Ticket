<?php
namespace Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Compra.php';

use Database\Database;
use Models\Compra;
use Controllers\Controller;

class CompraController extends Controller
{
    private Compra $compraModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->compraModel = new Compra($pdo);
    }

    protected function getAll(): void
    {
        $compras = $this->compraModel->visualizarCompras();
        $this->sendResponse(200, $compras);
    }

    protected function get(int $id): void
    {
        $compra = $this->compraModel->visualizarCompraPorId($id);
        if ($compra) {
            $this->sendResponse(200, $compra);
        } else {
            $this->sendResponse(404, ['message' => 'Compra no encontrada.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos.']);
            return;
        }

        $tecnico_id = isset($data['tecnico_id']) ? intval($data['tecnico_id']) : 0;
        $total = isset($data['total']) ? floatval($data['total']) : 0.0;

        $resultado = $this->compraModel->insertarCompra($tecnico_id, $total);

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'Compra creada correctamente.' : 'Error al crear Compra.'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos.']);
            return;
        }

        $tecnico_id = isset($data['tecnico_id']) ? intval($data['tecnico_id']) : 0;
        $total = isset($data['total']) ? floatval($data['total']) : 0.0;
        $activo = isset($data['activo']) ? (bool) $data['activo'] : true;

        $resultado = $this->compraModel->editarCompra($id, $tecnico_id, $total, $activo);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Compra actualizada correctamente.' : 'Error al actualizar Compra.'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->compraModel->eliminarCompra($id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Compra eliminada correctamente.' : 'Error al eliminar Compra.'
        ]);
    }
}
