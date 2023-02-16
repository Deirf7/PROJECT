// Fonction pour récupérer les données des projets à partir de l'API
async function getProjects() {
    try {
      const res = await axios.get('https://my-project-management-api.com/projects');
      const projects = res.data;
  
      // Boucle pour afficher les données des projets
      projects.forEach(project => {
        const projectContainer = document.createElement('div');
        projectContainer.classList.add('project-container');
  
        const projectTitle = document.createElement('h2');
        projectTitle.innerText = project.title;
  
        const taskList = document.createElement('ul');
        taskList.classList.add('task-list');
  
        // Boucle pour afficher les tâches associées au projet
        project.tasks.forEach(task => {
          const taskItem = document.createElement('li');
          taskItem.innerText = task.title;
  
          taskList.appendChild(taskItem);
        });
  
        projectContainer.appendChild(projectTitle);
        projectContainer.appendChild(taskList);
  
        document.getElementById('projects-container').appendChild(projectContainer);
      });
    } catch (error) {
      console.error(error);
    }
  }
  
  // Appel de la fonction lorsque la page est prête
  document.addEventListener('DOMContentLoaded', getProjects);

  
/*Ce code utilise Axios pour faire une requête GET à l'API pour récupérer les données des projets. 
  Une fois les données reçues, nous bouclons sur les projets pour les afficher sur la page en créant des éléments HTML avec JavaScript.
   Les tâches associées à chaque projet sont également affichées en utilisant une boucle interne. */  