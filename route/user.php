<?php

class User {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function register($username, $email, $password) {
      // Hachez le mot de passe en utilisant une fonction de hachage sécurisée.
      $password = password_hash($password, PASSWORD_DEFAULT);

      // Insérer l'utilisateur dans la base de données
      $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("sss", $username, $email, $password);
      $stmt->execute();

      // Renvoie le statut de réussite de l'opération
      return $stmt->affected_rows > 0;
   }

   public function login($email, $password) {
      // Obtenir les informations sur l'utilisateur à partir de la base de données
      $query = "SELECT id, username, email, password FROM users WHERE email = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      // Si l'utilisateur a été trouvé, vérifiez le mot de passe
      if ($result->num_rows > 0) {
         $user = $result->fetch_assoc();
         if (password_verify($password, $user['password'])) {
            return $user;
         }
      }

      // Retourne false si la connexion a échoué
      return false;
   }
}

?>

Ce code définit une classe User qui contient les fonctions register et login. La fonction register prend en entrée un nom d'utilisateur, un email et un mot de passe, hash le mot de passe en utilisant la fonction password_hash, puis enregistre les informations de l'utilisateur dans la base de données. La fonction login prend en entrée un email et un mot de passe, récupère les informations de l'utilisateur à partir de la base de données, vérifie le mot de passe en utilisant la fonction password_verify, et renvoie les informations de l'utilisateur si la connexion réussit.