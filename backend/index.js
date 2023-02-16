const express = require("express");
const mysql = require("mysql");
const bodyParser = require("body-parser");
const cors = require("cors");

const app = express();
const port = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(bodyParser.json());

// Connexion à la base de données MySQL
const connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "gestion_taches"
});

connection.connect((err) => {
  if (err) {
    console.error("Erreur de connexion à la base de données MySQL : ", err);
  } else {
    console.log("Connexion à la base de données MySQL réussie !");
  }
});


const tasksRouter = require("./routes/tasks");
app.use("/tasks", tasksRouter);

const projectsRouter = require("./routes/projects");
app.use("/pojects", projectsRouter);


app.listen(port, () => {
  console.log(`Serveur lancé sur le port ${port}`);
});
