<?php
class Task {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function createTask($task_name, $task_description, $task_start_date, $task_end_date, $project_id) {
      $stmt = $this->db->prepare("INSERT INTO tasks (task_name, task_description, task_start_date, task_end_date, project_id) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssi", $task_name, $task_description, $task_start_date, $task_end_date, $project_id);

      if ($stmt->execute()) {
         return true; // la tâche a été créée avec succès
      } else {
         return false; // une erreur s'est produite lors de la création de la tâche
      }
   }

   public function updateTask($task_id, $task_name, $task_description, $task_start_date, $task_end_date, $task_status) {
      $stmt = $this->db->prepare("UPDATE tasks SET task_name=?, task_description=?, task_start_date=?, task_end_date=?, task_status=? WHERE task_id=?");
      $stmt->bind_param("sssssi", $task_name, $task_description, $task_start_date, $task_end_date, $task_status, $task_id);

      if ($stmt->execute()) {
         return true; // la tâche a été mise à jour avec succès
      } else {
         return false; // une erreur s'est produite lors de la mise à jour de la tâche
      }
   }

   public function deleteTask($task_id) {
      $stmt = $this->db->prepare("DELETE FROM tasks WHERE task_id=?");
      $stmt->bind_param("i", $task_id);

      if ($stmt->execute()) {
         return true; // la tâche a été supprimée avec succès
      } else {
         return false; // une erreur s'est produite lors de la suppression de la tâche
      }
   }

   public function getTasksByProject($project_id) {
      $stmt = $this->db->prepare("SELECT * FROM tasks WHERE project_id=?");
      $stmt->bind_param("i", $project_id);
      $stmt->execute();
      $result = $stmt->get_result();

      $tasks = array();
      while ($row = $result->fetch_assoc()) {
         $tasks[] = $row;
      }

      return $tasks; // retourne un tableau contenant les tâches associées au projet
   }
}
