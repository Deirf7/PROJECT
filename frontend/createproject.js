import React, { useState } from "react";
import axios from "axios";

const CreateProject = () => {
  const [projectName, setProjectName] = useState("");
  const [projectDescription, setProjectDescription] = useState("");

  const handleSubmit = (event) => {
    event.preventDefault();
    axios
      .post("/api/projects", {
        name: projectName,
        description: projectDescription,
      })
      .then((response) => {
        console.log(response.data);
      })
      .catch((error) => {
        console.log(error);
      });
  };

  return (
    <form onSubmit={handleSubmit}>
      <div>
        <label htmlFor="projectName">Nom du projet :</label>
        <input
          type="text"
          id="projectName"
          value={projectName}
          onChange={(event) => setProjectName(event.target.value)}
        />
      </div>
      <div>
        <label htmlFor="projectDescription">Description du projet :</label>
        <textarea
          id="projectDescription"
          value={projectDescription}
          onChange={(event) => setProjectDescription(event.target.value)}
        />
      </div>
      <button type="submit">Créer le projet</button>
    </form>
  );
};

export default CreateProject;
