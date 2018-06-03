<?php
  function find_all_subjects()
  {
      global $db;

      $sql = "SELECT * FROM subjects ";
      $sql .= "ORDER BY position ASC;";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result, $sql);
      return $result;
  }

  function find_all_visible_subjects()
  {
      global $db;

      $sql = "SELECT * FROM subjects ";
      $sql .= "WHERE visible='" . db_escape($db, 1) . "' ";
      $sql .= "ORDER BY position ASC;";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result, $sql);
      return $result;
  }

  function count_all_subjects()
  {
      $subject_set = find_all_subjects();
      $subject_count = mysqli_num_rows($subject_set);
      return $subject_count;
      mysqli_free_result($subject_set);
  }

  function validate_subject($subject)
  {
      global $errors;

      // menu_name
      if (is_blank($subject['menu_name'])) {
          $errors[] = "Title cannot be blank.";
      } elseif (!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
          $errors[] = "Title must be between 2 and 255 characters.";
      }

      // position
      // Make sure we are working with an integer
      $postion_int = (int) $subject['position'];
      if ($postion_int <= 0) {
          $errors[] = "Position must be greater than zero.";
      }
      if ($postion_int > 999) {
          $errors[] = "Position must be less than 999.";
      }

      // visible
      // Make sure we are working with a string
      $visible_str = (string) $subject['visible'];
      if (!has_inclusion_of($visible_str, ["0","1"])) {
          $errors[] = "Visible must be true or false.";
      }

      // return $errors;
  }

  // to check if subjects has pages or not before deletion
  function has_children($id){
    global $errors;
    
    $page_count = count_pages_by_subject_id($id);
    if($page_count > 0){
        $errors[] = "Cannot delete a Subject with Page(s)";
    }
  }


  function find_subject_by_id($id)
  {
      global $db;

      $sql = "SELECT * FROM subjects ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "'";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);

      $subject = mysqli_fetch_assoc($result);
      mysqli_free_result($result); //free $result since we already have the result and free up the memory

      return $subject; //return an assoc. array
  }

  function insert_subject($subject)
  {
      global $db;
      global $errors;

      validate_subject($subject);
      if (!empty($errors)) {
          return false;
      }

      $sql = "INSERT INTO subjects ";
      $sql .= "(menu_name, position, visible) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $subject['menu_name']) . "',";
      $sql .= "'" . db_escape($db, $subject['position']) . "',";
      $sql .= "'" . db_escape($db, $subject['visible']) . "'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);
      // For INSERT statements, $result is true/false
      if ($result) {
          return true;
      } else {
          // INSERT failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }

  function update_subject($subject)
  {
      global $db;
      global $errors;

      validate_subject($subject);
      if (!empty($errors)) {
          return false;
      }

      $sql = "UPDATE subjects SET ";
      $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
      $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
      $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
      $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
      $sql .= "LIMIT 1";

      $result = mysqli_query($db, $sql);
      // For insert statements, $result is true/false
      if ($result) {
          return true;
      } else {
          // UPDATE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit();
      }
  }

  function delete_subject($id)
  {
      global $db;
      global $errors;

      has_children($id);
      if (!empty($errors)) {
          return false;
      }

      $sql = "DELETE FROM subjects ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);

      // For DELETE statements, $result is true/false
      if ($result) {
          return true;
      } else {
          // DELETE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }

  function find_all_pages()
  {
      global $db;

      $sql = "SELECT * FROM pages ";
      $sql .= "ORDER BY subject_id ASC, position ASC;"; //sorts by subject_id first and then by position
      $result = mysqli_query($db, $sql);
      confirm_result_set($result, $sql);
      return $result;
  }

  function count_all_pages()
  {
      $page_set = find_all_pages();
      $page_count = mysqli_num_rows($page_set);
      mysqli_free_result($page_set);
      return $page_count;
  }


  function find_page_by_id($id)
  {
      global $db;

      $sql = "SELECT * FROM pages ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "'";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $page = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $page; // returns an assoc. array
  }

  function find_pages_by_subject_id($subject_id)
  {
      global $db;

      $sql = "SELECT * FROM pages ";
      $sql .= "WHERE subject_id='" . db_escape($db, $subject_id) . "' ";
      $sql .= "ORDER BY position ASC;";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result, $sql);
      return $result; // returns result set
  }

  function count_pages_by_subject_id($id)
  {
      $page_set = find_pages_by_subject_id($id);
      $page_count = mysqli_num_rows($page_set);
      return $page_count;
      mysqli_free_result($page_set);
  }

  function validate_page($page)
  {
      global $errors;

      // subject_id
      if (is_blank($page['subject_id'])) {
          $errors[] = "Subject cannot be blank.";
      }

      // menu_name
      if (is_blank($page['menu_name'])) {
          $errors[] = "Page title cannot be blank.";
      } elseif (!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
          $errors[] = "Page title must be between 2 and 255 characters.";
      }
      $current_id = $page['id'] ?? '0';
      if(!has_unique_page_menu_name($page['menu_name'], $current_id)){
        $errors[] = "Page Title already exists";
      }

      // position
      // Make sure we are working with an integer
      $postion_int = (int) $page['position'];
      if ($postion_int <= 0) {
          $errors[] = "Position must be greater than zero.";
      }
      if ($postion_int > 999) {
          $errors[] = "Position must be less than 999.";
      }

      // visible
      // Make sure we are working with a string
      $visible_str = (string) $page['visible'];
      if (!has_inclusion_of($visible_str, ["0","1"])) {
          $errors[] = "Visible must be true or false.";
      }

      // content
      if (is_blank($page['content'])) {
          $errors[] = "Page body cannot be blank.";
      }

      // return $errors;
  }

  function insert_page($page)
  {
      global $db;
      global $errors;

      validate_page($page);
      if (!empty($errors)) {
          return false;
      }

      $sql = "INSERT INTO pages ";
      $sql .= "(subject_id, menu_name, position, visible, content) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $page['subject_id']) . "',";
      $sql .= "'" . db_escape($db, $page['menu_name']) . "',";
      $sql .= "'" . db_escape($db, $page['position']) . "',";
      $sql .= "'" . db_escape($db, $page['visible']) . "',";
      $sql .= "'" . db_escape($db, $page['content']) . "'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);
      // For INSERT statements, $result is true/false
      if ($result) {
          return true;
      } else {
          // INSERT failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }

  function update_page($page)
  {
      global $db;
      global $errors;

      validate_page($page);
      if (!empty($errors)) {
          return false;
      }

      $sql = "UPDATE pages SET ";
      $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";
      $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
      $sql .= "position='" . db_escape($db, $page['position']) . "', ";
      $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
      $sql .= "content='" . db_escape($db, $page['content']) . "' ";
      $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
      $sql .= "LIMIT 1";

      $result = mysqli_query($db, $sql);
      // For UPDATE statements, $result is true/false
      if ($result) {
          return true;
      } else {
          // UPDATE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }

  function delete_page($id)
  {
      global $db;

      $sql = "DELETE FROM pages ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
      $sql .= "LIMIT 1";
      echo $sql;
      $result = mysqli_query($db, $sql);

      // For DELETE statements, $result is true/false
      if ($result) {
          return true;
      } else {
          // DELETE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }
