import React, { useState } from "react";
import axios from "axios";

const Register = () => {
  const [username, setUsername] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");

  const handleSubmit = async e => {
    e.preventDefault();

    try {
      const response = await axios.post("file:///C:/Users/School/Desktop/projet/frontend/index.html", {
        username,
        email,
        password
      });

      localStorage.setItem("token", response.data.token);
      window.location = "/";
    } catch (error) {
      setError(error.response.data.message);
    }
  };

  return (
    <div>
      <h1>Enregistrement</h1>
      {error && <p>{error}</p>}
      <form onSubmit={handleSubmit}>
        <input
          type="text"
          placeholder="Nom d'utilisateur"
          value={username}
          onChange={e => setUsername(e.target.value)}
        />
        <input
          type="email"
          placeholder="Adresse email"
          value={email}
          onChange={e => setEmail(e.target.value)}
        />
        <input
          type="password"
          placeholder="Mot de passe"
          value={password}
          onChange={e => setPassword(e.target.value)}
        />
        <button type="submit">S'enregistrer</button>
      </form>
    </div>
  );
};

export default Register;
