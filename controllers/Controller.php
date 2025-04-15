<?php
namespace Controllers;

abstract class Controller
{
    public function handleRequest(string $method, ?int $id = null): void
    {
        switch (strtoupper($method)) {
            case 'GET':
                if ($id !== null) {
                    $this->get($id);
                } else {
                    $this->getAll();
                }
                break;
            case 'POST':
                $this->post();
                break;
            case 'PUT':
                if ($id !== null) {
                    $this->put($id);
                } else {
                    $this->sendResponse(400, ['message' => 'ID requerido para PUT']);
                }
                break;
            case 'DELETE':
                if ($id !== null) {
                    $this->delete($id);
                } else {
                    $this->sendResponse(400, ['message' => 'ID requerido para DELETE']);
                }
                break;
            default:
                $this->sendResponse(405, ['message' => 'Método no permitido']);
        }
    }

    abstract protected function getAll(): void;
    abstract protected function get(int $id): void;
    abstract protected function post(): void;
    abstract protected function put(int $id): void;
    abstract protected function delete(int $id): void;

    protected function sendResponse(int $statusCode, $data): void
    {
        header("Content-Type: application/json");
        http_response_code($statusCode);
        echo json_encode($data);
    }
}
