<?php $admin->_authenticate();?>
<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action) {
    switch ($action) {

        case "delete":
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if ($id) {
                $searchDbHandle->deleteRecord($id);
            }
            break;

        case 'update':
            break;
        default:
            break;
    }
}
