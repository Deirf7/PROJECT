const registerForm = document.querySelector('#register-form');
const loginForm = document.querySelector('#login-form');

// gérer la soumission du formulaire d'inscription
registerForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const username = registerForm.querySelector('#username').value;
  const email = registerForm.querySelector('#email').value;
  const password = registerForm.querySelector('#password').value;

  // Valider les entrées de l'utilisateur
  if (!username || !email || !password) {
    // Afficher un message d'erreur
    return;
  }

  // Envoyez une demande POST à l'API pour enregistrer l'utilisateur.
  axios.post('C:\Users\School\Desktop\projet\backend\api\app.js', {
    username,
    email,
    password
  })
  .then(response => {
    // Gérer un enregistrement réussi
  })
  .catch(error => {
    // Gérer les erreurs d'enregistrement
  });
});

// gérer la soumission du formulaire de connexion
loginForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const username = loginForm.querySelector('#username').value;
  const password = loginForm.querySelector('#password').value;

  // Valider les entrées de l'utilisateur
  if (!username || !password) {
    // Afficher un message d'erreur
    return;
  }

  //Envoyez une demande POST à l'API pour connecter l'utilisateur.
  axios.post('C:\Users\School\Desktop\projet\backend\api\app.js', {
    username,
    password
  })
  .then(response => {
    // Gérer une connexion réussie
  })
  .catch(error => {
    // Gérer les erreurs de connexion
  });
});
