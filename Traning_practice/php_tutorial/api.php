<?php
// PHP API Development

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Simple REST API example
class SimpleAPI {
    private $data = array(
        array('id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'),
        array('id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'),
        array('id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com')
    );

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $request = isset($_GET['request']) ? $_GET['request'] : '';

        switch ($method) {
            case 'GET':
                $this->handleGet($request);
                break;
            case 'POST':
                $this->handlePost();
                break;
            case 'PUT':
                $this->handlePut($request);
                break;
            case 'DELETE':
                $this->handleDelete($request);
                break;
            default:
                $this->sendResponse(405, array('error' => 'Method not allowed'));
        }
    }

    private function handleGet($request) {
        if (empty($request)) {
            // Get all users
            $this->sendResponse(200, $this->data);
        } elseif (is_numeric($request)) {
            // Get specific user
            $user = $this->findUser($request);
            if ($user) {
                $this->sendResponse(200, $user);
            } else {
                $this->sendResponse(404, array('error' => 'User not found'));
            }
        } else {
            $this->sendResponse(400, array('error' => 'Invalid request'));
        }
    }

    private function handlePost() {
        $input = json_decode(file_get_contents('php://input'), true);
        if ($input && isset($input['name']) && isset($input['email'])) {
            $newUser = array(
                'id' => count($this->data) + 1,
                'name' => $input['name'],
                'email' => $input['email']
            );
            $this->data[] = $newUser;
            $this->sendResponse(201, $newUser);
        } else {
            $this->sendResponse(400, array('error' => 'Invalid input data'));
        }
    }

    private function handlePut($request) {
        if (!is_numeric($request)) {
            $this->sendResponse(400, array('error' => 'Invalid user ID'));
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $userIndex = $this->findUserIndex($request);

        if ($userIndex !== false && $input) {
            $this->data[$userIndex]['name'] = $input['name'] ?? $this->data[$userIndex]['name'];
            $this->data[$userIndex]['email'] = $input['email'] ?? $this->data[$userIndex]['email'];
            $this->sendResponse(200, $this->data[$userIndex]);
        } else {
            $this->sendResponse(404, array('error' => 'User not found'));
        }
    }

    private function handleDelete($request) {
        if (!is_numeric($request)) {
            $this->sendResponse(400, array('error' => 'Invalid user ID'));
            return;
        }

        $userIndex = $this->findUserIndex($request);
        if ($userIndex !== false) {
            $deletedUser = $this->data[$userIndex];
            array_splice($this->data, $userIndex, 1);
            $this->sendResponse(200, array('message' => 'User deleted', 'user' => $deletedUser));
        } else {
            $this->sendResponse(404, array('error' => 'User not found'));
        }
    }

    private function findUser($id) {
        foreach ($this->data as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }
        return false;
    }

    private function findUserIndex($id) {
        foreach ($this->data as $index => $user) {
            if ($user['id'] == $id) {
                return $index;
            }
        }
        return false;
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }
}

// Handle the API request
$api = new SimpleAPI();
$api->handleRequest();
?>