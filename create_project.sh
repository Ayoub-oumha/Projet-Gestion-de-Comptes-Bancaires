#!/bin/bash
mkdir config controllers models views public public/assets && \
touch config/database.php && \
touch controllers/ClientController.php && \
touch controllers/AdminController.php && \
touch models/User.php && \
touch models/Account.php && \
touch models/Transaction.php && \
touch views/login.php && \
touch views/dashboard.php && \
touch views/admin.php && \
touch public/index.php && \
echo "Structure du projet créée avec succès."
