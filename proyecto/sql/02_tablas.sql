CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  rol ENUM('cliente','empleado','admin'),
  creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE solicitudes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente_id INT,
  servicio VARCHAR(100),
  ubicacion1 VARCHAR(255),
  ubicacion2 VARCHAR(255),
  lat DECIMAL(10,8),
  lng DECIMAL(11,8),
  estado ENUM('pendiente','aceptado','finalizado') DEFAULT 'pendiente',
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (cliente_id) REFERENCES usuarios(id)
);
