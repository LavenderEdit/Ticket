<?php
namespace Controllers;

abstract class Controller
{
    /**
     * @param string|null
     * @param string
     * @param int|null
     */
    public function handleRequest(?string $action, string $method, ?int $id = null): void
    {
        $action = $action ? strtolower($action) : null;
        $method = strtoupper($method);

        if ($action === 'login') {
            if ($method === 'POST') {
                $this->login();
            } else {
                $this->sendResponse(405, ['message' => 'Método no permitido para login.']);
            }
            return;
        }
        if ($action === 'logout') {
            if ($method === 'POST') {
                $this->logout();
            } else {
                $this->sendResponse(405, ['message' => 'Método no permitido para logout.']);
            }
            return;
        }

        switch ($method) {
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
                $this->sendResponse(405, ['message' => 'Método HTTP no soportado.']);
                break;
        }
    }

    abstract protected function getAll(): void;
    abstract protected function get(int $id): void;
    abstract protected function post(): void;
    abstract protected function put(int $id): void;
    abstract protected function delete(int $id): void;

    abstract protected function login(): void;
    abstract protected function logout(): void;

    protected function sendResponse(int $statusCode, $data): void
    {
        header("Content-Type: application/json");
        http_response_code($statusCode);
        echo json_encode($data);
    }
}
