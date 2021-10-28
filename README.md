# Securite
page de connexion et d'inscription securisé coder en html et PHP 
une base de donnée SQL est necessaire voici la requete pour la creer 

CREATE TABLE `users` (
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Sinon rien d'autre que PHP et une base de donnée SQL n'est à installer.

Niveau sécurité:
les mots de passes sont crypter à l'aide de la fonction sha1, mot de passe non visible en clair que ca soit dans les formulaires ou dans la base de données.

