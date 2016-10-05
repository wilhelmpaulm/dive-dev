<?php

function db_get($table, $data) {
    return getTable($table, $data);
}

function db_select($table, $data = null) {
    return selectTable($table, $data);
}

function db_update($table, $data, $id) {
    return updateTable($table, $data, $id);
}

function db_delete($table, $data) {
    return deleteTable($table, $data);
}

function db_insert($table, $data) {
    return insertTable($table, $data);
}

function db_query($data) {
    return queryTable($data);
}

function queryTable($data) {
    global $database;
    try {
        $data = $database->query($data)->fetchAll();
    } catch (Exception $exc) {
        if (env("debug")) {
            echo $exc->getTraceAsString();
            echo "<br/><pre>";
            var_dump($database->error());
            die;
        }
    }
    if (!isset($data) || $data == null) {
        return [];
    } else {
        return $data;
    }
}

function selectTable($table, $data = null, $options = null) {
    global $database;
    try {
        if ($data == null && $options == null) {
            $data = $database->select($table, "*");
        } else if ($data != null && $options != null) {
            $data = $database->select($table, "*", $data, $options);
        } else {
            $data = $database->select($table, "*", $data);
        }
    } catch (Exception $exc) {
        if (env("debug")) {
            echo $exc->getTraceAsString();
            echo "<br/><pre>";
            var_dump($database->error());
            die;
        }
    }
    if (!isset($data) || $data == null) {
        return [];
    } else {
        return $data;
    }
}

function deleteTable($table, $data) {
    global $database;
    try {
        if (is_array($data)) {
            $data = $database->delete($table, $data);
        } else {
            $data = $database->delete($table, ["id" => $data]);
        }
    } catch (Exception $exc) {
        if (env("debug")) {
            echo $exc->getTraceAsString();
            echo "<br/><pre>";
            var_dump($database->error());
            die;
        }
    }
    if (!isset($data) || $data == null) {
        return [];
    } else {
        return $data;
    }
}

function getTable($table, $data) {
    global $database;
    try {
        if (is_array($data)) {
            $data = $database->get($table, "*", $data);
        } else {
            $data = $database->get($table, "*", ["id" => $data]);
        }
    } catch (Exception $exc) {
        if (env("debug")) {
            echo $exc->getTraceAsString();
            echo "<br/><pre>";
            var_dump($database->error());
            die;
        }
    }
    if (!isset($data) || $data == null) {
        return [];
    } else {
        return $data;
    }
}

function insertTable($table, $data) {
    global $database;
    try {
        $data = $database->insert($table, $data);
    } catch (Exception $exc) {
        if (env("debug")) {
            echo $exc->getTraceAsString();
            echo "<br/><pre>";
            var_dump($database->error());
            die;
        }
    }

    if (!isset($data)) {
        return null;
    } else {
        return $data;
    }
}

function updateTable($table, $data, $id) {
    global $database;
    try {
        if (is_array($data) && !is_array($id)) {
            $data = $database->update($table, $data, ["id" => $id]);
        } else if (is_array($data) && is_array($id)) {
            $data = $database->update($table, $data, $id);
        } else {
            $data = "invalid parameters";
        }
    } catch (Exception $exc) {
        if (env("debug")) {
            echo $exc->getTraceAsString();
            echo "<br/><pre>";
            var_dump($database->error());
            die;
        }
    }

    if (!isset($data) || $data == null) {
        return [];
    } else {
        return $data;
    }
}
