<?php

class Project {
    private $db;

    public function __construct($db_connection) {
        $this->db = $db_connection;
    }

    // Ajouter un nouveau projet
    public function addProject($project_name, $project_description) {
        try {
            $stmt = $this->db->prepare("INSERT INTO projects (name, description) VALUES (:name, :description)");
            $stmt->bindParam(':name', $project_name);
            $stmt->bindParam(':description', $project_description);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Modifier un projet existant
    public function updateProject($project_id, $project_name, $project_description) {
        try {
            $stmt = $this->db->prepare("UPDATE projects SET name = :name, description = :description WHERE id = :id");
            $stmt->bindParam(':id', $project_id);
            $stmt->bindParam(':name', $project_name);
            $stmt->bindParam(':description', $project_description);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un projet
    public function deleteProject($project_id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM projects WHERE id = :id");
            $stmt->bindParam(':id', $project_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>

Notez que ce code suppose que vous avez déjà une connexion à une base de données et que vous avez défini une table "projects" dans cette base de données. Les fonctions addProject, updateProject et deleteProject utilisent les fonctions préparées de PDO pour exécuter des requêtes SQL pour ajouter, mettre à jour et supprimer des enregistrements dans la table "projects".