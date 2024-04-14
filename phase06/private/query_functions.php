<?php

function find_all_salamanders() {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_salamander_by_id($id) {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .="WHERE id=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    confirm_result_set($result);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $salamander;
}

function update_salamander($salamander) {
    global $db;
    
    $errors =  validate_salamander($salamander);
    if(!empty($errors)) {
        return $errors;
    }
    
    $sql = "UPDATE salamander SET ";
    $sql .= "name=?, ";
    $sql .= "habitat=?,";
    $sql .= "description=? ";
    $sql .= "WHERE id=? ";
    $sql .= "LIMIT 1";
    
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $salamander['name'], $salamander['habitat'], $salamander['description'], $salamander['id']);
    $result = mysqli_stmt_execute($stmt);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function insert_salamander($salamander) {
    global $db;
    
    $errors =  validate_salamander($salamander);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES(?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $salamander['name'], $salamander['habitat'], $salamander['description']);
    $result = mysqli_stmt_execute($stmt);

    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function delete_salamander($id) {
    global $db;
    $sql = "DELETE FROM salamander ";
    $sql .= "WHERE id = ? ";
    $sql .= "LIMIT 1";

    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function validate_salamander($salamander) {
    $errors = [];
  
    if(is_blank($salamander['name'])) {
      $errors[] = "Name cannot be blank.";
    }
    elseif(!has_length($salamander['name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    if(is_blank($salamander['description'])) {
        $errors[] = "Description cannot be blank.";
      }

    if(is_blank($salamander['habitat'])) {
    $errors[] = "Habitat cannot be blank.";
    }
    
    return $errors;
}
