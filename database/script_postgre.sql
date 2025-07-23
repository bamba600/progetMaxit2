-- PostgreSQL version of MySQL dump

-- Drop and create ENUM type
DO $$
BEGIN
    IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'compte_type') THEN
        CREATE TYPE compte_type AS ENUM ('principal', 'secondaire');
    END IF;
    IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'transaction_type') THEN
        CREATE TYPE transaction_type AS ENUM ('paiement', 'depot', 'retrait');
    END IF;
END$$;              

-- Table: typeUtilisateur
CREATE TABLE IF NOT EXISTS typeUtilisateur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(30)
);

-- Table: utilisateur
CREATE TABLE IF NOT EXISTS utilisateur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    numerotelephone VARCHAR(30) NOT NULL,
    login VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    numeroidentite VARCHAR(50) NOT NULL,
    photorecto VARCHAR(40) NOT NULL,
    photoverso VARCHAR(40) NOT NULL,
    idtypeutilisateur INT,
    CONSTRAINT fk_typeutilisateur FOREIGN KEY (idtypeutilisateur)
        REFERENCES typeUtilisateur(id)
        ON DELETE SET NULL ON UPDATE CASCADE
);

-- Table: compte
CREATE TABLE IF NOT EXISTS compte (
    id SERIAL PRIMARY KEY,
    date_creation TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    solde FLOAT,
    numeroCompte VARCHAR(30) NOT NULL,
    type compte_type NOT NULL,
    idUtilisateur INT,
    CONSTRAINT fk_utilisateur FOREIGN KEY (idUtilisateur)
        REFERENCES utilisateur(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table: transaction
CREATE TABLE IF NOT EXISTS transaction (
    id SERIAL PRIMARY KEY,
    montant FLOAT NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    type transaction_type NOT NULL,
    idCompte INT,
    CONSTRAINT fk_compte FOREIGN KEY (idCompte)
        REFERENCES compte(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Données
INSERT INTO typeUtilisateur (id, nom) VALUES
(1, 'client')
ON CONFLICT DO NOTHING;

INSERT INTO utilisateur (id, nom, prenom, numerotelephone, login, password, numeroidentite, photorecto, photoverso, idtypeutilisateur) VALUES
(1, 'Segnane', 'Thierno', '777732762', 'thiernosegnane316@gmail.com', 'passer', '349458284302443', 'photoRecto.jpeg', 'photoVerso.jpeg', 1)
ON CONFLICT DO NOTHING;

INSERT INTO compte (id, date_creation, solde, numeroCompte, type, idUtilisateur) VALUES
(1, '2025-07-15 19:41:23', 45837600, '777732762', 'principal', 1)
ON CONFLICT DO NOTHING;

INSERT INTO transaction (id, montant, date, type, idCompte) VALUES
(1, 3467440, '2025-07-15 19:41:23', 'depot', 1)
ON CONFLICT DO NOTHING;
